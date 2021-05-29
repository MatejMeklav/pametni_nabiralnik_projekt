<?php
function get_all()
{
    global $conn;

    $query = "SELECT najem.*, uporabnik.uporabnisko_ime, nabiralnik.ime FROM najem 
            LEFT JOIN uporabnik ON uporabnik.id = najem.id_uporabnik
            LEFT JOIN nabiralnik ON nabiralnik.id = najem.id_nabiralnik";


    $res = $conn->query($query);
    $paketniki = array();

    while($paketnik = $res->fetch_object())
    {
        array_push($paketniki, $paketnik);
    }

    return $paketniki;
}
function get_user($id)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $id);

    $query = "SELECT *
				  FROM nabiralnik 
				  WHERE id = $id";

    $res = $conn->query($query);

    if($obj = $res->fetch_object())
    {
        return $obj;
    }

    return null;
}
$paketniki = get_all();
$id = $_SESSION["uporabnik_id"];
$paketnik = get_user($id);

?>

<!-- <a href="?controller=uporabnik&action=add" class="btn btn-success"><i class="fas fa-user-plus"></i> Dodaj uporabnika</a> -->

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Uporabniško ime</th>
                <th>Ime paketnika</th>
                <th>Najem od</th>
                <th>Najem do</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($paketniki as $paketnik) { ?>
                <tr>
                    <td><?php echo $paketnik->id; ?></td>
                    <td><?php echo $paketnik->uporabnisko_ime; ?></td>
                    <td><?php echo $paketnik->ime; ?></td>
                    <td><?php echo $paketnik->najem_od; ?></td>
                    <td><?php echo $paketnik->najem_do; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>