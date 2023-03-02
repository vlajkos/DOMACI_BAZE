<?php
class Mushroom {
    private $id;
    private $naziv;
    private $latinskiNaziv;
    private $datum;
    private $lokacija;
    private $pomoc;
    private $opis;


    public function __construct($id, $latinskiNaziv= NULL, $naziv, $datum, $lokacija, $pomoc, $opis) {
        $this->naziv= $latinskiNaziv;
        $this->latinskiNaziv= $naziv;
        $this->datum= $datum;
        $this->lokacija= $lokacija;
        $this->pomoc= $pomoc;
        $this->opis= $opis;
    }

    public function setId($id) {
        $this->id= $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setLatinskiNaziv($latinskiNaziv) {
        $this->latinskiNaziv= $latinskiNaziv;
    }
    public function getLatinskiNaziv() {
        return $this->latinskiNaziv;
    }
    public function setNaziv($naziv) {
        $this->naziv= $naziv;
    }
    public function getNaziv() {
        return $this->naziv;
    }
    public function setDatum($datum) {
        $this->datum= $datum;
    }
    public function getDatum() {
        return $this->datum;
    }
    public function setLokacija($lokacija) {
        $this->lokacija= $lokacija;
    }
    public function getLokacija() {
        return $this->lokacija;
    }
    public function setPomoc($pomoc) {
        $this->pomoc= $pomoc;
    }
    public function getPomoc() {
        return $this->pomoc;
    }
    public function setOpis($opis) {
        $this->opis= $opis;
    }
    public function getOpis() {
        return $this->opis;
    }


    public static function add($mushroom, $conn) {
        $query = "INSERT INTO mushroom(latinskiNaziv, naziv, datum, lokacija, opis)
        VALUES ('{$mushroom->getLatinskiNaziv()}', '{$mushroom->getNaziv()}', 
        '{$mushroom->getDatum()}', '{$mushroom->getLokacija()}', '{$mushroom->getOpis()}')";
         $result = $conn->query($query);
         return $result;
    }
    public static function prikaziSve(mysqli $conn)
    {
        $query = "SELECT * 
                  FROM mushroom";
        return $conn->query($query);
    } 
    public static function delete($conn, $mushroomId) {
        $query = "DELETE FROM mushroom
                  WHERE mushroomId = $mushroomId";
        return $conn->query($query);
    }
  
    public static function writeLocationHref($location) {
        $location = str_replace(" ", "", $location);
        $n = substr($location, 0, 10);
        $e = substr($location, -10, 10);
        $nDegrees = substr($n,0,2 );
        $nMinutes = "0." . substr($n, 3, 10);
        $nMinutes= (float)$nMinutes;
        $nMinutes = $nMinutes*60;
        $nSeconds = "0." . substr($nMinutes, 3, 10);
        $nMinutes = substr($nMinutes,0 , 2);
      
        $nSeconds= (float)$nSeconds;
        $nSeconds = $nSeconds*60;
        $nSeconds = substr($nSeconds, 0 , 4);


        $eDegrees = substr($e,0,2 );
        $eMinutes = "0." . substr($e, 3, 10);
        $eMinutes= (float)$eMinutes;
        $eMinutes = $eMinutes*60;
        $eSeconds = "0." . substr($eMinutes, 3, 10);
        $eMinutes = substr($eMinutes,0 , 2);
      
        $eSeconds= (float)$eSeconds;
        $eSeconds = $eSeconds*60;
        $eSeconds = substr($eSeconds, 0 , 4);
       
        return "https://www.google.com/maps/place/$nDegrees%C2%B0$nMinutes'$nSeconds%22N+$eDegrees%C2%B0$eMinutes'$eSeconds%22E/data=!3m2!1e3!4b1!4m4!3m3!8m2!3d44.6896944!4d20.5216389";
        
    }
}



?>