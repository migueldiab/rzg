<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Confirmar inscripcion?', array()) ?></h1>

<div id="sf_admin_header">
</div>

<div id="sf_admin_content">

	<?php echo form_tag('inscripcion/guardar', array(
	  'id'        => 'sf_admin_edit_form',
	  'name'      => 'sf_admin_edit_form',
	  'multipart' => true,
	)) ?>
	
	
	<fieldset id="sf_fieldset_none" class="">
	
	<div class="form-row">
  <?php echo label_for('inscripcion[id_corredor]', __('Documento')) ?>	
  <?php echo object_input_tag($inscripcion, 'getIdCorredor', array('disabled'=>'true')) ?>
  </div>
  <div class="form-row">
  <?php echo label_for('inscripcion[id_carrera]', __('Carrera')) ?> 
  <?php echo object_input_tag($inscripcion, 'getIdCarrera', array('disabled'=>'true')) ?>
  </div>
  <div class="form-row">
  <?php echo label_for('inscripcion[id_etapa]', __('Etapa')) ?> 
  <?php echo object_input_tag($inscripcion, 'getIdEtapa', array('disabled'=>'true')) ?>
  </div>
  <div class="form-row">
  <?php echo label_for('inscripcion[fecha_inicio]', __('Fecha de Inicio')) ?> 
  <?php echo object_input_tag($inscripcion, 'getFechaInicio', array('disabled'=>'true')) ?>
  </div>
  <div class="form-row">
  <?php echo label_for('inscripcion[id_categoria]', __('Categoria')) ?> 
  <?php echo object_select_tag($inscripcion, 'getIdCategoria', array (
    'control_name' => 'inscripcion[id_categoria]',
    'related_class' => 'Categoria'
  ), '') ?>
  <div class="form-row">
  <?php echo label_for('cuenta_corriente[id_forma_pago]', __('Forma de Pago')) ?> 
  <?php echo object_select_tag($cuenta_corriente, 'getIdFormaPago', array (
    'control_name' => 'cuenta_corriente[id_forma_pago]',
    'related_class' => 'FormaPago'
  ), '') ?>
  
  </div>
	
	
	</fieldset>
		
		<ul class="sf_admin_actions">
		  <li><?php echo submit_tag(__('confirmar'), array (
		  'name' => 'save',
		  'class' => 'sf_admin_action_save',
		)) ?></li>
		<li><?php echo button_to(__('cancelar'), '@homepage',array (
      'name' => 'cancel',
      'class' => 'sf_admin_action_delete',
    )) ?></li>		
		</ul>
	
	<?php echo "</form>" ?>
	


</div>

<div id="sf_admin_footer">
</div>

</div>

