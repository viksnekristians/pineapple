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

    // funkcija, kas izdzēš rakstu pēc id
    protected function deleteSubscription($id) {
      $sql = "delete from subscriptions where id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    }
/*
    //Funkcija, kas atgriež vienu rakstu pēc id.
    protected function getArticle($id) {
        $sql = "select * from articles where a_id = ? ";
        //"Prepared statement" izveide, izpilde
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        //Rezultātu iegūšana
        $results = $stmt->fetchAll();
        return $results;
      }

    //Funkcija, kas atgriež ierakstu skaitu pēc id
    protected function getArticleCount($id) {
        $sql = "select count(*) from articles where a_id = ? ";
        //"Prepared statement" izveide, izpilde
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        //Rezultātu iegūšana
        $results = $stmt->fetch();
        return $results;
      }

    //Funkcija, kas izmaina rakstu
    protected function updateArticle($id, $title, $desc) {
        $sql = "update articles set a_title = ? , a_desc = ? where a_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title, $desc , $id]);
      }

      //Funkcija, kas izmaina raksta statusu
    protected function updateArticleStatus($id, $status) {
        $sql = "update articles set a_isDone = ? where a_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status , $id]);
        }

    // Funkcija, kas pievieno rakstu datubāzei
    protected function setArticle($title, $desc, $date ) {
      $sql = "insert into articles(a_title,a_desc,a_date,a_isDone)
      values (?,?,?,?);";
      //"Prepared statement" izveide, izpilde
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$title, $desc, $date , 0]);
    }

    // funkcija, kas izdzēš rakstu pēc id
    protected function deleteArticle($id) {
      $sql = "delete from articles where a_id = ?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$id]);
    }
    */
}
