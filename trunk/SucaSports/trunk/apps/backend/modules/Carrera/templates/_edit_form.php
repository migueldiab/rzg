<form>
<?php echo form_tag('carrera/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
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
  <?php echo label_for('carrera[nombre]', __('Categoria'), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{categoria}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{categoria}')): ?>
    <?php echo form_error('carrera{categoria}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($carrera, 'getId', array (
  'related_class' => 'Categoria',
  'control_name' => 'carrera[id_categoria]',
  'include_blank' => true,
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
  <?php echo label_for('carrera[created_at]', __($labels['carrera{created_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{created_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{created_at}')): ?>
    <?php echo form_error('carrera{created_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($carrera, 'getCreatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'carrera[created_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[created_by]', __($labels['carrera{created_by}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{created_by}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{created_by}')): ?>
    <?php echo form_error('carrera{created_by}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carrera, 'getCreatedBy', array (
  'size' => 7,
  'control_name' => 'carrera[created_by]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[updated_at]', __($labels['carrera{updated_at}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{updated_at}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{updated_at}')): ?>
    <?php echo form_error('carrera{updated_at}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($carrera, 'getUpdatedAt', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'carrera[updated_at]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('carrera[updated_by]', __($labels['carrera{updated_by}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('carrera{updated_by}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('carrera{updated_by}')): ?>
    <?php echo form_error('carrera{updated_by}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($carrera, 'getUpdatedBy', array (
  'size' => 45,
  'control_name' => 'carrera[updated_by]',
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
