<?php if ($sf_request->hasErrors()): ?>
<div class="form-errors">
<h2><?php echo __('Existen errores que impiden validar el formulario.') ?></h2>
<dl>
<?php foreach ($sf_request->getErrorNames() as $name): ?>
  <dt><?php echo __($labels[$name]) ?></dt>
  <dd><?php echo __($sf_request->getError($name)) ?></dd>
<?php endforeach; ?>
</dl>
</div>
<?php elseif ($sf_user->hasFlash('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
</div>
<?php endif; ?>
