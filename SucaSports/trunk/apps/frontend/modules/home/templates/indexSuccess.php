<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<div id="sf_admin_container">
  <div id="sf_admin_content">
    <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
    <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
    <?php elseif ($sf_user->hasFlash('error')): ?>
    <div class="form-errors">
    <h2><?php echo __($sf_user->getFlash('error')) ?></h2>
    </div>
    <?php endif; ?>

    <?php foreach ($pager->getResults() as $post): ?>
      <div style="width: 80%">
         <?php echo $post->getTexto() ?>
      </div>
      <?php $carrera = CarreraPeer::retrieveByPK($post->getFechaEtapaCarreraIdCarrera()) ?>
      <?php $fecha = FechaEtapaCarreraPeer::retrieveByPK(
        $post->getFechaEtapaCarreraFechaInicio(),
        $post->getFechaEtapaCarreraIdEtapa(),
        $post->getFechaEtapaCarreraIdCarrera()) ?>
      <?php if ($carrera) echo link_to('Sitio de la carrera...', $carrera->getUrl())?>
      <?php if ($carrera) echo link_to('Inscribite a '.$carrera->__toString().'...',
        'inscripcion/nueva?fecha_etapa='.$post->getFechaEtapaCarreraFechaInicio().
        '&id_etapa='.$post->getFechaEtapaCarreraIdEtapa().
        '&id_carrera='.$post->getFechaEtapaCarreraIdCarrera()) ?>
      <hr/>
    <?php endforeach; ?>

  </div>
</div>