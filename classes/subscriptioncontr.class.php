<?php

class SubscriptionContr extends SubscriptionModel {

  //Funkcija, kas izveido jaunu ierakstu
  public function createSubscription ($email, $provider, $date) {
    $this->makeSubscription($email, $provider, $date);
  }

  public function removeSubscription($id) {
    $this->deleteSubscription($id);
  }
}
