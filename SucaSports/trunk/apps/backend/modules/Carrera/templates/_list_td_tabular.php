    <td><?php echo link_to($carrera->getId() ? $carrera->getId() : __('-'), 'carrera/edit?id='.$carrera->getId()) ?></td>
    <td><?php echo $carrera->getNombre() ?></td>
      <td><?php echo $carrera->getUrl() ?></td>
      <td><?php echo $carrera->getDescripcion() ?></td>
      <td><?php echo ($carrera->getCreatedAt() !== null && $carrera->getCreatedAt() !== '') ? format_date($carrera->getCreatedAt(), "f") : '' ?></td>
      <td><?php echo $carrera->getCreatedBy() ?></td>
      <td><?php echo ($carrera->getUpdatedAt() !== null && $carrera->getUpdatedAt() !== '') ? format_date($carrera->getUpdatedAt(), "f") : '' ?></td>
      <td><?php echo $carrera->getUpdatedBy() ?></td>
  