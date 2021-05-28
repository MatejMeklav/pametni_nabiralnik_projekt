<?php



class Komentar {
  
  public $id;
  public $oglas_id;
  public $email;
  public $nickname;
  public $comment;
  public $date_added;
  public $user_id;

  //konstruktor
  public function __construct($id, $oglas_id, $email, $nickname, $comment, $date_added,$user_id) {
    $this->id      = $id;
    $this->oglas_id  = $oglas_id;
    $this->email = $email;
    $this->nickname=$nickname;
    $this->comment=$comment;
    $this->date_added=$date_added;
    $this->user_id =$user_id;
  }

  public function dodaj($db) {
    $oglas_id=$this->oglas_id;
    $email=$this->email;
    $nickname=$this->nickname;
    $comment=$this->comment;
    $date_added=$this->date_added;
    $user_id = $this->user_id;


    $qs="INSERT INTO comment (oglas_id, email, nickname, comment, date_added,user_id) values('$oglas_id','$email', '$nickname', '$comment', '$date_added','$user_id');";
    $result=mysqli_query($db,$qs);

    if(mysqli_error($db))
    {
        var_dump(mysqli_error($db));
        exit();
    }
    $this->id=mysqli_insert_id($db);
  }

  public static function vrniEnega($db, $id) {
    $qs="SELECT * FROM comment WHERE comment.id=$id";
    $result =mysqli_query($db,$qs);
    $row = mysqli_fetch_assoc($result);
    return new Komentar($row['id'], $row['oglas_id'], $row['email'],$row['nickname'],$row['comment'],$row['date_added'],$row['user_id']);

  }

  public static function vrniZadnjihPet($db){
    $qs="select * from comment order by date_added desc limit 5";
    $result =mysqli_query($db,$qs);
    $row = mysqli_fetch_assoc($result);

    while($row = mysqli_fetch_assoc($result)){
      $komentarji[] = new Komentar($row['id'], $row['oglas_id'], $row['email'],$row['nickname'],$row['comment'],$row['date_added'],$row['user_id']);

    }

    return $komentarji;
  }

  public static function vrniVse($db, $oglas_id) {

    $qs="SELECT * FROM comment WHERE oglas_id=$oglas_id";
    $result =mysqli_query($db,$qs);
    $row = mysqli_fetch_assoc($result);

    while($row = mysqli_fetch_assoc($result)){
      $komentarji[] = new Komentar($row['id'], $row['oglas_id'], $row['email'],$row['nickname'],$row['comment'],$row['date_added'],$row['user_id']);

    }

    return $komentarji;

  }

  public static function brisi($db, $id) {

    $qs="DELETE FROM comment WHERE id=$id";
    $result =mysqli_query($db,$qs);
  }
}

?>

