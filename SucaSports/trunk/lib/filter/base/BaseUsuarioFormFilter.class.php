<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Usuario filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'documento'         => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'password'          => new sfWidgetFormFilterInput(),
      'id_grupo'          => new sfWidgetFormPropelChoice(array('model' => 'Grupo', 'add_empty' => true)),
      'id_corredor'       => new sfWidgetFormPropelChoice(array('model' => 'Corredor', 'add_empty' => true)),
      'pregunta_secreta'  => new sfWidgetFormFilterInput(),
      'respuesta_secreta' => new sfWidgetFormFilterInput(),
      'estado'            => new sfWidgetFormFilterInput(),
      'verificador'       => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'documento'         => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'id_grupo'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Grupo', 'column' => 'id')),
      'id_corredor'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Corredor', 'column' => 'id')),
      'pregunta_secreta'  => new sfValidatorPass(array('required' => false)),
      'respuesta_secreta' => new sfValidatorPass(array('required' => false)),
      'estado'            => new sfValidatorPass(array('required' => false)),
      'verificador'       => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'documento'         => 'Text',
      'email'             => 'Text',
      'password'          => 'Text',
      'id_grupo'          => 'ForeignKey',
      'id_corredor'       => 'ForeignKey',
      'pregunta_secreta'  => 'Text',
      'respuesta_secreta' => 'Text',
      'estado'            => 'Text',
      'verificador'       => 'Text',
      'created_at'        => 'Date',
      'created_by'        => 'Number',
      'updated_at'        => 'Date',
      'updated_by'        => 'Number',
    );
  }
}
