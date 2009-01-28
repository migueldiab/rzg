<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1><?php echo __('Confirmar inscripcion?', array()) ?></h1>

  <div id="sf_admin_header">
  </div>

  <div id="sf_admin_content">
      <fieldset id="sf_fieldset_none" class="">
        <div class="form-row">
        <?php echo label_for('inscripcion[id_corredor]', __('Corredor')) ?>
        <?php echo $usuario->getCorredor() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('inscripcion[id_carrera]', __('Carrera')) ?>
        <?php echo $inscripcion->getCarrera() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('inscripcion[id_etapa]', __('Etapa')) ?>
        <?php echo $inscripcion->getEtapa() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('inscripcion[fecha_inicio]', __('Fecha de Inicio')) ?>
        <?php echo $inscripcion->getFechaInicio() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('inscripcion[id_categoria]', __('Categoria')) ?>
        <?php echo $inscripcion->getCategoria() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('fecha_etapa[costo]', __('Costo')) ?>
        $U <?php echo $fecha_etapa->getCosto() ?>
        </div>
        <div class="form-row">
        <?php echo label_for('cuenta_corriente[id_forma_pago]', __('Forma de Pago')) ?>
        <?php echo $cuenta_corriente->getFormaPago() ?>
    </fieldset>
  </div>

  <div id="sf_admin_footer">
  </div>

</div>

