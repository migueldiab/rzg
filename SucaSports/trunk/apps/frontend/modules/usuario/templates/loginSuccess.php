<?php use_helper('Validation') ?>
<?php echo form_tag('usuario/login') ?>
 
  <fieldset>
 
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
 
  </fieldset>
 
  <?php echo input_hidden_tag('url_original', $sf_request->getAttribute('url_original')) ?>
  <?php echo submit_tag('log in') ?>
 
<?php echo "</form>" ?>

