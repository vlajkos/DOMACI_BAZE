<?php
class User {
private $id;
private $username;
private $password;
private $city;
private $birth;
private $gender;
private $email;
public function __construct($id,  $email,  $password, $username, $city, $birth, $gender,) {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->city = $city;
    $this->email = $email;
    $this->birth = $birth;
    $this->gender = $gender;
    
}
public function getId() {
    return $this->id;
}
public function setId($id) {
    $this->id = $id;
}
public function setUsername($username) {
    $this->username = $username;
}
public function getUsername() {
    return $this->username;
}
public function setPassword($password) {
    $this->password = $password;
}
public function getPassword() {
    return $this->password;
}
public function setCity($city) {
    $this->city = $city;
}
public function getCity() {
    return $this->city;
}
public function setEmail($email) {
    $this->email = $email;
}
public function getEmail() {
    return $this->email;
}
public function setBirth($birth) {
    $this->birth = $birth;
}
public function getBirth() {
    return $this->birth;
}
public function setGender($gender) {
    $this->gender = $gender;
}
public function getGender() {
    return $this->gender;
}

public function registerUser($conn) {
    $query = "INSERT INTO users (email, username, password, birth, gender, city)
    VALUES ('{$this->email}', '{$this->username}', '{$this->password}', '{$this->birth}', '{$this->gender}', '{$this->city}')";
    return $conn->query($query);
}

}






?>