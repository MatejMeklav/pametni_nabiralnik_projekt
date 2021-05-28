<?php

//model za oglas, ki vsebuje lasntosti, ki definirajo strukturo oglasa 
//in metode, ki vračajo podatke iz trajne hrambe ali jih tja zapisujejo
//v tem razredu so vse metode statične, lahko pa bi bile tudi običajne, pri čemer bi potrem bilo potrebno vsakič ustvarjat objekt


class Uporabnik {
  
  public $id;
  public $username;
  public $password;
  public $gender;
  public $email;
  public $addres;
  public $post;
  public $admin;
  public $phone;

  //konstruktor
  public function __construct($id, $username, $password, $gender, $email, $address, $post, $admin , $phone) {
  	$this->id = $id;
	$this->username = $username;
	$this->password = $password;
	$this->gender = $gender;
	$this->email = $email;
	$this->address = $address;
	$this->post = $post;
	$this->admin = $admin;
	$this->phone = $phone;
  }

  public static function login($username, $password){
	$db = Db::getInstance();
	$result = mysqli_query($db,"SELECT * FROM user WHERE username='".mysqli_real_escape_string ($db , $username)."' AND password='".mysqli_real_escape_string ($db , sha1($password))."';");
	
	$row = mysqli_fetch_assoc($result);
	if(!$row){
		return false;	
	}else{
		return new Uporabnik($row['id'], $row['username'], $row['password'], $row['gender'], $row['email'], $row['address'], $row['post'], $row['admin'], $row['phone']);
	}
    
  }

  public static function register($username, $password, $gender, $email, $address, $post, $phone){
    ini_set('display_errors',1);
  error_reporting(E_ALL);
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$db = Db::getInstance();
  $admin = 0;
  $password_sha= sha1($password);
	if ($stmt = mysqli_prepare($db, "INSERT INTO user (username, password, gender, phone , post, email, address, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
		//dodamo parametre po vrsti namesto vprašajev
		//s string, i integer ,d double, b blob
	 	mysqli_stmt_bind_param($stmt, "ssssissi",$username, $password_sha, $gender, $phone, $post, $email, $address, $admin);
 		mysqli_stmt_execute($stmt);
 		mysqli_stmt_close($stmt);
	}
	
  }

  public static function  username_exists($username){
	$db =Db::getInstance();
	$username = mysqli_real_escape_string($db, $username);
	$result = mysqli_query($db,"SELECT * FROM user WHERE username='".$username."'");
	$row = mysqli_fetch_assoc($result);
	if(!$row){
		return false;
	}else{
		return true;
	}
	
}

  public static function list() {
    $list = [];
      //dobimo objekt, ki predstavlja povezavo z bazo
    $db = Db::getInstance();
      //izvedemo query
    $result = mysqli_query($db,'SELECT * FROM user');

    //v zanki ustvarjamo nove objekte in jih dajemo v seznam
    while($row = mysqli_fetch_assoc($result)){
      $list[] = new Uporabnik($row['id'], $row['username'], $row['password'], $row['gender'], $row['email'], $row['address'], $row['post'], $row['admin'], $row['phone']);
    }
    
        //statična metoda vrača seznam objektov iz baze
    return $list;
  }

  public static function get($user_id) {
    $user_id = intval($user_id);
    
    $db = Db::getInstance();
    $result = mysqli_query($db,"SELECT * FROM user WHERE id=$user_id");
    $row = mysqli_fetch_assoc($result);
    return new Uporabnik($row['id'], $row['username'], $row['password'], $row['gender'], $row['email'], $row['address'], $row['post'], $row['admin'], $row['phone']);

  }

  public static function save($data){
    $db = Db::getInstance();
    if ($stmt = mysqli_prepare($db, "UPDATE user SET username=?, gender=?, phone=?, post=?, email=?, address=? WHERE id=?")) {
      //dodamo parametre po vrsti namesto vprašajev
      //s string, i integer ,d double, b blob
      mysqli_stmt_bind_param($stmt, "sssissi",$data['username'], $data['gender'], $data['phone'], $data['post'], $data['email'], $data['address'], $data['id']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
  }

  public static function delete($user_id){
    $user_id = intval($user_id);
    $db = Db::getInstance();
    $result = mysqli_query($db,"DELETE FROM user WHERE id=$user_id");
      mysqli_query($db,"DELETE FROM oglas WHERE user_id=$user_id");
      mysqli_query($db,"DELETE FROM comment WHERE user_id=$user_id");

    //result, lahko preverimo uspešnost poizvedbe;
  }

  public static function add($data){
    $db = Db::getInstance();
    $password = sha1($data['password']);
    $admin = 0;

    if ($stmt = mysqli_prepare($db, "INSERT INTO user (username, password, gender, phone , post, email, address, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
      //dodamo parametre po vrsti namesto vprašajev
      //s string, i integer ,d double, b blob
       mysqli_stmt_bind_param($stmt, "ssssissi",$data['username'], $password, $data['gender'], $data['phone'], $data['post'], $data['email'], $data['address'], $admin);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
    }
    
  }
 
}
