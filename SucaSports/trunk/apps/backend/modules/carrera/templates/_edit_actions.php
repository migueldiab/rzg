<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'carrera/list?id='.$carrera->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>

  <li><?php echo submit_tag(__('Agregar Etapa'), array (
  'name' => 'agregar_etapa',
  'class' => 'sf_admin_action_save_and_add',
)) ?></li>
</ul>
