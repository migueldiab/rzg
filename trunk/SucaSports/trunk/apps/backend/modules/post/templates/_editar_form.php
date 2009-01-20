<?php echo form_tag('post/editar', array(
  'id'        => 'sf_admin_editar_form',
  'name'      => 'sf_admin_editar_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($post, 'getId') ?>
<div class="form-row">
  <?php echo label_for('post[fecha_etapa_carrera]', __('Fecha : '), '') ?>
  <div class="content<?php if ($sf_request->hasError('post{fecha_etapa_carrera}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('post{fecha_etapa_carrera}')): ?>
    <?php echo form_error('post{fecha_etapa_carrera}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($post, 'getFechaEtapaCarreraFechaInicio', array (
  'control_name' => 'post[fecha_etapa_carrera]',
  'related_class' => 'FechaEtapaCarrera'
), ''); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

  <?php $value = object_textarea_tag($post, 'getTexto', array (
  'size' => '30x3',
  'control_name' => 'post[texto]',
  'rich' => true,
  'tinymce_options' => sfConfig::get('app_tinymce_options'),
  )); echo $value ? $value : '&nbsp;' ?>


<?php echo '</form>' ?>
