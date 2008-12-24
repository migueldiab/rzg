<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1><?php echo __('Calendario',  array()) ?></h1>

  <div id="sf_admin_header">
  </div>

    <?php echo form_tag('portal/calendario', array(
      'id'        => 'sf_admin_edit_form',
      'name'      => 'sf_admin_edit_form',
      'multipart' => true,
    )) ?>

    <?php echo object_input_hidden_tag($portal, 'getId') ?>

      <?php $value = object_textarea_tag($portal, 'getTexto', array (
      'size' => '30x3',
      'control_name' => 'portal[texto]',
      'rich' => true,
      'tinymce_options' => sfConfig::get('app_tinymce_options'),
    )); echo $value ? $value : '&nbsp;' ?>

    <ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('Guardar'), array (
      'name' => 'save',
      'class' => 'sf_admin_action_save',
    )) ?></li>
    </ul>

    <?php echo '</form>'?>

  <div id="sf_admin_footer">
  </div>

</div>
