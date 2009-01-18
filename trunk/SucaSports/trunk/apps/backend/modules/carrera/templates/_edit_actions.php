<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'carrera/list?id='.$carrera->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
      <li><?php echo button_to(__('Agregar Etapa'), 'carrera/etapa?id='.$carrera->getId(), array (
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
