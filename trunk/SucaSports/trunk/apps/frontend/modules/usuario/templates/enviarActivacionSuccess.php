<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<div id="sf_admin_container">
	<h1><?php echo __('Registro de Usuario', array()) ?></h1>
	
	<div id="sf_admin_content">
		<?php if ($sf_user->hasFlash('notice')): ?>
		<div class="save-ok">
		<h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
		</div>
		<?php elseif ($sf_user->hasFlash('error')): ?>
		<div class="form-errors">
		<h2><?php echo __($sf_user->getFlash('error')) ?></h2>
		</div>
		<?php endif; ?>
		
		
		Ingrese aca su mail<br/>
		Haga click aqui<br/>
		y le enviamos una nueva clave de activación<br/>
		si la cuenta existe<br/>
	</div>
	
</div>