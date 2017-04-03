<?php
  if (isset($_POST)) {
    $success = true;
    $to = 'contact@supercafe.fr';

    if (isset($_POST['Prénom']) && !empty($_POST['Prénom'])) {
      $firstname = $_POST['Prénom'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['Nom']) && !empty($_POST['Nom'])) {
      $lastname = $_POST['Nom'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['Email']) && !empty($_POST['Email'])) {
      $from = $_POST['Email'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['Pour Combien ?']) && !empty($_POST['Pour Combien ?'])) {
      $howmany = $_POST['Pour Combien ?'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['Date']) && !empty($_POST['Date'])) {
      $datetime = $_POST['Date'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['Téléphone']) && !empty($_POST['Téléphone'])) {
      $phone = $_POST['Téléphone'];
    }
    else {
      $success = false;
    }


    if ($success) {
      $subject = 'Réservation';
      $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

      $message = isset($_POST['message']) && !empty($_POST['message']) ? $_POST['message'] : '';
      $mail = 'Réservation de ' . $firstname . ' ' . $lastname . ' pour ' . $howmany . ' personne(s), le ' . $datetime . '<br>Message : ' . $message . '<br>Numéro de téléphonne : ' . $phone . '<br>Adresse mail : ' . $email;

      mail($to, $subject, $mail, $headers);
      header('Location: /');
    }
  }
  else {
    header('Location: /');
  }
?>
