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
}



?>