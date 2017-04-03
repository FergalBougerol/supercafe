<?php
  if (isset($_POST)) {
    $success = true;
    $to = 'contact@supercafe.fr';

    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = $_POST['name'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
      $from = $_POST['email'];
    }
    else {
      $success = false;
    }
    if (isset($_POST['message']) && !empty($_POST['message'])) {
      $message = $_POST['message'];
    }
    else {
      $success = false;
    }


    if ($success) {
      $subject = $name . ' vous a contacté';
      $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);
      header('Location: /');
    }
  }
  else {
    header('Location: /');
  }
?>
