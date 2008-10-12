<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<script type="text/javascript">
  dojo.require("dijit.form.Form");
  dojo.require("dijit.form.TextBox");
  dojo.require("dijit.form.TimeTextBox");
  dojo.require("dijit.form.Button");
  dojo.require("dijit.form.DateTextBox");
  dojo.require("dijit.form.FilteringSelect");
  dojo.require("dojo.parser");  // scan page for widgets and instantiate them
</script>

<button dojoType="dijit.form.Button" onclick="dijit.byId('miPerfil').show()">Editar mi Perfil</button>

<div dojoType="dijit.form.Form" id="miPerfil" title="Perfil de Corredor"
    execute="alert('submitted w/args:\n' + dojo.toJson(arguments[0], true));">

  <?php echo form_tag('corredor/save', array(
    'id'        => 'sf_admin_edit_form',
    'name'      => 'sf_admin_edit_form',
    'multipart' => true,
  )) ?>
	<table width="80%" align="center">
		<tr valign="top">
			<td>
  <?php echo object_input_hidden_tag($corredor, 'getId') ?>
    <h2><?php echo __('Datos Personales') ?></h2>
    <table>
      <tr>
        <td>
          <?php echo label_for('corredor[id_tipo_documento]', __($labels['corredor{id_tipo_documento}']), '') ?>
    </td><td>
          <div class="content<?php if ($sf_request->hasError('corredor{id_tipo_documento}')): ?> form-error<?php endif; ?>">
            <?php if ($sf_request->hasError('corredor{id_tipo_documento}')): ?>
              <?php echo form_error('corredor{id_tipo_documento}', array('class' => 'form-error-msg')) ?>
            <?php endif; ?>
            <?php $value = object_select_tag($corredor, 'getIdTipoDocumento', array (
              'related_class' => 'TipoDocumento',
              'control_name' => 'corredor[id_tipo_documento]',
              'include_blank' => true,
              'dojoType' => 'dijit.form.FilteringSelect',
            )); echo $value ? $value : '&nbsp;' ?>
      	  </div>
	  	</td>
	  </tr>
	  <tr>
	  	<td>
          <?php echo label_for('corredor[documento]', __($labels['corredor{documento}']), '') ?>
    </td><td>
          <div class="content<?php if ($sf_request->hasError('corredor{documento}')): ?> form-error<?php endif; ?>">
            <?php if ($sf_request->hasError('corredor{documento}')): ?>
              <?php echo form_error('corredor{documento}', array('class' => 'form-error-msg')) ?>
            <?php endif; ?>
            <?php $value = object_input_tag($corredor, 'getDocumento', array (
              'size' => 15,
              'control_name' => 'corredor[documento]',
              'dojoType' => 'dijit.form.TextBox',
            )); echo $value ? $value : '&nbsp;' ?>
          </div>
        </td>
      </tr>
    <tr>
      <td>
      <?php echo label_for('corredor[nombre]', __($labels['corredor{nombre}']), '') ?>
	  </td>
	  <td>
      <div class="content<?php if ($sf_request->hasError('corredor{nombre}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('corredor{nombre}')): ?>
        <?php echo form_error('corredor{nombre}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
	        <?php $value = object_input_tag($corredor, 'getNombre', array (
      'size' => 45,
      'control_name' => 'corredor[nombre]',
      'dojoType' => 'dijit.form.TextBox',
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
	  </td>
	</tr>
    <tr>
      <td>
      <?php echo label_for('corredor[apellido]', __($labels['corredor{apellido}']), '') ?>
	  </td>
	  <td>
      <div class="content<?php if ($sf_request->hasError('corredor{apellido}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('corredor{apellido}')): ?>
        <?php echo form_error('corredor{apellido}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($corredor, 'getApellido', array (
      'size' => 45,
      'control_name' => 'corredor[apellido]',
      'dojoType' => 'dijit.form.TextBox',
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
	  </td>
	</tr>
    <tr>
      <td>
      <?php echo label_for('corredor[sexo]', __($labels['corredor{sexo}']), '') ?>
	  </td>
	  <td>
      <div class="content<?php if ($sf_request->hasError('corredor{sexo}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('corredor{sexo}')): ?>
        <?php echo form_error('corredor{sexo}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($corredor, 'getSexo', array (
      'size' => 20,
      'control_name' => 'corredor[sexo]',
      'dojoType' => 'dijit.form.TextBox',
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
	  </td>
	</tr>
    <tr>
      <td>
      <?php echo label_for('corredor[fecha_nacimiento]', __($labels['corredor{fecha_nacimiento}']), '') ?>
	  </td>
	  <td>
      <div class="content<?php if ($sf_request->hasError('corredor{fecha_nacimiento}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('corredor{fecha_nacimiento}')): ?>
        <?php echo form_error('corredor{fecha_nacimiento}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_date_tag($corredor, 'getFechaNacimiento', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'corredor[fecha_nacimiento]',
      'dojoType' => 'dijit.form.TextBox',
   )); echo $value ? $value : '&nbsp;' ?>
        </div>
	  </td>
	</tr>
  </table>  
			</td>
			<td>
<h2><?php echo __('Contacto') ?></h2>
  <table>  
    <tr>
      <td>
    <?php echo label_for('corredor[telefono]', __($labels['corredor{telefono}']), '') ?>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{telefono}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{telefono}')): ?>
      <?php echo form_error('corredor{telefono}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_input_tag($corredor, 'getTelefono', array (
    'size' => 45,
    'control_name' => 'corredor[telefono]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>
    <?php echo label_for('corredor[movil]', __($labels['corredor{movil}']), '') ?>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{movil}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{movil}')): ?>
      <?php echo form_error('corredor{movil}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_input_tag($corredor, 'getMovil', array (
    'size' => 45,
    'control_name' => 'corredor[movil]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>
    <?php echo label_for('corredor[telefono_emergencia]', __($labels['corredor{telefono_emergencia}']), '') ?>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{telefono_emergencia}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{telefono_emergencia}')): ?>
      <?php echo form_error('corredor{telefono_emergencia}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_input_tag($corredor, 'getTelefonoEmergencia', array (
    'size' => 45,
    'control_name' => 'corredor[telefono_emergencia]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>
    <?php echo label_for('corredor[direccion]', __($labels['corredor{direccion}']), '') ?>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{direccion}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{direccion}')): ?>
      <?php echo form_error('corredor{direccion}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_input_tag($corredor, 'getDireccion', array (
    'size' => 45,
    'control_name' => 'corredor[direccion]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
	  </td>
	</tr>
    <tr>
      <td>
    <?php echo label_for('corredor[id_pais]', __($labels['corredor{id_pais}']), '') ?>
      </div>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{id_pais}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_pais}')): ?>
      <?php echo form_error('corredor{id_pais}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_select_tag($corredor, 'getIdPais', array (
    'related_class' => 'Pais',
    'control_name' => 'corredor[id_pais]',
    'include_blank' => true,
    'dojoType' => 'dijit.form.FilteringSelect',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>
    <?php echo label_for('corredor[id_localidad]', __($labels['corredor{id_localidad}']), '') ?>
	  </td><td>
    <div class="content<?php if ($sf_request->hasError('corredor{id_localidad}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_localidad}')): ?>
      <?php echo form_error('corredor{id_localidad}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php $value = object_select_tag($corredor, 'getIdLocalidad', array (
    'related_class' => 'Localidad',
    'control_name' => 'corredor[id_localidad]',
    'include_blank' => true,
    'dojoType' => 'dijit.form.FilteringSelect',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
  </table>  
			</td>
		</tr>
		<tr valign="top">
			<td>
  <h2><?php echo __('Datos Medicos') ?></h2>

  <table>  
    <tr>
      <td>      
    <?php echo label_for('corredor[id_sociedad_medica]', __($labels['corredor{id_sociedad_medica}']), '') ?>
	  </td><td>	  
    <div class="content<?php if ($sf_request->hasError('corredor{id_sociedad_medica}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_sociedad_medica}')): ?>
      <?php echo form_error('corredor{id_sociedad_medica}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_select_tag($corredor, 'getIdSociedadMedica', array (
    'related_class' => 'SociedadMedica',
    'control_name' => 'corredor[id_sociedad_medica]',
    'include_blank' => true,
    'dojoType' => 'dijit.form.FilteringSelect',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>      
    <?php echo label_for('corredor[historia_medica]', __($labels['corredor{historia_medica}']), '') ?>
	  </td><td>	  
    <div class="content<?php if ($sf_request->hasError('corredor{historia_medica}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{historia_medica}')): ?>
      <?php echo form_error('corredor{historia_medica}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_textarea_tag($corredor, 'getHistoriaMedica', array (
    'size' => '30x3',
    'control_name' => 'corredor[historia_medica]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
	</table>
		</td>
	</tr>		
	<tr>
		<td>	
  <h2><?php echo __('Datos Corredor') ?></h2>
  <table>  
    <tr>
      <td>      
    <?php echo label_for('corredor[id_chips]', __($labels['corredor{id_chips}']), '') ?>
	  </td><td>	  
    <div class="content<?php if ($sf_request->hasError('corredor{id_chips}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{id_chips}')): ?>
      <?php echo form_error('corredor{id_chips}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_select_tag($corredor, 'getIdChips', array (
    'related_class' => 'Chip',
    'control_name' => 'corredor[id_chips]',
    'include_blank' => true,
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
  </table>  

  <h2><?php echo __('Informacion Adicional') ?></h2>
  <table>  
    <tr>
      <td>      
    <?php echo label_for('corredor[pareja]', __($labels['corredor{pareja}']), '') ?>
	  </td><td>	  
    <div class="content<?php if ($sf_request->hasError('corredor{pareja}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{pareja}')): ?>
      <?php echo form_error('corredor{pareja}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($corredor, 'getPareja', array (
    'size' => 45,
    'control_name' => 'corredor[pareja]',
    'dojoType' => 'dijit.form.TextBox',
    )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
    <tr>
      <td>      
    <?php echo label_for('corredor[hijos]', __($labels['corredor{hijos}']), '') ?>
	  </td><td>	  
    <div class="content<?php if ($sf_request->hasError('corredor{hijos}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('corredor{hijos}')): ?>
      <?php echo form_error('corredor{hijos}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($corredor, 'getHijos', array (
    'size' => 45,
    'control_name' => 'corredor[hijos]',
    'dojoType' => 'dijit.form.TextBox',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>
	  </td>
	</tr>
  </table>  
		
	</table>

  <?php include_partial('edit_actions', array('corredor' => $corredor)) ?>

  <?php echo '</form>'; ?>

  <ul class="sf_admin_actions">
        <li class="float-left"><?php if ($corredor->getId()): ?>
  <?php echo button_to(__('delete'), 'corredor/delete?id='.$corredor->getId(), array (
    'post' => true,
    'confirm' => __('Are you sure?'),
    'class' => 'sf_admin_action_delete',
  )) ?><?php endif; ?>
  </li>
    </ul>

</div>