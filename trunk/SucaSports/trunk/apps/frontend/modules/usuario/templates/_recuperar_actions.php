<ul class="sf_admin_actions">
    <li><?php echo button_to(__('list'), 'usuario/list?id='.$usuario->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
    <li><?php echo submit_tag(__('Recuperar'), array (
  'name' => 'Recuperar',
  'class' => 'sf_admin_action_save',
)) ?></li>
  </ul>