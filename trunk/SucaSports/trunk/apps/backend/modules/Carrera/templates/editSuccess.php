<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit carrera', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('carrera/edit_header', array('carrera' => $carrera)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('carrera/edit_messages', array('carrera' => $carrera, 'labels' => $labels)) ?>
<?php include_partial('carrera/edit_form', array('carrera' => $carrera, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('carrera/edit_footer', array('carrera' => $carrera)) ?>
</div>

</div>
