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
  <div style="padding:8px">
    <h2>Categorias</h2>
    <ul>
      <li>
        <span id="ttRich"><?php echo link_to_remote('Listar Categorias',
          array(
          'url' => 'categoria/list',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>

      <li>
        <span id="ttRich"><?php echo link_to_remote('Crear Categoria',
          array(
          'url' => 'categoria/edit',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
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
        <span id="ttRich"><?php echo link_to_remote('Listar Tipo de Documento',
          array(
          'url' => 'tipodocumento/list',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
        <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
          Link AJAX que llama a carrera/list y lo actualiza en la ventana basicFormTab de la derecha
        </span>
      </li>
    </ul>
  </div>  
