<?php echo form_tag('carrera/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($carrera, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('carrera[nombre]', __($labels['carrera{nombre}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{nombre}')): ?>
    <?php echo form_error('carrera{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carrera, 'getNombre', array (
  'size' => 45,
  'control_name' => 'carrera[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[url]', __($labels['carrera{url}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{url}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{url}')): ?>
    <?php echo form_error('carrera{url}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carrera, 'getUrl', array (
  'size' => 45,
  'control_name' => 'carrera[url]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[descripcion]', __($labels['carrera{descripcion}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{descripcion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{descripcion}')): ?>
    <?php echo form_error('carrera{descripcion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($carrera, 'getDescripcion', array (
  'size' => '30x3',
  'control_name' => 'carrera[descripcion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[categoria_carrera]', __($labels['carrera{categoria_carrera}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{categoria_carrera}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{categoria_carrera}')): ?>
    <?php echo form_error('carrera{categoria_carrera}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list($carrera, 'getCategoriaCarrera', array (
  'control_name' => 'carrera[categoria_carrera]',
  'through_class' => 'CategoriaCarrera',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[etapa_carrera]', __($labels['carrera{etapa_carrera}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{etapa_carrera}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{etapa_carrera}')): ?>
    <?php echo form_error('carrera{etapa_carrera}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_hidden_tag($carrera, 'getEtapaCarrera', array (
  'disabled' => true,
  'control_name' => 'carrera[etapa_carrera]',
  'hidden' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('carrera' => $carrera)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($carrera->getId()): ?>
<?php echo button_to(__('delete'), 'carrera/delete?id='.$carrera->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
