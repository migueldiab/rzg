<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit etapacarrera', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('etapacarrera/edit_header', array('etapa_carrera' => $etapa_carrera)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('etapacarrera/edit_messages', array('etapa_carrera' => $etapa_carrera, 'labels' => $labels)) ?>
<?php include_partial('etapacarrera/edit_form', array('etapa_carrera' => $etapa_carrera, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('etapacarrera/edit_footer', array('etapa_carrera' => $etapa_carrera)) ?>
</div>

</div>
