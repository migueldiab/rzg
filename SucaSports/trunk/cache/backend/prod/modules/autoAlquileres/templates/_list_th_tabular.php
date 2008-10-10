  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alquileres/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'alquileres/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'alquileres/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_id_equipamiento">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alquileres/sort') == 'id_equipamiento'): ?>
      <?php echo link_to(__('Id equipamiento'), 'alquileres/list?sort=id_equipamiento&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id equipamiento'), 'alquileres/list?sort=id_equipamiento&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_id_fecha_carrera">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/alquileres/sort') == 'id_fecha_carrera'): ?>
      <?php echo link_to(__('Id fecha carrera'), 'alquileres/list?sort=id_fecha_carrera&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/alquileres/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id fecha carrera'), 'alquileres/list?sort=id_fecha_carrera&type=asc') ?>
      <?php endif; ?>
          </th>
