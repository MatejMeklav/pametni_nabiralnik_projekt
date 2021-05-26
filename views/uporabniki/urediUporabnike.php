<?php 
	function get_user($id)
	{
		global $conn;
		$id = mysqli_real_escape_string($conn, $id);
		
		$query = "SELECT *
				  FROM uporabniki 
				  WHERE id = $id";
				  
		$res = $conn->query($query);
		
		if($obj = $res->fetch_object())
		{
			return $obj;
		}
		
		return null;
	}
	
$id = $_GET["id"];
$uporabnik = get_user($id);
?>

<p><h2>Uredi uporabnika</h2></p>
<form action="?controller=uporabniki&action=uredi_uporabnike" method="POST">
	<div class="form-group">
			<input type="text" class="form-control" name="id" value="<?php echo $uporabnik->id?>" hidden />
			<label>ime</label><input class="form-control" type="text" name="ime" /> <br/>
			<label>priimek</label><input class="form-control" type="text" name="priimek" /> <br/>
			<label>email</label><input class="form-control" type="text" name="email" /> <br/><br/>
			<label>Uporabnisko ime</label><input class="form-control" type="text" name="username" /> <br/>
			<label>Geslo</label><input class="form-control" type="password" name="password" /> <br/>
			<label>Ponovi geslo</label><input class="form-control" type="password" name="repeat_password" /> <br/><br/>
			<input class="btn btn-primary" type="submit" name="Dodaj" value="Dodaj"/>
		</div>
</form>