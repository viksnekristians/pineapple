<?php

class SubscriptionView extends SubscriptionModel {

  //Funkcija, kas atgriež visas tabulas rindas
  public function getResults($parameter) {
    $results = $this->getSubscriptions($parameter);
    return $results;
  }



}
