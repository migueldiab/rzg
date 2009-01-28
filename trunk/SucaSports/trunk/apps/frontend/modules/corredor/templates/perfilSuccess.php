<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1><?php echo __('Mi perfil', array()) ?></h1>
  
  <div id="sf_admin_header">
  
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="save-ok">
        <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
      </div>
    <?php endif; ?>
    
  
  </div>
  
  <div id="sf_admin_content">
   <ul>
     <li>
      <?php echo link_to('Datos Personales', 'corredor/datosPersonales') ?>
      </li>
      <?php if (isset($corredor)): ?>
        <li>
          <?php echo link_to('Información de Contacto', 'corredor/contacto') ?>
	</li>
	<li>
          <?php echo link_to('Historia Médica', 'corredor/historiaMedica') ?>
	</li>
        <li>
          <?php echo link_to('Mi Equipamiento', 'corredor/equipamiento') ?>
        </li>
        <li>
          <?php echo link_to('Mis Carreras', 'corredor/carreras') ?>
        </li>
        <li>
          <?php echo link_to('Mi Cuenta', 'corredor/cuenta') ?>
        </li>
      <?php else: ?>
        <li>
        <?php echo 'Información de Contacto' ?>
        </li>
        <li>
        <?php echo 'Historia Médica' ?>
        </li>
        <li>
        <?php echo 'Mi Equipamiento' ?>
        </li>
        <li>
        <?php echo 'Mis Carreras' ?>
        </li>
        <li>
        <?php echo 'Mi Cuenta' ?>      
        </li>
      <?php endif; ?>
    </ul>
  </div>
  
</div>