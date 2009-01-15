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
  
  <fieldset id="sf_fieldset_contacto" class="">
  <h2><?php echo __('Contacto') ?></h2>
  
  
  <div class="form-row">
    <?php echo label_for('corredor[telefono]', __($labels['corredor{telefono}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{telefono}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{telefono}')): ?>
      <?php echo form_error('corredor{telefono}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_input_tag($corredor, 'getTelefono', array (
    'size' => 45,
    'control_name' => 'corredor[telefono]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[movil]', __($labels['corredor{movil}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{movil}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{movil}')): ?>
      <?php echo form_error('corredor{movil}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_input_tag($corredor, 'getMovil', array (
    'size' => 45,
    'control_name' => 'corredor[movil]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[telefono_emergencia]', __($labels['corredor{telefono_emergencia}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{telefono_emergencia}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{telefono_emergencia}')): ?>
      <?php echo form_error('corredor{telefono_emergencia}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_input_tag($corredor, 'getTelefonoEmergencia', array (
    'size' => 45,
    'control_name' => 'corredor[telefono_emergencia]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[direccion]', __($labels['corredor{direccion}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{direccion}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{direccion}')): ?>
      <?php echo form_error('corredor{direccion}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_input_tag($corredor, 'getDireccion', array (
    'size' => 45,
    'control_name' => 'corredor[direccion]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[id_pais]', __($labels['corredor{id_pais}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{id_pais}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_pais}')): ?>
      <?php echo form_error('corredor{id_pais}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_select_tag($corredor, 'getIdPais', array (
    'related_class' => 'Pais',
    'control_name' => 'corredor[id_pais]',
    'include_blank' => true,
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
  </div>
  
  <div class="form-row">
    <?php echo label_for('corredor[id_localidad]', __($labels['corredor{id_localidad}']), '') ?>
    <div class="content<?php if ($sf_request->hasError('corredor{id_localidad}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_localidad}')): ?>
      <?php echo form_error('corredor{id_localidad}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
  
    <?php $value = object_select_tag($corredor, 'getIdLocalidad', array (
    'related_class' => 'Localidad',
    'control_name' => 'corredor[id_localidad]',
    'include_blank' => true,
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
 
