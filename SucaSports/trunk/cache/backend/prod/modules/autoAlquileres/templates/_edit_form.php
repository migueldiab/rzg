<?php echo form_tag('alquileres/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($alquileres, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('alquileres[id_equipamiento]', __($labels['alquileres{id_equipamiento}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('alquileres{id_equipamiento}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alquileres{id_equipamiento}')): ?>
    <?php echo form_error('alquileres{id_equipamiento}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alquileres, 'getIdEquipamiento', array (
  'related_class' => 'Inventario',
  'control_name' => 'alquileres[id_equipamiento]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('alquileres[id_fecha_carrera]', __($labels['alquileres{id_fecha_carrera}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('alquileres{id_fecha_carrera}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('alquileres{id_fecha_carrera}')): ?>
    <?php echo form_error('alquileres{id_fecha_carrera}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($alquileres, 'getIdFechaCarrera', array (
  'related_class' => 'FechaEtapaCarrera',
  'control_name' => 'alquileres[id_fecha_carrera]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('alquileres' => $alquileres)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($alquileres->getId()): ?>
<?php echo button_to(__('delete'), 'alquileres/delete?id='.$alquileres->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
