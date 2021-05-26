<a href="?controller=uporabnik&action=add" class="btn btn-success"><i class="fas fa-user-plus"></i> Dodaj uporabnika</a>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Up. ime</th>
                <th>Naslov</th>
                <th>Pošta</th>
                <th>E-mail</th>
                <th>Telefon</th>
                <th>Spol</th>
                <th>Admin</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($uporabniki as $uporabnik) { ?>
                <tr>
                    <td><?php echo $uporabnik->id; ?></td>
                    <td><?php echo $uporabnik->username; ?></td>
                    <td><?php echo $uporabnik->address; ?></td>
                    <td><?php echo $uporabnik->post; ?></td>
                    <td><?php echo $uporabnik->email; ?></td>
                    <td><?php echo $uporabnik->phone; ?></td>
                    <td><?php echo $uporabnik->gender; ?></td>
                    <td><?php echo ($uporabnik->admin) ? 'Administrator' : 'Uporabnik'; ?></td>
                    <td>
                        <a href="?controller=uporabnik&action=edit&user_id=<?php echo $uporabnik->id; ?>" class="btn btn-success"><i class="fa fa-pencil-square"></i> Uredi</a>
                        <a  data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fas fa-user-times"></i> Odstrani</a>
                        <button type="button" class="btn btn-primary">
                            Število oglasov <span class="badge badge-light"><?php print_r($ids[$uporabnik->id]); ?></span>
                        </button>
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