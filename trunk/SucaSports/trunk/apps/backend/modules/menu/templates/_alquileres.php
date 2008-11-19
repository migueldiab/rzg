  <div style="padding:8px">
    <h2>Alquilar</h2>
    <ul>
      <li>
      <span id="ttRich"><?php echo link_to_remote('Equipamiento',
          array(
          'url' => 'alquiler/create',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Ingresa un nuevo alquiler de equipamiento
      </span>
      </li>
      <li>
      <span id="ttRich"><?php echo link_to_remote('Chips',
          array(
          'url' => 'chips/alquilar',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Ingresa un nuevo alquiler de chips
      </span>
      </li>
    </ul>
  </div>

  <div style="padding:8px">
    <h2>Administrar</h2>
    <ul>
      <li>
      <span id="ttRich"><?php echo link_to_remote('Listar Equipamiento',
          array(
          'url' => 'equipamiento/list',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Muestra el equipamiento y el estado del mismo
      </span>
      </li>
      <li>
      <span id="ttRich"><?php echo link_to_remote('Agregar Equipamiento',
          array(
          'url' => 'equipamiento/create',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Agrega un nuevo equipamiento
      </span>
      </li>
      <li>
      <span id="ttRich"><?php echo link_to_remote('Agregar Chips',
          array(
          'url' => 'chips/create',
          'update' => 'basicFormTab'        
          )
        ) ?></span>
      <span dojoType="dijit.Tooltip" connectId="ttRich" style="display:none;">
        Agrega un nuevo chips
      </span>
      </li>

    </ul>
  </div>