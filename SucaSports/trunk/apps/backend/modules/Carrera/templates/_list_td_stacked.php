<td colspan="8">
    <?php echo link_to($carrera->getId() ? $carrera->getId() : __('-'), 'carrera/edit?id='.$carrera->getId()) ?>
     - 
    <?php echo $carrera->getNombre() ?>
     - 
    <?php echo $carrera->getUrl() ?>
     - 
    <?php echo $carrera->getDescripcion() ?>
     - 
    <?php echo ($carrera->getCreatedAt() !== null && $carrera->getCreatedAt() !== '') ? format_date($carrera->getCreatedAt(), "f") : '' ?>
     - 
    <?php echo $carrera->getCreatedBy() ?>
     - 
    <?php echo ($carrera->getUpdatedAt() !== null && $carrera->getUpdatedAt() !== '') ? format_date($carrera->getUpdatedAt(), "f") : '' ?>
     - 
    <?php echo $carrera->getUpdatedBy() ?>
     - 
</td>