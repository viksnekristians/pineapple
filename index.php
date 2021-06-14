<?php
include "includes/autoloader.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewprot" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Page Title</title>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
  </script>
</head>
<body>
  <div class ="wrapper">
    <div class="top-bar">
      <div class="logo">
        <img src="images/pineapple_logo.png">
        <img src="images/pineapple_txt.png">
      </div>
      <div class="nav-links">
        <a href="#">About</a>
        <a href="#">How it works</a>
        <a href="#">Contact</a>
      </div>
    </div>
    <div class="bg-image">
    </div>
    <div class="content">
      <?php
      if (isset($_GET['success'])) {
        if ($_GET['success'] == 1) {
          echo '<img class="success-img" src="images/success.png" alt="success">
          <h1>Thanks for subscribing!</h1>
          <h2>You have successfully subscribed to our email listing. Check your email for the discount code.</h2>';
        }
      } else {
      echo
      '<h1>Subscribe to newsletter</h1>
      <h2>Subscribe to our newsletter and get 10% discount on pineapple glasses</h2>

      <form class="email-form" action="includes/subscriptionValidation.php" method="post">
        <input class="input-txt" type="text" name="email" placeholder="Type your email address here...">
          <button class="btn" type="submit" name="subscribe" disabled>
            <img src="images/ic_arrow.png">
          </button>
        <input type="checkbox" class="cbx" name="cbx">
      </form>

      <p class="validation-msg">';
        if (isset($_GET['emp'])) {
          if ($_GET['emp'] == 1) {
            echo "Email address is required";
          }
        }
        if (isset($_GET['invalid'])) {
          if ($_GET['invalid'] == 1) {
            echo "Please provide a valid e-mail address";
          }
        }
        if (isset($_GET['col'])) {
          if ($_GET['col'] == 1) {
            echo "We are not accepting subscriptions from Columbia emails";
          }
        }

      echo '</p>

        <!--<input type="checkbox" class="cbx" > -->
      <p class="tos">I agree to <a href="#">Terms of service</a></p>
      <p class="tos-validation">';

        if (isset($_GET['nocheck'])) {
          if ($_GET['nocheck'] == 1) {
            echo "You must accept the terms and conditions";
          }
        }

      echo '</p>';
      } ?>
    </div>
    <?php
    if (isset($_GET['success'])) {
      if ($_GET['success'] == 1) {
        echo '
      <div class="line2"></div>
      <div class="media2">';
      }
    } else {
      echo '
    <div class="line"></div>
    <div class="media">';
  }
  ?>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-youtube"></a>
    </div>
  </div>
</body>

<script>
$( document ).ready(function() {
  let validEmail = false;
  let cbxChecked = false;
  $(".email-form input").keyup(function() {
    let txt = $(".email-form input").val();
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(txt))
      {
        parts = txt.split(".");
        let l = parts.length;
        if (parts[l-1] == "co") {
          validEmail = false;
          $(".validation-msg").text("We are not accepting subscriptions from Columbia emails");
          $(".btn").prop("disabled", true);
        } else {
          validEmail = true;
          $(".validation-msg").text("");
          if (cbxChecked) {
            $(".btn").prop("disabled", false);
          } else {
            $(".tos-validation").text("You must accept the terms and conditions");
          }
        }
      } else {
        validEmail = false;
        $(".btn").prop("disabled", true);
        if (txt=="") {
          $(".validation-msg").text("Email address is required");
        } else {
          $(".validation-msg").text("Please provide a valid e-mail address");
        }
      }
  });

  $(".cbx").change(function() {
     if (this.checked) {
       cbxChecked = true;
       $(".tos-validation").text("");
       if (validEmail) {
         $(".btn").prop("disabled", false);
       }
     } else {
       cbxChecked = false;
       $(".btn").prop("disabled", true);
       $(".tos-validation").text("You must accept the terms and conditions");
     }
  });
/*
  $(".btn").click(function() {
    $(".content").hide();
    $(".success").show();
});
*/
});
</script>
</html>
