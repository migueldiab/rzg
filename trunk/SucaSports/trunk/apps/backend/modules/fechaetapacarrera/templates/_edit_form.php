<?php echo form_tag('fechaetapacarrera/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($fecha_etapa_carrera, 'getFechaInicio') ?>
<?php echo object_input_hidden_tag($fecha_etapa_carrera, 'getIdEtapa') ?>
<?php echo object_input_hidden_tag($fecha_etapa_carrera, 'getIdCarrera') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('fecha_etapa_carrera[fecha_inicio_id]', __($labels['fecha_etapa_carrera{fecha_inicio_id}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fecha_etapa_carrera{fecha_inicio_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fecha_etapa_carrera{fecha_inicio_id}')): ?>
    <?php echo form_error('fecha_etapa_carrera{fecha_inicio_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('fecha_inicio_id', array('type' => 'edit', 'fecha_etapa_carrera' => $fecha_etapa_carrera)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fecha_etapa_carrera[max_corredores]', __($labels['fecha_etapa_carrera{max_corredores}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fecha_etapa_carrera{max_corredores}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fecha_etapa_carrera{max_corredores}')): ?>
    <?php echo form_error('fecha_etapa_carrera{max_corredores}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fecha_etapa_carrera, 'getMaxCorredores', array (
  'size' => 7,
  'control_name' => 'fecha_etapa_carrera[max_corredores]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fecha_etapa_carrera[fecha_fin]', __($labels['fecha_etapa_carrera{fecha_fin}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fecha_etapa_carrera{fecha_fin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fecha_etapa_carrera{fecha_fin}')): ?>
    <?php echo form_error('fecha_etapa_carrera{fecha_fin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fecha_etapa_carrera, 'getFechaFin', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fecha_etapa_carrera[fecha_fin]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('fecha_etapa_carrera[costo]', __($labels['fecha_etapa_carrera{costo}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('fecha_etapa_carrera{costo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fecha_etapa_carrera{costo}')): ?>
    <?php echo form_error('fecha_etapa_carrera{costo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fecha_etapa_carrera, 'getCosto', array (
  'size' => 7,
  'control_name' => 'fecha_etapa_carrera[costo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

  <?php $value = object_input_hidden_tag($fecha_etapa_carrera, 'getEstado', array (
  'control_name' => 'fecha_etapa_carrera[estado]',
)); echo $value ? $value : '&nbsp;' ?>


</fieldset>

<?php include_partial('edit_actions', array('fecha_etapa_carrera' => $fecha_etapa_carrera)) ?>

</form>

<ul class="sf_admin_actions">
  </ul>
