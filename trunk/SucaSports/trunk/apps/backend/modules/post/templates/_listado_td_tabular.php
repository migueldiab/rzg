    <td><?php echo link_to($post->getId() ? $post->getId() : __('-'), 'post/edit?id='.$post->getId()) ?></td>
    <td><?php echo $post->getTexto() ?></td>
      <td><?php echo $post->getCreatedBy() ?></td>
      <td><?php echo ($post->getCreatedAt() !== null && $post->getCreatedAt() !== '') ? format_date($post->getCreatedAt(), "f") : '' ?></td>
      <td><?php echo $post->getUpdatedBy() ?></td>
      <td><?php echo ($post->getUpdatedAt() !== null && $post->getUpdatedAt() !== '') ? format_date($post->getUpdatedAt(), "f") : '' ?></td>
      <td><?php echo ($post->getFechaEtapaCarreraFechaInicio() !== null && $post->getFechaEtapaCarreraFechaInicio() !== '') ? format_date($post->getFechaEtapaCarreraFechaInicio(), "D") : '' ?></td>
      <td><?php echo $post->getFechaEtapaCarreraIdEtapa() ?></td>
      <td><?php echo $post->getFechaEtapaCarreraIdCarrera() ?></td>
  