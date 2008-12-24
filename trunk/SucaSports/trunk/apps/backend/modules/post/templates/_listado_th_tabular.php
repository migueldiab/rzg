  <th id="sf_admin_listado_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'post/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'post/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_texto">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'texto'): ?>
      <?php echo link_to(__('Texto'), 'post/list?sort=texto&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Texto'), 'post/list?sort=texto&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_created_by">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'created_by'): ?>
      <?php echo link_to(__('Created by'), 'post/list?sort=created_by&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created by'), 'post/list?sort=created_by&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_created_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'created_at'): ?>
      <?php echo link_to(__('Created at'), 'post/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created at'), 'post/list?sort=created_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_updated_by">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'updated_by'): ?>
      <?php echo link_to(__('Updated by'), 'post/list?sort=updated_by&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Updated by'), 'post/list?sort=updated_by&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_updated_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'updated_at'): ?>
      <?php echo link_to(__('Updated at'), 'post/list?sort=updated_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Updated at'), 'post/list?sort=updated_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_fecha_etapa_carrera_fecha_inicio">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'fecha_etapa_carrera_fecha_inicio'): ?>
      <?php echo link_to(__('Fecha de Inicio'), 'post/list?sort=fecha_etapa_carrera_fecha_inicio&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha de Inicio'), 'post/list?sort=fecha_etapa_carrera_fecha_inicio&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_fecha_etapa_carrera_id_etapa">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'fecha_etapa_carrera_id_etapa'): ?>
      <?php echo link_to(__('Fecha etapa carrera id etapa'), 'post/list?sort=fecha_etapa_carrera_id_etapa&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha etapa carrera id etapa'), 'post/list?sort=fecha_etapa_carrera_id_etapa&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_listado_th_fecha_etapa_carrera_id_carrera">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/post/sort') == 'fecha_etapa_carrera_id_carrera'): ?>
      <?php echo link_to(__('Fecha etapa carrera id carrera'), 'post/list?sort=fecha_etapa_carrera_id_carrera&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/post/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Fecha etapa carrera id carrera'), 'post/list?sort=fecha_etapa_carrera_id_carrera&type=asc') ?>
      <?php endif; ?>
          </th>
