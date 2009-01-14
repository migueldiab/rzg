<p>
  Querido <i>Usuario</i>,
</p>
<p>
  Queremos darle la bienvenida al maravilloso mundo de las carreras de aventura... <br/>
  Haga click en el siguiente link para activar su cuenta:<br/>
    <?php echo url_for('usuario/activateUser?email='.$usuario->getEmail().
                       '&val='.$usuario->getVerificador(),
                       true) ?>
  <br/>
  
  Saludos Cordiales,<br/>
</p>

<h2>El equipo de Suca Sports</h2>