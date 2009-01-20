<div dojoType="dijit.layout.AccordionPane" title="Administracion">
  <div style="padding:8px">
    <h2>Carreras</h2>
    <ul>
      <li>
        <span id="ttRich"><?php echo link_to('Listar Carreras','carrera/list') ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

      <li>
        <span id="ttRich"><?php echo link_to('Crear Carrera','carrera/edit') ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/create y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

    </ul>
  </div>
  <div style="padding:8px">
    <h2>Categorias</h2>
    <ul>
      <li>
        <span id="ttRich"><?php echo link_to('Listar Categorias','categoria/list') ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

      <li>
        <span id="ttRich"><?php echo link_to('Crear Categoria','categoria/edit') ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/create y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

    </ul>
  </div>  
  <div style="padding:8px">
    <h2>Varios</h2>
    <ul>
      <li>
        <span id="ttRich"><?php echo link_to('Listar Tipo de Documento','tipodocumento/list') ?></span>
        </li>
        <li>
        <span id="ttRich"><?php echo link_to('Forma de Pago','formapago/list') ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>
    </ul>
  </div>  
</div>
