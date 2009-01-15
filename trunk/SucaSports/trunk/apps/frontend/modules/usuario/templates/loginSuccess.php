<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Registro de Usuario', array()) ?></h1>
	<?php echo form_tag('usuario/login', array(
	  'id'        => 'sf_admin_edit_form',
	  'name'      => 'sf_admin_edit_form',
	  'multipart' => true,
	)) ?>

  <div id="sf_admin_content">
    <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
    <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
    <?php elseif ($sf_user->hasFlash('error')): ?>
    <div class="form-errors">
    <h2><?php echo __($sf_user->getFlash('error')) ?></h2>
    </div>
    <?php endif; ?>
	  <fieldset>
		  <h2>Ingresa al sitio...</h2>
		  <div class="form-row">
		    <?php echo form_error('usuario') ?>
		    <label for="usuario">Documento :</label>
		    <?php echo input_tag('usuario', $sf_params->get('usuario')) ?>
		  </div>
		 
		  <div class="form-row">
		    <?php echo form_error('password') ?>
		    <label for="password">Password:</label>
		    <?php echo input_password_tag('password') ?>
		  </div>
		  <div class="form-row">
		    <?php echo link_to('Olvidaste tu clave?','usuario/recuperar') ?> / 
		    <?php echo link_to('Registrate ya!','usuario/registrar') ?>
		    
		  </div>
		  
		  <?php echo input_hidden_tag('url_original', $sf_request->getAttribute('url_original')) ?>
    </fieldset>
  </div>  
  <ul class="sf_admin_actions">
    <li class="float-right">
       <?php echo submit_tag('ingresar', array (
		    //'confirm' => __('Are you sure?'),
		    'class' => 'sf_admin_action_save',
		)) ?>
    </li>
  </ul>
  <?php echo "</form>" ?>
</div>
  

