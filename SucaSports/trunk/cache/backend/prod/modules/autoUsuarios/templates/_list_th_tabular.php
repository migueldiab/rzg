  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuarios/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'usuarios/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'usuarios/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuarios/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombre'), 'usuarios/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombre'), 'usuarios/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_id_grupos">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/usuarios/sort') == 'id_grupos'): ?>
      <?php echo link_to(__('Id grupos'), 'usuarios/list?sort=id_grupos&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/usuarios/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id grupos'), 'usuarios/list?sort=id_grupos&type=asc') ?>
      <?php endif; ?>
          </th>
