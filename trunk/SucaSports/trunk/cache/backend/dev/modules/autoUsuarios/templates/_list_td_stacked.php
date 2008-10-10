<td colspan="3">
    <?php echo link_to($usuarios->getId() ? $usuarios->getId() : __('-'), 'usuarios/edit?id='.$usuarios->getId()) ?>
     - 
    <?php echo $usuarios->getNombre() ?>
     - 
    <?php echo $usuarios->getIdGrupos() ?>
     - 
</td>