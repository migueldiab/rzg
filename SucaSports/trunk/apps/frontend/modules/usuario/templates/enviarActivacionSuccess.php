<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1><?php echo __('Reenviar Activacion',array()) ?></h1>

  <div id="sf_admin_header">

  </div>

  <div id="sf_admin_content">

    <?php if ($sf_request->hasErrors()): ?>
      <div class="form-errors">
      <h2><?php echo __('Existen errores que impiden validar el formulario.') ?></h2>
      <dl>
        <?php foreach ($sf_request->getErrorNames() as $name): ?>
          <dt><?php echo __($labels[$name]) ?></dt>
          <dd><?php echo __($sf_request->getError($name)) ?></dd>
        <?php endforeach; ?>
      </dl>
      </div>
    <?php elseif ($sf_user->hasFlash('notice')): ?>
      <div class="save-ok">
      <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
      </div>
    <?php elseif ($sf_user->hasFlash('error')): ?>
      <div class="form-errors">
        <h2><?php echo __($sf_user->getFlash('error')) ?></h2>
      </div>
    <?php endif; ?>

    <?php echo form_tag('usuario/enviarActivacion', array(
      'id'        => 'sf_admin_edit_form',
      'name'      => 'sf_admin_edit_form',
      'multipart' => true,
    )) ?>

      <?php echo object_input_hidden_tag($usuario, 'getId') ?>
      <fieldset id="sf_fieldset_none" class="">
        <div class="form-row">
          <?php echo label_for('email', 'Ingrese su correo electronico') ?>
          <div class="content<?php if ($sf_request->hasError('email')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('email')): ?>
            <?php echo form_error('email', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = input_tag('email','', array (
              'size' => 45
            )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </div>
      </fieldset>
      <?php include_partial('recuperar_actions', array('usuario' => $usuario)) ?>
    <?php echo "</form>" ?>


  </div>

  <div id="sf_admin_footer">

  </div>

</div>

