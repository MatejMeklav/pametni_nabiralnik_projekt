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
function get_box($id)
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
$id = $_SESSION["uporabnik_id"];
$uporabnik = get_box($id);

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
                        <a href="?controller=nabiralnik&action=dodajNabiralnik&user_id=<?php echo $uporabnik->id; ?>" class="btn btn-success"><i class="fa fa-archive"></i> dodaj nabiralnik</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>