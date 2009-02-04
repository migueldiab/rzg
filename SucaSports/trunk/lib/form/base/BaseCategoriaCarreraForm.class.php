<?php

/**
 * CategoriaCarrera form base class.
 *
 * @package    sucasports
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseCategoriaCarreraForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_categoria' => new sfWidgetFormInputHidden(),
      'id_carrera'   => new sfWidgetFormInputHidden(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'updated_by'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id_categoria' => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id', 'required' => false)),
      'id_carrera'   => new sfValidatorPropelChoice(array('model' => 'Carrera', 'column' => 'id', 'required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_by'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria_carrera[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoriaCarrera';
  }


}
