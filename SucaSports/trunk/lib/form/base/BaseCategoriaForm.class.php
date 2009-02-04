<?php

/**
 * Categoria form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'nombre'                 => new sfWidgetFormInput(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'updated_by'             => new sfWidgetFormInput(),
      'regla'                  => new sfWidgetFormInput(),
      'categoria_carrera_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Carrera')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id', 'required' => false)),
      'nombre'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_by'             => new sfValidatorInteger(array('required' => false)),
      'regla'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'categoria_carrera_list' => new sfValidatorPropelChoiceMany(array('model' => 'Carrera', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categoria_carrera_list']))
    {
      $values = array();
      foreach ($this->object->getCategoriaCarreras() as $obj)
      {
        $values[] = $obj->getIdCarrera();
      }

      $this->setDefault('categoria_carrera_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCategoriaCarreraList($con);
  }

  public function saveCategoriaCarreraList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['categoria_carrera_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(CategoriaCarreraPeer::ID_CATEGORIA, $this->object->getPrimaryKey());
    CategoriaCarreraPeer::doDelete($c, $con);

    $values = $this->getValue('categoria_carrera_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CategoriaCarrera();
        $obj->setIdCategoria($this->object->getPrimaryKey());
        $obj->setIdCarrera($value);
        $obj->save();
      }
    }
  }

}
