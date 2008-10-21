<SCRIPT LANGUAGE="javascript">
    function Doadd()
    {
      alert('add')
    }

</SCRIPT>


<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php echo form_tag('carrera/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($carrera, 'getId') ?>

<div align="left" id='inputs' title="Informacion basica de carrera" class="form-row">
 <?php echo label_for('carrera[nombre]', __($labels['carrera{nombre}']), '') ?>
  <?php echo input_tag('data[nombre]', $sf_params->get('data[nombre]'),
    array('size' => 20, 'maxlength' => 20));
  ?> <br/>

<?php echo label_for('carrera[url]', __($labels['carrera{url}']), '') ?>
  <?php echo input_tag('data[url]', $sf_params->get('data[url]'),
    array('size' => 50, 'maxlength' => 50));
  ?> <br/>
  
  <?php echo label_for('carrera[descripcion]', __($labels['carrera{descripcion}']), '') ?>
  <?php echo TextArea_tag('data[descripcion]', $sf_params->get('data[descripcion]'),
    'size => 50x12');
  ?> <br/>
    <?php echo label_for('carrera[categoria]', __($labels['carrera{categoria}']), '') ?>
  <table border="0" cellpadding="3">
  <tbody>
  <tr>
  <td><?php $value = object_select_tag($categoria, 'getId', array (
  'related_class' => 'Categoria',
  'control_name' => 'categoria[id]',
  'multiple' => true,
)); echo $value ? $value : '&nbsp;' ?></td>

<td>
<?php echo button_to_function('  Add  ', 'doadd()')?><br/>
<?php echo button_to_function('remove', 'doadd()')?>
</td>

<td><?php $value = object_select_tag($categoria, 'getId', array (
  'related_class' => 'Categoria',
  'control_name' => 'categoria[id]',
  'multiple' => true,
)); echo $value ? $value : '&nbsp;' ?></td>
  </tr>
  </tbody>
  </table>
  </div>

<div align="right" id='dates' title="Fechas de carrera" class="form-row">
 <?php echo label_for('carrera[fecha]', __($labels['carrera{fecha}']), '') ?>
  <?php echo input_date_tag('data[fechacarrera]', $sf_params->get('data[fechacarrera]'),
    array('size' => 20, 'maxlength' => 20));
  ?> <br/>

<?php echo label_for('carrera[fecha]', __($labels['carrera{fecha}']), '') ?>
  <?php echo input_date_tag('data[fechahab]', $sf_params->get('data[fechahab]'),
    array('size' => 20, 'maxlength' => 20));
  ?> <br/>
</div>
<div align="right" id='dates' title="etapas" class="form-row">
    
</div>


<div align="center" id='dates' title="botones" class="form-row">
<?php echo button_to(__('Save'), 'carrera/save', array (
    'post' => true,
  )) ?>
</div>

<?php echo '</form>'; ?>