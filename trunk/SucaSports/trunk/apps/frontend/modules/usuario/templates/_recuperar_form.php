<?php echo form_tag('usuario/enviarCorreoRecuperar', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

	<?php echo object_input_hidden_tag($usuario, 'getId') ?>
	<fieldset id="sf_fieldset_none" class="">
		<div class="form-row">
		  <?php echo label_for('usuario[email]', 'Ingrese su correo electronico') ?>
		  <div class="content<?php if ($sf_request->hasError('usuario{email}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('usuario{email}')): ?>
		    <?php echo form_error('usuario{email}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>
		
		  <?php $value = input_tag('email','', array (
		  'size' => 45
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</div>
	</fieldset>
	<?php include_partial('recuperar_actions', array('usuario' => $usuario)) ?>
<?php echo "</form>" ?>

