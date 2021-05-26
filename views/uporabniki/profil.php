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
	
$id = $_SESSION["USER_ID"];
$uporabnik = get_user($id);

?>

<p><h2>Profil</h2></p>
<form action="?controller=uporabniki&action=uredi_uporabnike" method="POST">
	<div class="form-group">
	
		<input type="text" class="form-control" name="id" value="<?php echo $uporabnik->id?>" hidden />
	
		<label>Ime:</label>
		<input type="text" class="form-control" name="ime" placeholder="Ime" value="<?php echo $uporabnik->ime?>" />
		
		<label>Priimek:</label>
		<input type="text" class="form-control" name="priimek" placeholder="Priimek" value="<?php echo $uporabnik->priimek?>" />
		
		<label>Email:</label>
		<input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $uporabnik->email?>" />
		
		<label>Username:</label>
		<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $uporabnik->username?>" />
		
		<br>
		<?php
			if($uporabnik->vloga == "administrator")
			{
				?>
				<input class="btn btn-primary" type="submit" name="uredi" value="Uredi"/>
				<?php
			}
		?>

	</div>
</form>