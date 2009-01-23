<?php use_helper('I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1><?php echo __('Activar inscripción a una fecha',  array()) ?></h1>

  <div id="sf_admin_header">
    <?php if ($sf_request->hasError('delete')): ?>
    <div class="form-errors">
      <h2><?php echo __('Could not delete the selected %name%', array('%name%' => 'Fecha etapa carrera')) ?></h2>
      <ul>
        <li><?php echo __($sf_request->getError('delete')) ?></li>
      </ul>
    </div>
    <?php elseif ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
     <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
    <?php endif; ?>
  </div>

  <div id="sf_admin_bar">

  </div>

  <div id="sf_admin_content">
    <?php if (!$pager->getNbResults()): ?>
    <?php echo __('no result') ?>
    <?php else: ?>

      <table cellspacing="0" class="sf_admin_list">
      <thead>
      <tr>

          <th id="sf_admin_list_th_fecha_inicio">
            <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/fecha_etapa_carrera/sort') == 'fecha_inicio'): ?>
              <?php echo link_to(__('Fecha inicio'), 'fechaetapacarrera/activarInscripcion?sort=fecha_inicio&type='.
                ($sf_user->getAttribute('type', 'asc', 'sf_admin/fecha_etapa_carrera/sort') == 'asc' ? 'desc' : 'asc')) ?>
              (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/fecha_etapa_carrera/sort')) ?>)
            <?php else: ?>
              <?php echo link_to(__('Fecha inicio'), 'fechaetapacarrera/activarInscripcion?sort=fecha_inicio&type=asc') ?>
            <?php endif; ?>
          </th>
          <th id="sf_admin_list_th_carrera_nombre">
            <?php echo __('Carrera nombre') ?>
          </th>
          <th id="sf_admin_list_th_etapa_nombre">
            <?php echo __('Etapa nombre') ?>
          </th>
          <th>
          </th>
      </tr>
      </thead>
      <tfoot>
      <tr><th colspan="7">
      <div class="float-right">
      <?php if ($pager->haveToPaginate()): ?>
        <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), 'fechaetapacarrera/activarInscripcion?page=1') ?>
        <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), 'fechaetapacarrera/activarInscripcion?page='.$pager->getPreviousPage()) ?>

        <?php foreach ($pager->getLinks() as $page): ?>
          <?php echo link_to_unless($page == $pager->getPage(), $page, 'fechaetapacarrera/activarInscripcion?page='.$page) ?>
        <?php endforeach; ?>

        <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), 'fechaetapacarrera/activarInscripcion?page='.$pager->getNextPage()) ?>
        <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), 'fechaetapacarrera/activarInscripcion?page='.$pager->getLastPage()) ?>
      <?php endif; ?>
      </div>
      <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
      </th></tr>
      </tfoot>
      <tbody>
      <?php $i = 1; foreach ($pager->getResults() as $fecha_etapa_carrera): $odd = fmod(++$i, 2) ?>
        <tr class="sf_admin_row_<?php echo $odd ?>">
          <td><?php echo link_to(($fecha_etapa_carrera->getFechaInicio() !== null && $fecha_etapa_carrera->getFechaInicio() !== '') ? format_date($fecha_etapa_carrera->getFechaInicio(), "D") : '' ? ($fecha_etapa_carrera->getFechaInicio() !== null && $fecha_etapa_carrera->getFechaInicio() !== '') ? format_date($fecha_etapa_carrera->getFechaInicio(), "D") : '' : __('-'), 'fechaetapacarrera/edit?fecha_inicio='.$fecha_etapa_carrera->getFechaInicio().'&id_etapa='.$fecha_etapa_carrera->getIdEtapa().'&id_carrera='.$fecha_etapa_carrera->getIdCarrera()) ?></td>
          <td><?php echo $fecha_etapa_carrera->getCarreraNombre() ?></td>
          <td><?php echo $fecha_etapa_carrera->getEtapaNombre() ?></td>
          <td>
            <ul class="sf_admin_actions">
              <li>
                <?php echo button_to(__('activar'), 'fechaetapacarrera/create', array ('class' => 'sf_admin_action_create',)) ?>
              </li>
            </ul>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
      </table>
    <?php endif; ?>
  </div>
  <div id="sf_admin_footer">

  </div>

</div>
