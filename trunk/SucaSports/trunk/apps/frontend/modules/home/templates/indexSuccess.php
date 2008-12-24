  <?php foreach ($pager->getResults() as $post): ?>
    <div style="width: 80%">
       <?php echo $post->getTexto() ?>
    </div>
    <?php $carrera = CarreraPeer::retrieveByPK($post->getFechaEtapaCarreraIdCarrera()); ?>
    <?php if ($carrera) echo link_to('Sitio de la carrera...', $carrera->getUrl())?>
    <?php if ($carrera) echo link_to('Inscribite a '.$carrera->__toString().'...', '@homepage')?>
    <hr/>
  <?php endforeach; ?>
