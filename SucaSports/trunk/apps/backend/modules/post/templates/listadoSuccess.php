<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('post list', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('post/listado_header', array('pager' => $pager)) ?>
<?php include_partial('post/listado_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('post/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('listado_batch_actions') ?>
<?php include_partial('listado_actions') ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('post/listado_footer', array('pager' => $pager)) ?>
</div>

</div>