<?php

/**
 * Subclass for representing a row from the 'usuario' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Usuario extends BaseUsuario
{
    public function __toString() {
        return $this->getDocumento();
    }
    
public function setPasswordEncryptar($password)
{
  $this->setPassword(sha1($password));
}
public function VerifyPassword($password2,$password1)
{
    return ($password2==$password1);
}
public function check_email_address($strEmailAddress) {
            
            // If magic quotes is "on", email addresses with quote marks will
            // fail validation because of added escape characters. Uncommenting
            // the next three lines will allow for this issue.
            //if (get_magic_quotes_gpc()) { 
            //    $strEmailAddress = stripslashes($strEmailAddress); 
            //}

            // Control characters are not allowed
            if (preg_match('/[\x00-\x1F\x7F-\xFF]/', $strEmailAddress)) {
                return false;
            }

            // Split it into sections using last instance of "@"
            $intAtSymbol = strrpos($strEmailAddress, '@');
            if ($intAtSymbol === false) {
                // No "@" symbol in email.
                return false;
            }
            $arrEmailAddress[0] = substr($strEmailAddress, 0, $intAtSymbol);
            $arrEmailAddress[1] = substr($strEmailAddress, $intAtSymbol + 1);

            // Count the "@" symbols. Only one is allowed, except where 
            // contained in quote marks in the local part. Quickest way to
            // check this is to remove anything in quotes.
            $arrTempAddress[0] = preg_replace('/"[^"]+"/'
                                             ,''
                                             ,$arrEmailAddress[0]);
            $arrTempAddress[1] = $arrEmailAddress[1];
            $strTempAddress = $arrTempAddress[0] . $arrTempAddress[1];
            // Then check - should be no "@" symbols.
            if (strrpos($strTempAddress, '@') !== false) {
                // "@" symbol found
                return false;
            }

            // Check local portion
            if (!$this->check_local_portion($arrEmailAddress[0])) {
                return false;
            }

            // Check domain portion
            if (!$this->check_domain_portion($arrEmailAddress[1])) {
                return false;
            }

            // If we're still here, all checks above passed. Email is valid.
            $usuario = new usuario;
            $c = new Criteria();
            $c->add(UsuarioPeer::EMAIL,$strEmailAddress);
            $usuario = UsuarioPeer::doSelectOne($c);
            if (isset($usuario)){
                if ($usuario->getEmail()== $strEmailAddress)
                    {
                     return false;
                    }
            }
            return true;

        }

        /**
         * Checks email section before "@" symbol for validity
         * @param   strLocalPortion     Text to be checked
         * @return  True if local portion is valid, false if not
         */
 protected function check_local_portion($strLocalPortion) {
            // Local portion can only be from 1 to 64 characters, inclusive.
            // Please note that servers are encouraged to accept longer local
            // parts than 64 characters.
            if (!$this->check_text_length($strLocalPortion, 1, 64)) {
                return false;
            }
            // Local portion must be:
            // 1) a dot-atom (strings separated by periods)
            // 2) a quoted string
            // 3) an obsolete format string (combination of the above)
            $arrLocalPortion = explode('.', $strLocalPortion);
            for ($i = 0, $max = sizeof($arrLocalPortion); $i < $max; $i++) {
                 if (!preg_match('.^('
                                .    '([A-Za-z0-9!#$%&\'*+/=?^_`{|}~-]' 
                                .    '[A-Za-z0-9!#$%&\'*+/=?^_`{|}~-]{0,63})'
                                .'|'
                                .    '("[^\\\"]{0,62}")'
                                .')$.'
                                ,$arrLocalPortion[$i])) {
                    return false;
                }
            }
            return true;
        }

        /**
         * Checks email section after "@" symbol for validity
         * @param   strDomainPortion     Text to be checked
         * @return  True if domain portion is valid, false if not
         */
        protected function check_domain_portion($strDomainPortion) {
            // Total domain can only be from 1 to 255 characters, inclusive
            if (!$this->check_text_length($strDomainPortion, 1, 255)) {
                return false;
            }
            // Check if domain is IP, possibly enclosed in square brackets.
            if (preg_match('/^(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])'
               .'(\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])){3}$/'
               ,$strDomainPortion) || 
                preg_match('/^\[(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])'
               .'(\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9]?[0-9])){3}\]$/'
               ,$strDomainPortion)) {
                return true;
            } else {
                $arrDomainPortion = explode('.', $strDomainPortion);
                if (sizeof($arrDomainPortion) < 2) {
                    return false; // Not enough parts to domain
                }
                for ($i = 0, $max = sizeof($arrDomainPortion); $i < $max; $i++) {
                    // Each portion must be between 1 and 63 characters, inclusive
                    if (!$this->check_text_length($arrDomainPortion[$i], 1, 63)) {
                        return false;
                    }
                    if (!preg_match('/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|'
                       .'([A-Za-z0-9]+))$/', $arrDomainPortion[$i])) {
                        return false;
                    }
                }
            }
            return true;
 }

        /**
         * Check given text length is between defined bounds
         * @param   strText     Text to be checked
         * @param   intMinimum  Minimum acceptable length
         * @param   intMaximum  Maximum acceptable length
         * @return  True if string is within bounds (inclusive), false if not
         */
        protected function check_text_length($strText, $intMinimum, $intMaximum) {
            // Minimum and maximum are both inclusive
            $intTextLength = strlen($strText);
            if (($intTextLength < $intMinimum) || ($intTextLength > $intMaximum)) {
                return false;
            } else {
                return true;
            }
        }
 public function ValidateID($strID) {
   
   $usuario = new usuario;
   $c = new Criteria();
   $c->add(UsuarioPeer::DOCUMENTO,$strID);
   $usuario = UsuarioPeer::doSelectOne($c);
   if (isset($usuario)){
    if ($usuario->getDocumento()== $strID)
      {
        return false;
      }
    return true;
   }
   return true;
 }
 public function EmailRegistration($emailTo,$verificador)
{
  $mail = new sfMail();
  $mail->initialize();
  $mail->setMailer('sendmail');
  $mail->setCharset('utf-8');

  $mail->setSender('webmaster@sucasports.com', 'Suca Sports Webmaster');
  $mail->setFrom('info@Sucasports.com', 'Suca Sports');
  $mail->addReplyTo('do_not_reply@sucasports.com');

  $mail->addAddress($emailTo);

  $mail->setSubject('Registration Confirmation');
  $mail->setBody('
  Querido Usuario,

  Clickee en el siguiente link para activar su cuenta:

  http://sucasports/frontend_dev.php/usuario/ActivateUser?email='.$emailTo.'?val='.$verificador);

  $mail->send();
}
}