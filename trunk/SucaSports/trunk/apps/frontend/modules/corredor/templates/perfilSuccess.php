
<?php echo form_tag('corredor/perfil') ?>
 
  <fieldset>
  <h2>Mi perfil</h2>
  <div class="form-row">
      <label for="name">Name: </label>
      <input dojoType="dijit.form.TextBox" type="text" name="name" id="name">
  </div>
  <div class="form-row">
      <label for="loc">Location: </label>
      <input dojoType="dijit.form.TextBox" type="text" name="loc" id="loc">
  </div>
  <div class="form-row">
      <label for="date">Date: </label>
      <input dojoType="dijit.form.DateTextBox" type="text" name="date" id="date">
  </div>
  <div class="form-row">
      <label for="date">Time: </label>
      <input dojoType="dijit.form.TimeTextBox" type="text" name="time" id="time">
  </div>
  <div class="form-row">
      <label for="desc">Description: </label>
      <input dojoType="dijit.form.TextBox" type="text" name="desc" id="desc">
  </div>
  <div class="form-row">
      <button dojoType="dijit.form.Button" type="submit">OK</button>
   
  </div>
  </fieldset>
<?php echo "</form>" ?>