<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Editar mi perfil', array()) ?></h1>

<div id="sf_admin_header">

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="save-ok">
    <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
  </div>
<?php endif; ?>


</div>

<div id="sf_admin_content">

  <?php echo form_tag('corredor/guardarPerfil', array(
    'id'        => 'sf_admin_edit_form',
    'name'      => 'sf_admin_edit_form',
    'multipart' => true,
  )) ?>
  
  <?php echo object_input_hidden_tag($corredor, 'getId') ?>
  
  Mis Carreras  
  
  <ul class="sf_admin_actions">
    <li><?php echo submit_tag(__('save'), array (
    'name' => 'save',
    'class' => 'sf_admin_action_save',
  )) ?></li>
  </ul>

  <?php echo "</form>" ?>
</div>

<div id="sf_admin_footer">

</div>

</div>
 
