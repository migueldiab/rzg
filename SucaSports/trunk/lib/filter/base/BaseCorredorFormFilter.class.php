<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Corredor filter form base class.
 *
 * @package    sucasports
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseCorredorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'documento'                  => new sfWidgetFormFilterInput(),
      'id_tipo_documento'          => new sfWidgetFormPropelChoice(array('model' => 'TipoDocumento', 'add_empty' => true)),
      'nombre'                     => new sfWidgetFormFilterInput(),
      'apellido'                   => new sfWidgetFormFilterInput(),
      'telefono'                   => new sfWidgetFormFilterInput(),
      'movil'                      => new sfWidgetFormFilterInput(),
      'telefono_emergencia'        => new sfWidgetFormFilterInput(),
      'direccion'                  => new sfWidgetFormFilterInput(),
      'fecha_nacimiento'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'pareja'                     => new sfWidgetFormFilterInput(),
      'hijos'                      => new sfWidgetFormFilterInput(),
      'id_sociedad_medica'         => new sfWidgetFormPropelChoice(array('model' => 'SociedadMedica', 'add_empty' => true)),
      'historia_medica'            => new sfWidgetFormFilterInput(),
      'sexo'                       => new sfWidgetFormFilterInput(),
      'id_localidad'               => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => true)),
      'id_pais'                    => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_chips'                   => new sfWidgetFormPropelChoice(array('model' => 'Chip', 'add_empty' => true)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_by'                 => new sfWidgetFormFilterInput(),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_by'                 => new sfWidgetFormFilterInput(),
      'asociacion_corredor_list'   => new sfWidgetFormPropelChoice(array('model' => 'Asociacion', 'add_empty' => true)),
      'corredor_equipamiento_list' => new sfWidgetFormPropelChoice(array('model' => 'Equipamiento', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'documento'                  => new sfValidatorPass(array('required' => false)),
      'id_tipo_documento'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoDocumento', 'column' => 'id')),
      'nombre'                     => new sfValidatorPass(array('required' => false)),
      'apellido'                   => new sfValidatorPass(array('required' => false)),
      'telefono'                   => new sfValidatorPass(array('required' => false)),
      'movil'                      => new sfValidatorPass(array('required' => false)),
      'telefono_emergencia'        => new sfValidatorPass(array('required' => false)),
      'direccion'                  => new sfValidatorPass(array('required' => false)),
      'fecha_nacimiento'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'pareja'                     => new sfValidatorPass(array('required' => false)),
      'hijos'                      => new sfValidatorPass(array('required' => false)),
      'id_sociedad_medica'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SociedadMedica', 'column' => 'id')),
      'historia_medica'            => new sfValidatorPass(array('required' => false)),
      'sexo'                       => new sfValidatorPass(array('required' => false)),
      'id_localidad'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Localidad', 'column' => 'id')),
      'id_pais'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'id_chips'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Chip', 'column' => 'id')),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_by'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_by'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'asociacion_corredor_list'   => new sfValidatorPropelChoice(array('model' => 'Asociacion', 'required' => false)),
      'corredor_equipamiento_list' => new sfValidatorPropelChoice(array('model' => 'Equipamiento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('corredor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAsociacionCorredorListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(AsociacionCorredorPeer::ID_CORREDOR, CorredorPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AsociacionCorredorPeer::ID_ASOCIACION, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AsociacionCorredorPeer::ID_ASOCIACION, $value));
    }

    $criteria->add($criterion);
  }

  public function addCorredorEquipamientoListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(CorredorEquipamientoPeer::ID_CORREDOR, CorredorPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(CorredorEquipamientoPeer::ID_EQUIPAMIENTO, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Corredor';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'documento'                  => 'Text',
      'id_tipo_documento'          => 'ForeignKey',
      'nombre'                     => 'Text',
      'apellido'                   => 'Text',
      'telefono'                   => 'Text',
      'movil'                      => 'Text',
      'telefono_emergencia'        => 'Text',
      'direccion'                  => 'Text',
      'fecha_nacimiento'           => 'Date',
      'pareja'                     => 'Text',
      'hijos'                      => 'Text',
      'id_sociedad_medica'         => 'ForeignKey',
      'historia_medica'            => 'Text',
      'sexo'                       => 'Text',
      'id_localidad'               => 'ForeignKey',
      'id_pais'                    => 'ForeignKey',
      'id_chips'                   => 'ForeignKey',
      'updated_at'                 => 'Date',
      'updated_by'                 => 'Number',
      'created_at'                 => 'Date',
      'created_by'                 => 'Number',
      'asociacion_corredor_list'   => 'ManyKey',
      'corredor_equipamiento_list' => 'ManyKey',
    );
  }
}
