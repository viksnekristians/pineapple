 <?php
//Klase, kas nodrošina savienojumu ar datubāzi
class Database {
  //Datubāzes parameteri
  private $host="localhost";
  private $user="root";
  private $password="";
  private $dbName="pineapple";

  // funkcija, kas izveido savienojumu ar datubāzi, izmantojot PDO
  protected function connect() {
    $dsn = 'mysql:host='.$this->host. ';dbname='. $this->dbName;

    //Savienojums ar datubāzi izmantojot PDO
    $pdo = new PDO($dsn, $this->user , $this->password);

    //Nepieciešams, lai no datubāzes iegūtie rezultāti tiktu iegūti asociatīva masīva veidā
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
