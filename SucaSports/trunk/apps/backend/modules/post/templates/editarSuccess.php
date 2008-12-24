<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Nueva entrada', 
array()) ?></h1>

<div id="sf_admin_header">
</div>

<div id="sf_admin_content">
<?php include_partial('post/editar_messages', array('post' => $post, 'labels' => $labels)) ?>
<?php include_partial('post/editar_form', array('post' => $post, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
</div>

</div>
