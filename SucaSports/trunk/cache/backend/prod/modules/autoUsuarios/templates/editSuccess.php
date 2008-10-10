<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit usuarios', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('usuarios/edit_header', array('usuarios' => $usuarios)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('usuarios/edit_messages', array('usuarios' => $usuarios, 'labels' => $labels)) ?>
<?php include_partial('usuarios/edit_form', array('usuarios' => $usuarios, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('usuarios/edit_footer', array('usuarios' => $usuarios)) ?>
</div>

</div>
