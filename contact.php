<?php

if($_POST){
  $guest_name = "";
  $guest_email = "";
  $guest_message = "";
  $email_body = "<div>";

  if(isset($_POST['guest_name'])) {
    $guest_name = filter_var($_POST['guest_name'], FILTER_SANITIZE_STRING);
    $email_body .= "<div>
                      <label><b>Guest Name:</b></label>&nbsp;<span>".$guest_name."</span>
                    </div>";
  }

  if(isset($_POST['guest_email'])) {
    $guest_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['guest_email']);
    $guest_email = filter_var($guest_email, FILTER_VALIDATE_EMAIL);
    $email_body .= "<div>
                      <label><b>Guest Email:</b></label>&nbsp;<span>".$guest_email."</span>
                    </div>";
  }

  if(isset($_POST['guest_message'])) {
    $guest_message = htmlspecialchars($_POST['visitor_message']);
    $email_body .= "<div>
                      <label><b>Guest Message:</b></label>
                      <div>".$guest_message."</div>
                    </div>";
  }

  $recipient = "matt.lundin@outlook.com";

  $email_body .= "</div>";

  $headers = 'MIME-Version: 1.0' . "\r\n"
  .'Content-type: text/html; charset=utf-8' . "\r\n"
  .'From: ' . $guest_email . "\r\n";

  if(mail($recipient, $email_title, $email_body, $headers)) {
    echo "<p>Thank you reaching out. I will respond shortly.</p>";
  } else {
    echo '<p>Something went wrong</p>';
  }
}
