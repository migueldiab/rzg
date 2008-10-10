<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit alquileres', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('alquileres/edit_header', array('alquileres' => $alquileres)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('alquileres/edit_messages', array('alquileres' => $alquileres, 'labels' => $labels)) ?>
<?php include_partial('alquileres/edit_form', array('alquileres' => $alquileres, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('alquileres/edit_footer', array('alquileres' => $alquileres)) ?>
</div>

</div>
