<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<span id="ttRich">
  <?php echo link_to_remote('Listar Carreras',
    array(
      'url' => 'carrera/list',
      'update' => 'basicFormTab'        
    )
  ) ?>
</span>
<span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
  Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
</span>
