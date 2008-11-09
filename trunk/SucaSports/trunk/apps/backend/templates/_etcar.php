<div id = "etapas">
  <h2>Etapas de la carrera</h2>
  <?php $url= urlencode('etapacarrera/list?filters[id_carrera]='.$carrera->getId().'&filter=filter')?>
  <?php echo link_to('Listado de etapas', 'etapacarrera/list?filters[id_carrera]='.$carrera->getId().'&filter=filter','target=etapas') ?>
</div>