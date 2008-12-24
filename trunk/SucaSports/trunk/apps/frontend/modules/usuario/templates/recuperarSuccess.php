<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Recuperar Contraseña',
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('usuario/recuperar_header', array('usuario' => $usuario)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('usuario/recuperar_messages', array('usuario' => $usuario, 'labels' => $labels)) ?>
<?php include_partial('usuario/recuperar_form', array('usuario' => $usuario, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('usuario/recuperar_footer', array('usuario' => $usuario)) ?>
</div>

</div>
