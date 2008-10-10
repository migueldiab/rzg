    <td><?php echo link_to($usuarios->getId() ? $usuarios->getId() : __('-'), 'usuarios/edit?id='.$usuarios->getId()) ?></td>
    <td><?php echo $usuarios->getNombre() ?></td>
      <td><?php echo $usuarios->getIdGrupos() ?></td>
  