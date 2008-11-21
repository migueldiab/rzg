<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  
  <?php include_title() ?>

</head>
<body class="soria">
  <!-- basic preloader: -->
  <div id="loader"><div id="loaderInner">Cargando manejador RZG... </div></div>

  <!-- contentMenu popup 
  <div dojoType="dijit.Menu" id="submenu1" contextMenuForWindow="true" style="display: none;">
    <?php include_component_slot('context') ?>
  </div>
   end contextMenu -->

  <div dojoType="dijit.layout.BorderContainer" 
   id="main" 
   liveSplitters="false"
   design="sidebar">
    <h1 dojoType="dijit.layout.ContentPane" 
     id="header" 
     region="top">
        Suca Sports
        <?php if ($sf_user->isAuthenticated()): ?>
          <div class="float-right"><?php echo button_to(' log out ', 'usuario/logout') ?></div>
          <div class="float-right"><?php echo button_to($sf_user->getAttribute('usuario', '', 'sesion'), 'usuario/edit') ?></div>
        <?php else: ?>
          <div class="float-right"><?php echo button_to('log in/registrate', 'usuario/login') ?></div>
        <?php endif ?>
    </h1>

    <div dojoType="dijit.layout.AccordionContainer"
      minSize="20"
      style="width: 200px;"
      id="leftAccordion"
      region="leading"
      splitter="true">
        <?php include_component_slot('sidebar') ?>
    </div><!-- end AccordionContainer -->

    <!-- top tabs (marked as "center" to take up the main part of the BorderContainer) -->
    <div dojoType="dijit.layout.TabContainer"
     region="center"
     d="topTabs">

      <div dojoType="dijit.layout.ContentPane"
       id="basicFormTab" 
       title="Ventana Principal"
       style="padding:10px;display:none;">
        <?php echo $sf_content ?>
        
      </div>
    </div>
    <!-- end of region="center" TabContainer -->
  </div>
  <!-- end of BorderContainer -->

  <!-- dialog in body -->
  <div id="dialog1" dojoType="dijit.Dialog" 
    title="Floating Modal Dialog" style="display:none;" 
    href="../tests/layout/doc0.html"></div>

</body>
</html>


