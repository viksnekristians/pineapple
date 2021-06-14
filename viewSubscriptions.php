<?php
include "includes/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
</style>
<script src=""></script>
<body>
  <?php
  //izdzest abonomentus, ja tika uzspiesta 'delete' poga
  if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sc = new SubscriptionContr();
    $sc->removeSubscription($id);
  }

    $sv = new SubscriptionView();

    //kārtošana
    if (isset($_POST['sort'])) {
      if ($_POST['sort'] == 'date') {
        $results = $sv->getResults('date');
      } else if (($_POST['sort'] == 'email')) {
        $results = $sv->getResults('email');
      } else {
        $results = $sv->getResults('date');
      }
    } else {
      $results = $sv->getResults('date');
    }
  ?>
  <table style="width:50%">
    <tr>
      <th>Email</th>
      <th>Date</th>
      <th></th>
    </tr>
  <?php
    $providers = array();

    // iet cauri visiem rezultātiem no db
    foreach ($results as $row) {
      //dažādu provideru glabāšana masīvā
      $provider = $row['provider'];
      if (!in_array($provider,$providers)) {
        array_push($providers, $provider);
      }

      if (isset($_POST['provider'])) {
        $prov = $_POST['provider'];
        if ($row['provider'] == $prov) {
          echo "<tr><td>".$row['email']."</td><td>".$row['date']."</td><td><form action='' method='post'><button type='submit' name='delete' value=".$row['id'].">Delete</button>";
          if (isset($_POST['sort'])) {
            echo "<input type='hidden' name='sort' value=".$_POST['sort'].">";
          }
            echo "<input type='hidden' name='provider' value=".$_POST['provider'].">";
          echo "</form></td></tr>";
        }
      } else if (isset($_POST['search'])) {
          if (strpos($row['email'],$_POST['search']) !== false) {
            echo "<tr><td>".$row['email']."</td><td>".$row['date']."</td><td><form action='' method='post'><button type='submit' name='delete' value=".$row['id'].">Delete</button>";
            if (isset($_POST['sort'])) {
              echo "<input type='hidden' name='sort' value=".$_POST['sort'].">";
            }
            echo "<input type='hidden' name='search' value=".$_POST['search'].">";
            echo "</form></td></tr>";
          }
      } else {
        echo "<tr><td>".$row['email']."</td><td>".$row['date']."</td><td><form action='' method='post'><button type='submit' name='delete' value=".$row['id'].">Delete</button>";
        if (isset($_POST['sort'])) {
          echo "<input type='hidden' name='sort' value=".$_POST['sort'].">";
        }
        echo "</form></td></tr>";
      }
  }

    echo "<h5>Filter by provider:</h5>";
    echo "<form action='' method='post' ><button type='submit' >ALL</button>";
    if (isset($_POST['sort'])) {
      echo "<input type='hidden' name='sort' value=".$_POST['sort'].">";
    }
    echo "</form>";
  foreach ($providers as $p) {
    echo "<form action='' method='post'><button type='submit' name='provider' value=".$p.">".$p."</button>";
    if (isset($_POST['sort'])) {
      echo "<input type='hidden' name='sort' value=".$_POST['sort'].">";
    }
    echo "</form>";
  }
  ?>
  <h5>Sort by:</h5>
  <form class="" action="" method="post">
    <button type="submit" name="sort" value="email">Email</button>
    <button type="submit" name="sort" value="date">Date</button>
    <?php
    if (isset($_POST['provider'])) {
      echo "<input type='hidden' name='provider' value=".$_POST['provider'].">";
    }
    ?>
  </form>

  <h5>Search:</h5>
  <form class="" action="" method="post">
    <input type="text" name="search">
    <button type="submit">Search</button>
  </form>
</table>
</body>
</html>
