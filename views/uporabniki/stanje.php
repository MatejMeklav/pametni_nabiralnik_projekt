<?php
function get_all()
{
    global $conn;

    $query = "SELECT * 
				  FROM uporabnik 
				  ORDER BY uporabnisko_ime;";

    $res = $conn->query($query);
    $uporabniki = array();

    while($user = $res->fetch_object())
    {
        array_push($uporabniki, $user);
    }

    return $uporabniki;
}
function get_user($id)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);

    $query = "SELECT *
				  FROM uporabnik 
				  WHERE id = $id";

    $res = $conn->query($query);

    if($obj = $res->fetch_object())
    {
        return $obj;
    }

    return null;
}
$uporabniki = get_all();
$id = $_SESSION["USER_ID"];
$uporabnik = get_user($id);

?>

<!-- <a href="?controller=uporabnik&action=add" class="btn btn-success"><i class="fas fa-user-plus"></i> Dodaj uporabnika</a> -->

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Uporabniško ime</th>
                <th>E-mail</th>
                <th>Vloga</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($uporabniki as $uporabnik) { ?>
                <tr>
                    <td><?php echo $uporabnik->id; ?></td>
                    <td><?php echo $uporabnik->uporabnisko_ime; ?></td>
                    <td><?php echo $uporabnik->email; ?></td>
                    <td><?php echo $uporabnik->vloga; ?></td>
                    <td>
                                <!-- TODO: link na dodaj paketnik -->
                        <a href="?controller=Nabiralni&action=dodaj&user_id=<?php echo $uporabnik->id; ?>" class="btn btn-success"><i class="fa fa-pencil-square"></i> dodaj nabiralnik</a>
                        <a  data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fas fa-user-times"></i> Odstrani uporabnika</a>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="modal" id="myModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Potrditev brisanja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="myFunction()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ste prepričani, da želite izbrisati uporabnika?</p>
            </div>
            <div class="modal-footer">
                <button type="button" aria-label="Close" class="btn btn-secondary" onclick="myFunction()" data-bs-dismiss="modal">Prekliči</button>
                <a href="?controller=uporabnik&action=delete&user_id=<?php echo $uporabnik->id; ?>" class="btn btn-danger"><i class="fas fa-user-times"></i> Izbriši</a>
            </div>
        </div>
    </div>
</div>