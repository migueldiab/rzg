<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  
  <?php include_title() ?>

</head>
<body>
     <div id="sf_admin_container">
       <ul class="sf_admin_actions">
        <?php if ($sf_user->isAuthenticated()): ?>
          <li class="float-right"><?php echo button_to(' log out ', 'usuario/logout') ?></li>
          <li class="float-right"><?php echo button_to($sf_user->getAttribute('usuario', '', 'sesion'), 'corredor/perfil') ?></li>
        <?php else: ?>
          <li class="float-right"><?php echo link_to('log in/registrate', 'usuario/login') ?></li>
        <?php endif ?>
       </ul>
     </div>

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
</body>
</html>
