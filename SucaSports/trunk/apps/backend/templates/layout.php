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
  <div id="loader"><div id="loaderInner">Cargando Suca Sports... <br>por favor, espere...</div></div>

  <!-- contentMenu popup -->
  <div dojoType="dijit.Menu" id="submenu1" contextMenuForWindow="true" style="display: none;">
    <?php include_component_slot('context') ?>
  </div>
  <!-- end contextMenu -->

  <div id="main" dojoType="dijit.layout.BorderContainer" liveSplitters="false" design="sidebar">
    <h1 id="header" dojoType="dijit.layout.ContentPane" region="top">Suca Sports</h1>
    <div dojoType="dijit.layout.AccordionContainer" minSize="20" style="width: 200px;" id="leftAccordion" region="leading" splitter="true">
        <?php include_component_slot('sidebar') ?>
    </div>
    <div dojoType="dijit.layout.TabContainer" region="center" id="topTabs">
      <div id="basicFormTab" dojoType="dijit.layout.ContentPane" title="Ventana Principal" style="padding:10px;display:none;">
        <?php echo $sf_content ?>
      </div>
    </div>
  </div>
  <div id="dialog1" dojoType="dijit.Dialog" title="Cuadro de Dialogo" style="display:none;"></div>

</body>
</html>
