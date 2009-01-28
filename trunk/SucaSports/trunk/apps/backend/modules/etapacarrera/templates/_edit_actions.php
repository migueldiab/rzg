<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'etapacarrera/list?id_etapa='.$etapa_carrera->getIdEtapa().'&id_carrera='.$etapa_carrera->getIdCarrera(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag(__('Guardar/Agregar Fecha de Etapa'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
<!--      <li><?php echo button_to(__('Agregar Fecha de Etapa'), 'etapacarrera/fecha?id_etapa='.$etapa_carrera->getIdEtapa().'&id_carrera='.$etapa_carrera->getIdCarrera(), array (
    'class' => 'sf_admin_action_save_and_add',
)) ?></li>-->
</ul>
