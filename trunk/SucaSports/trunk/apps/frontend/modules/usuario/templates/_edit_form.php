<?php echo form_tag('usuario/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($usuario, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('usuario[documento]', __($labels['usuario{documento}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{documento}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{documento}')): ?>
    <?php echo form_error('usuario{documento}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getDocumento', array (
  'size' => 45,
  'control_name' => 'usuario[documento]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[email]', __($labels['usuario{email}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{email}')): ?>
    <?php echo form_error('usuario{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuario, 'getEmail', array (
  'size' => 45,
  'control_name' => 'usuario[email]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[password]', __($labels['usuario{password}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{password}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{password}')): ?>
    <?php echo form_error('usuario{password}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_password_tag('usuario[password]');?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuario[verify_password]', __($labels['usuario{verify_password}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuario{verify_password}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuario{verify_password}')): ?>
    <?php echo form_error('usuario{verify_password}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_password_tag('usuario[verify_password]');?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('usuario' => $usuario)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($usuario->getId()): ?>
<?php echo button_to(__('delete'), 'usuario/delete?id='.$usuario->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
