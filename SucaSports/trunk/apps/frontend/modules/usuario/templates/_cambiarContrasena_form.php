<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo form_tag('usuario/login', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($usuario, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

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

    <?php include_partial('cambiarContrasena_actions', array('usuario' => $usuario)) ?>

<?php echo "</form>" ?>

