<?php

/**
 * Carrera form base class.
 *
 * @package    form
 * @subpackage carrera
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 8807 2008-05-06 14:12:28Z fabien $
 */
class BaseCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'nombre'                 => new sfWidgetFormInput(),
      'url'                    => new sfWidgetFormInput(),
      'descripcion'            => new sfWidgetFormTextarea(),
      'created_at'             => new sfWidgetFormDateTime(),
      'created_by'             => new sfWidgetFormInput(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'updated_by'             => new sfWidgetFormInput(),
      'categoria_carrera_list' => new sfWidgetFormPropelSelectMany(array('model' => 'Categoria')),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'nombre'                 => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'url'                    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'descripcion'            => new sfValidatorString(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'created_by'             => new sfValidatorInteger(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_by'             => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'categoria_carrera_list' => new sfValidatorPropelChoiceMany(array('model' => 'Categoria', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Carrera';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['categoria_carrera_list']))
    {
      $values = array();
      foreach ($this->object->getCategoriaCarreras() as $obj)
      {
        $values[] = $obj->getIdCategoria();
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
    $c->add(CategoriaCarreraPeer::ID_CARRERA, $this->object->getPrimaryKey());
    CategoriaCarreraPeer::doDelete($c, $con);

    $values = $this->getValue('categoria_carrera_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new CategoriaCarrera();
        $obj->setIdCarrera($this->object->getPrimaryKey());
        $obj->setIdCategoria($value);
        $obj->save();
      }
    }
  }

}
