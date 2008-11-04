<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

  <div dojoType="dijit.layout.ContentPane" class="box">
    Carrera mas importante
    <?php echo  link_to_remote(
      'Mi Perfil', 
      array( 
        'update' => 'cuadroAjax', 
        'url' => 'corredor/perfil',
        'script' => 'true',
      )
    ) ?>

  </div>
  <div dojoType="dijit.layout.ContentPane" class="box">
      <div dojoType="dijit.layout.ContentPane" class="box">
        carrera
      </div>
      <div dojoType="dijit.layout.ContentPane" hasShadow="true" class="box">
        carrera
      </div>
      <div dojoType="dijit.layout.ContentPane" class="box">
        carrera
      </div>
  </div>
  <div id='cuadroAjax' style="display: none">

  </div>
