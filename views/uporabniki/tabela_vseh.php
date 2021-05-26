<style>
#id
{
    width:100%;
    text-align: center;
}

.innerText
{
	width: 85%;
	display: inline-block;
}

.innerButton
{
	float: right;
	display: inline-block;
}
</style>

<?php 
	function get_all()
	{
		global $conn;
			
		$query = "SELECT * 
				  FROM uporabniki 
				  ORDER BY ime;";
				  
		$res = $conn->query($query);
		$users = array();
			
		while($user = $res->fetch_object())
		{
			array_push($users, $user);
		}
		
		return $users;
	}	
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
$users = get_all();
$id = $_SESSION["USER_ID"];
$uporabnik = get_user($id);

	?>
	<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
					<div class="col-sm-8"><h2><b>Seznam registriranih</b></h2></div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>ime</th>
								<th>priimek</th>
								<th>uporabni�ko ime</th>
								<th>spremeni</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach($users as $user){ ?>
								<tr>
									<td><?php echo $i ;?> </td>
									<td><?php echo $user->ime ;?> </td>
									<td><?php echo $user->priimek;?> </td>
									<td><?php echo $user->username;?> </td>
									<td>
									<?php
									if($uporabnik->vloga == "administrator"){ ?>
										<div class="innerButton"><a class="btn btn-primary" href="?controller=uporabniki&action=urediUporabnike&id=<?php echo $user->id?>">Uredi</a></div>
									<?php
										}
									?>
									</td>
								</tr>
						<?php $i++;
							} ?> 
						</tbody>
					</table>
			<a class="btn btn-primary" href="?controller=strani&action=uredi">Domov</a>
		</div>
	</div>
<br/><br/>























