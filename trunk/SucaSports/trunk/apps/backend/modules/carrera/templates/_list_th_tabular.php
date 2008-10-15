  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'carrera/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'carrera/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombre'), 'carrera/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombre'), 'carrera/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_url">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'url'): ?>
      <?php echo link_to(__('Url'), 'carrera/list?sort=url&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Url'), 'carrera/list?sort=url&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_descripcion">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'descripcion'): ?>
      <?php echo link_to(__('Descripcion'), 'carrera/list?sort=descripcion&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripcion'), 'carrera/list?sort=descripcion&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_created_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'created_at'): ?>
      <?php echo link_to(__('Created at'), 'carrera/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created at'), 'carrera/list?sort=created_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_created_by">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'created_by'): ?>
      <?php echo link_to(__('Created by'), 'carrera/list?sort=created_by&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created by'), 'carrera/list?sort=created_by&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_updated_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'updated_at'): ?>
      <?php echo link_to(__('Updated at'), 'carrera/list?sort=updated_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Updated at'), 'carrera/list?sort=updated_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_updated_by">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/carrera/sort') == 'updated_by'): ?>
      <?php echo link_to(__('Updated by'), 'carrera/list?sort=updated_by&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/carrera/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Updated by'), 'carrera/list?sort=updated_by&type=asc') ?>
      <?php endif; ?>
          </th>
