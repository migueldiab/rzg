<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Editar mi perfil', array()) ?></h1>

<div id="sf_admin_header">

</div>

<div id="sf_admin_content">

	<?php echo form_tag('corredor/guardarPerfil', array(
	  'id'        => 'sf_admin_edit_form',
	  'name'      => 'sf_admin_edit_form',
	  'multipart' => true,
	)) ?>
	
	<?php echo object_input_hidden_tag($corredor, 'getId') ?>
	
	<fieldset id="sf_fieldset_datos_personales" class="">
	<h2><?php echo __('Datos Personales') ?></h2>
	
	
	<div class="form-row">
	  <?php echo label_for('corredor[id_tipo_documento]', __($labels['corredor{id_tipo_documento}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{id_tipo_documento}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{id_tipo_documento}')): ?>
	    <?php echo form_error('corredor{id_tipo_documento}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_select_tag($corredor, 'getIdTipoDocumento', array (
	  'related_class' => 'TipoDocumento',
	  'control_name' => 'corredor[id_tipo_documento]',
	  'include_blank' => true,
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[documento]', __($labels['corredor{documento}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{documento}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{documento}')): ?>
	    <?php echo form_error('corredor{documento}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getDocumento', array (
	  'size' => 45,
	  'control_name' => 'corredor[documento]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[nombre]', __($labels['corredor{nombre}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{nombre}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{nombre}')): ?>
	    <?php echo form_error('corredor{nombre}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getNombre', array (
	  'size' => 45,
	  'control_name' => 'corredor[nombre]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[apellido]', __($labels['corredor{apellido}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{apellido}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{apellido}')): ?>
	    <?php echo form_error('corredor{apellido}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getApellido', array (
	  'size' => 45,
	  'control_name' => 'corredor[apellido]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[sexo]', __($labels['corredor{sexo}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{sexo}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{sexo}')): ?>
	    <?php echo form_error('corredor{sexo}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getSexo', array (
	  'size' => 20,
	  'control_name' => 'corredor[sexo]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[fecha_nacimiento]', __($labels['corredor{fecha_nacimiento}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{fecha_nacimiento}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{fecha_nacimiento}')): ?>
	    <?php echo form_error('corredor{fecha_nacimiento}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_date_tag($corredor, 'getFechaNacimiento', array (
	  'rich' => true,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'corredor[fecha_nacimiento]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	</fieldset>
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
	<fieldset id="sf_fieldset_datos_corredor" class="">
	<h2><?php echo __('Datos Corredor') ?></h2>
	
	
	<div class="form-row">
	  <?php echo label_for('corredor[id_chips]', __($labels['corredor{id_chips}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{id_chips}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{id_chips}')): ?>
	    <?php echo form_error('corredor{id_chips}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_select_tag($corredor, 'getIdChips', array (
	  'related_class' => 'Chip',
	  'control_name' => 'corredor[id_chips]',
	  'include_blank' => true,
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	</fieldset>
	<fieldset id="sf_fieldset_informacion_adicional" class="">
	<h2><?php echo __('Informacion Adicional') ?></h2>
	
	
	<div class="form-row">
	  <?php echo label_for('corredor[pareja]', __($labels['corredor{pareja}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{pareja}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{pareja}')): ?>
	    <?php echo form_error('corredor{pareja}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getPareja', array (
	  'size' => 45,
	  'control_name' => 'corredor[pareja]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
	</div>
	
	<div class="form-row">
	  <?php echo label_for('corredor[hijos]', __($labels['corredor{hijos}']), '') ?>
	  <div class="content<?php if ($sf_request->hasError('corredor{hijos}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('corredor{hijos}')): ?>
	    <?php echo form_error('corredor{hijos}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>
	
	  <?php $value = object_input_tag($corredor, 'getHijos', array (
	  'size' => 45,
	  'control_name' => 'corredor[hijos]',
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
 
