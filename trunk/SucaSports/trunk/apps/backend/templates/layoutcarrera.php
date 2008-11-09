<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  
  <?php include_title() ?>

</head>
<body>
<table>
  <tr>
    <td width="200px">
    <?php include_component_slot('sidebar') ?>
    </td>
    <td valign="top">
    <?php echo $sf_content ?>    
    
    </td>
    
    </tr>
    

</table>
    <div id = "etapas" class="list" >
    </div>
</body>
</html>
