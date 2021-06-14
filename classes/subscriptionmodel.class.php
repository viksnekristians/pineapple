<?php

class SubscriptionModel extends Database {

  // Funkcija, kas atgriež visu abonejumu sarakstu
  protected function getSubscriptions($parameter) {
      if ($parameter == 'email') {
        $sql = "select * from subscriptions order by ".$parameter.";";
      } else {
        $sql = "select * from subscriptions order by ".$parameter." desc;";
      }
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
    }

    protected function makeSubscription($email, $provider, $date ) {
      $sql = "insert into subscriptions(email, provider, date)
      values (?,?,?);";
      //"Prepared statement" izveide, izpilde
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$email, $provider, $date]);
    }

    // funkcija, kas izdzēš abonomentu pēc id
    protected function deleteSubscription($id) {
      $sql = "delete from subscriptions where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    }

}
