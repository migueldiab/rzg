<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<?php include_http_metas() ?>
	<?php include_metas() ?>

	<?php include_title() ?>

	<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<center>
<table width="95%">
	<tr>
    <td>
      <?php echo link_to(image_tag('logo_suca.jpg'),'@homepage') ?>
    </td>
    <td valign="top" align="right">
     <?php include_partial('home/gads'); ?>
     <br>
     <div id="sf_admin_container">
       <ul class="sf_admin_actions">
        <?php if ($sf_user->isAuthenticated()): ?>
          <li class="float-right"><?php echo button_to(' log out ', 'usuario/logout') ?></li>
          <li class="float-right"><?php echo button_to(' mi perfil ', 'corredor/perfil') ?></li>
        <?php else: ?>
          <li class="float-right"><?php echo link_to('log in/registrate', 'usuario/login') ?></li>
        <?php endif ?>
       </ul>
     </div>
    </td>
	</tr>
	<tr>
		<td colspan="2">
      <?php echo $sf_content ?>
		</td>
	</tr>
</table>
</center>
</body>
</html>
