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
      'inscripcion/nueva?fecha_etapa='.$post->getFechaEtapaCarreraFechaInicio()) ?>
    <hr/>
  <?php endforeach; ?>
