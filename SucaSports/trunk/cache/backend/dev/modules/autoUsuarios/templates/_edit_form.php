<?php echo form_tag('usuarios/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($usuarios, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('usuarios[nombre]', __($labels['usuarios{nombre}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{nombre}')): ?>
    <?php echo form_error('usuarios{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($usuarios, 'getNombre', array (
  'size' => 45,
  'control_name' => 'usuarios[nombre]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('usuarios[id_grupos]', __($labels['usuarios{id_grupos}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('usuarios{id_grupos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('usuarios{id_grupos}')): ?>
    <?php echo form_error('usuarios{id_grupos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($usuarios, 'getIdGrupos', array (
  'related_class' => 'Grupos',
  'control_name' => 'usuarios[id_grupos]',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('usuarios' => $usuarios)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($usuarios->getId()): ?>
<?php echo button_to(__('delete'), 'usuarios/delete?id='.$usuarios->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
