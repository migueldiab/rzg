<td colspan="3">
    <?php echo link_to($alquileres->getId() ? $alquileres->getId() : __('-'), 'alquileres/edit?id='.$alquileres->getId()) ?>
     - 
    <?php echo $alquileres->getIdEquipamiento() ?>
     - 
    <?php echo $alquileres->getIdFechaCarrera() ?>
     - 
</td>