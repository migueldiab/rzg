<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<div dojoType="dijit.layout.AccordionPane" title="Administracion">
  <div style="padding:8px">
    <h2>Carreras</h2>
    <ul>
      <li>
        <span id="ttRich"><?php echo link_to_remote('Listar Carreras',
          array(
          'url' => 'carrera/list',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

      <li>
        <span id="ttRich"><?php echo link_to_remote('Crear Carrera',
          array(
          'url' => 'carrera/edit',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/create y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

    </ul>
  </div>
</div>
<div dojoType="dijit.layout.AccordionPane" title="Alquileres">
  <div style="padding:8px">
    <h2>Tooltips</h2>
    <ul>
      <li>
      <span id="ttRich"><b>rich</b> <i>text</i> tooltip</span>

      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Embedded <b>bold</b> <i>RICH</i> text <span style="color:#309; font-size:x-large;">weirdness!</span>
      </span>
      </li>

      <li><a id="ttOne" href="#bogus">anchor tooltip</a>

      <span dojoType="dijit.Tooltip" connectId="ttOne" style="display:none;">tooltip on anchor</span>
      </li>
    </ul>
  </div>
</div>
<div dojoType="dijit.layout.AccordionPane" title="Listados">
  <div style="padding:8px">
    <h2>Tooltips</h2>
    <ul>
      <li>
      <span id="ttRich"><b>rich</b> <i>text</i> tooltip</span>

      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Embedded <b>bold</b> <i>RICH</i> text <span style="color:#309; font-size:x-large;">weirdness!</span>
      </span>
      </li>

      <li><a id="ttOne" href="#bogus">anchor tooltip</a>

      <span dojoType="dijit.Tooltip" connectId="ttOne" style="display:none;">tooltip on anchor</span>
      </li>
    </ul>
  </div>
</div>
    