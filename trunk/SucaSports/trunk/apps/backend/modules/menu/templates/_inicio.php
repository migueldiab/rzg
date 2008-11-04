<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<div dojoType="dijit.layout.AccordionPane" title="Administracion">
  <?php include_partial('menu/administracion'); ?>
</div>
<div dojoType="dijit.layout.AccordionPane" title="Alquileres">
  <?php include_partial('menu/alquileres'); ?>
</div>
<div dojoType="dijit.layout.AccordionPane" title="Listados">
  <?php include_partial('menu/listados'); ?>
</div>
    