<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php include_metas() ?>

	<?php include_title() ?>
<!--<link href="padrao.css" rel="stylesheet" type="text/css">-->
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<div id="principal" align="center">
		<div id="conteudo">
			<table id="Table_01" width="800" border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td width="25" rowspan="3">
						<img src="index_03.jpg" width="25" height="800"></td>
				  <td colspan="2" bgcolor="#1F0176" height="55"><?php echo link_to(image_tag('logo_suca.jpg'),'@homepage') ?></td>
					<td width="25" rowspan="3">
						<img src="index_03.jpg" width="25" height="800"></td>
				</tr>
				<tr>
					<td valign="top" width="150" align="center" bgcolor="#666666" height="546">
					  <br>
					  <br><br><br><br><br><br><br><br><br><br><br>
                      <div id="calendario"></div>
                      <!--script>
            				d = new Date();
            				calendario(d.getMonth(), d.getFullYear());
            		  </script>-->
					</td>
			  <td rowspan="2" valign="top" width="600" bgcolor="#666666" height="558">
		  <div class="c1" id="sf_admin_container">
                        <ul class="sf_admin_actions">
                            <?php if ($sf_user->isAuthenticated()): ?>
                              <li class="float-right"><?php echo button_to(' log out ', 'usuario/logout') ?></li>
                              <li class="float-right"><?php echo button_to(' mi perfil ', 'corredor/perfil') ?></li>
                            <?php else: ?>
                              <li class="float-right"><?php echo button_to('log in/registrate', 'usuario/login') ?></li>
                            <?php endif ?>
                            <li class="float-right"><?php echo button_to(' links ', 'home/links') ?></li>
                            <li class="float-right"><?php echo button_to(' team building ', 'home/team') ?></li>
                            <li class="float-right"><?php echo button_to(' entrevistas ', 'home/entrevistas') ?></li>
                            <li class="float-right"><?php echo button_to(' calendario ', 'home/calendario') ?></li>
                            <li class="float-right"><?php echo button_to(' quienes somos? ', 'home/quienes') ?></li>
                            <li class="float-right"><?php echo button_to(' carreras ', 'home/index') ?></li>
                           </ul>
                        </div>
                        <br>
                        <?php echo $sf_content ?>
				</tr>
			</tbody></table>
		</div>
	</div>
</body></html>