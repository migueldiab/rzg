<p>
  Querido <i>Usuario</i>,
</p>
<p>

Estimado usuario,

        Para terminar el proceso de cambiar su contraseña debe hacer click en el siguiente link:

    <?php echo url_for('usuario/UnblockUser?email='.$usuario->getEmail().
                       '&val='.$usuario->getVerificador(),
                       true) ?>
  <br/>
  
  Saludos Cordiales,<br/>
</p>

<h2>El equipo de Suca Sports</h2>