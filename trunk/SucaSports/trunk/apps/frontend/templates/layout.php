<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<?php include_http_metas() ?>
	<?php include_metas() ?>

	<?php include_title() ?>

	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body class="soria">

  <style type="text/css">
    .box {
        position: relative;
        background-color: #99CC33;
        border: 2px solid green;
        padding: 8px;
        margin: 4px;
    }
    .title {
        position: relative;
        background-color: #99CC33;
        border: 0px;
        padding: 0px;
        margin: 0px;
        left: -4px;
    }
    .ads {
        position: relative;
        background-color: white;
        border: 2px solid green;
        padding: 8px;
        margin: 4px;
        width: 930px;
    }
    .content {
        position: relative;
        background-color: white;
        border: 2px solid green;
        padding: 8px;
        margin: 4px;
        min-height: 350px;
        width: 930px;
    }
  </style>

  <div dojoType="dijit.layout.ContentPane" class="box">
    <center>
      <div dojoType="dijit.layout.ContentPane" class="title">
        <?php echo image_tag('logosuca.png') ?>
      </div>
      <div dojoType="dijit.layout.ContentPane" class="ads"  hasShadow="true">
        <?php include_partial('home/gads'); ?>
      </div>
      <div dojoType="dijit.layout.ContentPane" class="content">
        <?php echo $sf_content ?>
      </div>
    </center>
  </div>
</body>
</html>
