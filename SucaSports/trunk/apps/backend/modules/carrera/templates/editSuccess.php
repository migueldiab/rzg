<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<script type="text/javascript">
  dojo.require("dijit.Dialog");
  dojo.require("dijit.form.Form");
  dojo.require("dijit.form.TextBox");
  dojo.require("dijit.form.TimeTextBox");
  dojo.require("dijit.form.Button");
  dojo.require("dijit.form.DateTextBox");
  dojo.require("dijit.form.FilteringSelect");
  //dojo.require("dojox.widget.SortList");
  dojo.require("dojo.parser");  // scan page for widgets and instantiate them
</script>


<div id="sf_admin_container">

<h1><?php echo __('edit carrera', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('carrera/edit_header', array('carrera' => $carrera)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('carrera/edit_messages', array('carrera' => $carrera, 'labels' => $labels)) ?>
<?php include_partial('carrera/edit_form', array('carrera' => $carrera, 'labels' => $labels, 'categoria' => $categoria)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('carrera/edit_footer', array('carrera' => $carrera)) ?>
</div>

</div>
