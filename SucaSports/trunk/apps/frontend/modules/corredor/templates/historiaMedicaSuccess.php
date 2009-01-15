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
  
  <fieldset id="sf_fieldset_datos_medicos" class="">
  <h2><?php echo __('Datos Medicos') ?></h2>
  
  
  <div class="form-row">
    <?php echo label_for('corredor[id_sociedad_medica]', __($labels['corredor{id_sociedad_medica}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{id_sociedad_medica}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_sociedad_medica}')): ?>
      <?php echo form_error('corredor{id_sociedad_medica}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_select_tag($corredor, 'getIdSociedadMedica', array (
    'related_class' => 'SociedadMedica',
    'control_name' => 'corredor[id_sociedad_medica]',
    'include_blank' => true,
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[historia_medica]', __($labels['corredor{historia_medica}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{historia_medica}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{historia_medica}')): ?>
      <?php echo form_error('corredor{historia_medica}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_textarea_tag($corredor, 'getHistoriaMedica', array (
    'size' => '30x3',
    'control_name' => 'corredor[historia_medica]',
    'rich' => true,
    'tinymce_options' => sfConfig::get('app_tinymce_options'),
    
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  </fieldset>
  
  
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
 
