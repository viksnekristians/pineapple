<?php
include "autoloader.php";

if (isset($_POST['subscribe'])) {
  $email = $_POST['email'];
  $date = date("Y.m.d")." ".date("H:i:s");
  if (empty($email)) {
    header("Location: ../index.php?emp=1");
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../index.php?invalid=1");
  } else if (end(explode(".", $email)) == "co") {
    header("Location: ../index.php?col=1");
  } else if ($_POST['cbx'] != 'on') {
    header("Location: ../index.php?nocheck=1");
  } else {
    $s = new SubscriptionContr();
    $parts = explode("@",$email);
    if (count($parts) == 2) {
      $provider = $parts[1];
    } else {
      $provider = "unknown";
    }
    $s->createSubscription($email, $provider, $date);
    header("Location: ../index.php?success=1");
  }
} else {
    header("Location: ../index.php");
}
