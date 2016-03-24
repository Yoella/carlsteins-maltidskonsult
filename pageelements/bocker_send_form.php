<?php
if(isset($_POST['email']))
{
  if(
    !isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['gata']) ||
    !isset($_POST['postnummer']) ||
    !isset($_POST['ort']) ||
    !isset($_POST['antal']) ||
    !isset($_POST['tankar'])
  )

  $name = $_POST['name'];
  $email_from = $_POST['email'];
  $gata = $_POST['gata'];
  $postnummer = $_POST['postnummer'];
  $ort = $_POST['ort'];
  $antal = $_POST['antal'];
  $tankar = $_POST['tankar'];


//validate first

  if(IsInjected($email_from))
  {
    echo "Bad email value";
    exit;
  }

//function to validate against any email injection attempts
  function IsInjected($str)
  {
    $injections = array(
      '(\n+)',
      '(\r+)',
      '(\t+)',
      '(%0A+)',
      '(%0D+)',
      '(%08+)',
      '(%09+)'
    );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject, $str))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

//email contain
  $email_to = "joella.j@hotmail.com";
  $email_subject = "New Book Order";
  $email_message = "Namn: " + $name;
  $email_message = "Email: " + $email_from;
  $email_message = "Gata: " + $gata;
  $email_message = "Postnummer: " + $postnummer;
  $email_message = "Ort: " + $ort;
  $email_message = "Antal Exemplar: " + $antal;
  $email_message = "Tankar: " + $tankar;

  $headers = 'From: '.$email_from."\r\n".
  'Reply-To: '.$email_from."\r\n".

//send email
  mail($email_to, $email_subject, $email_message, $headers);
//redirect thank you page
  header('Location: tack.html');
}
?>
