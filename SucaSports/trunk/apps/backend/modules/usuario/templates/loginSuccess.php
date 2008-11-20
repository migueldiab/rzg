<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  
  <?php include_title() ?>

</head>
<body>

<?php use_helper('Validation') ?>

	<div id="sf_admin_container">
	  <?php echo form_tag('usuario/login', array(
	    'id'        => 'sf_admin_edit_form',
	    'name'      => 'sf_admin_edit_form',
	    'multipart' => true,
	  )) ?>
	  <div id="sf_admin_content">
	    <fieldset>
	      <h2>Ingresa al sitio...</h2>
	      <div class="form-row">
	        <?php echo form_error('usuario') ?>
	        <label for="usuario">Usuario :</label>
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
	  <?php echo "</form>" ?>
	  </div>  
	  <ul class="sf_admin_actions">
	    <li class="float-right">
	       <?php echo submit_tag('ingresar', array (
	        //'confirm' => __('Are you sure?'),
	        'class' => 'sf_admin_action_save',
	    )) ?>
	    </li>
	  </ul>
	</div>
</body>
</html>