<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
Welcome

<script type="text/javascript">
  dojo.require("dijit.Dialog");
  dojo.require("dijit.form.Form");
  dojo.require("dijit.form.TextBox");
  dojo.require("dijit.form.TimeTextBox");
  dojo.require("dijit.form.Button");
  dojo.require("dijit.form.DateTextBox");
  dojo.require("dijit.form.FilteringSelect");
  dojo.require("dojo.parser");  // scan page for widgets and instantiate them
</script>

<button dojoType="dijit.form.Button" onclick="dijit.byId('prueba').show()">Ver mi prueba</button>

<div dojoType="dijit.Dialog" id="prueba" title="Una Prueba"
    execute="alert('submitted w/args:\n' + dojo.toJson(arguments[0], true));">


  <?php echo form_tag('home/index', array(
    'id'        => 'sf_admin_edit_form',
    'name'      => 'sf_admin_edit_form',
    'multipart' => true,
  )) ?>

  <?php echo input_tag('datos[primer]', $sf_params->get('datos[primer]'),
    array(
      'size' => 8,
      'maxlength' => 8,
      'dojoType' => 'dijit.form.FilteringSelect'
    ));
  ?>

  <?php echo input_tag('datos[segundo]', $sf_params->get('datos[segundo]'),
    array(
      'size' => 8,
      'maxlength' => 8,
      'dojoType' => 'dijit.form.TextBox'
    ));
  ?>

<?php echo button_to(__('Save'), 'home/index', array (
    'post' => true,
  )) ?>

<?php echo '</form>'; ?>

</div>