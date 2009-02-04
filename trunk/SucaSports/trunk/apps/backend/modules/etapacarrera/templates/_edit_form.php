<?php echo form_tag('etapacarrera/crear', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($etapa_carrera, 'getIdEtapa') ?>
<?php echo object_input_hidden_tag($etapa_carrera, 'getIdCarrera') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('etapa_carrera[carrera]', __($labels['etapa_carrera{carrera}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('etapa_carrera{carrera}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('etapa_carrera{carrera}')): ?>
    <?php echo form_error('etapa_carrera{carrera}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($etapa_carrera, 'getCarrera', array (
  'disabled' => true,
  'control_name' => 'etapa_carrera[carrera]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('etapa_carrera[nombre]', __($labels['etapa_carrera{nombre}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('etapa_carrera{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('etapa_carrera{nombre}')): ?>
    <?php echo form_error('etapa_carrera{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($etapa_carrera, 'getNombre', array (
  'size' => 45,
  'control_name' => 'etapa_carrera[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('etapa_carrera[numero_etapa]', __($labels['etapa_carrera{numero_etapa}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('etapa_carrera{numero_etapa}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('etapa_carrera{numero_etapa}')): ?>
    <?php echo form_error('etapa_carrera{numero_etapa}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($etapa_carrera, 'getNumeroEtapa', array (
  'size' => 7,
  'control_name' => 'etapa_carrera[numero_etapa]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('etapa_carrera' => $etapa_carrera)) ?>

<?php echo "</form>" ?>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($etapa_carrera->getIdEtapa() && $etapa_carrera->getIdCarrera()): ?>
<?php echo button_to(__('delete'), 'etapacarrera/delete?id_etapa='.$etapa_carrera->getIdEtapa().'&id_carrera='.$etapa_carrera->getIdCarrera(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
