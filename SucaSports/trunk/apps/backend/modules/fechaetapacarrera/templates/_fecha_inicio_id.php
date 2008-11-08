<?php $value = object_input_date_tag($fecha_etapa_carrera, 'getFechaInicio', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fecha_etapa_carrera[fecha_inicio]',
)); echo $value ? $value : '&nbsp;' ?>