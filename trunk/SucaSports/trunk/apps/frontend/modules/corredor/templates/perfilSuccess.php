<script type="text/javascript">

  dojo.require("dijit.Dialog");
  dojo.require("dijit.form.TextBox");
  dojo.require("dijit.form.TimeTextBox");
  dojo.require("dijit.form.Button");
  dojo.require("dijit.form.DateTextBox");
  dojo.require("dojo.parser");
  dojo.addOnLoad(function parsePerfil() {dojo.parser.parse(dojo.byId('dialog1'))});
  dojo.addOnLoad(function test() {dijit.byId('dialog1').show();})
</script>

<div dojoType="dijit.Dialog" id="dialog1" title="First Dialog"
    execute="alert('submitted w/args:\n' + dojo.toJson(arguments[0], true));">
  <table>
    <tr>
      <td><label for="name">Name: </label></td>
      <td><input dojoType="dijit.form.TextBox" type="text" name="name" id="name"></td>
    </tr>
    <tr>
      <td><label for="loc">Location: </label></td>
      <td><input dojoType="dijit.form.TextBox" type="text" name="loc" id="loc"></td>
    </tr>
    <tr>
      <td><label for="date">Date: </label></td>
      <td><input dojoType="dijit.form.DateTextBox" type="text" name="date" id="date"></td>
    </tr>
    <tr>
      <td><label for="date">Time: </label></td>
      <td><input dojoType="dijit.form.TimeTextBox" type="text" name="time" id="time"></td>
    </tr>
    <tr>
      <td><label for="desc">Description: </label></td>
      <td><input dojoType="dijit.form.TextBox" type="text" name="desc" id="desc"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <button dojoType="dijit.form.Button" type="submit">OK</button></td>
    </tr>
  </table>
</div>