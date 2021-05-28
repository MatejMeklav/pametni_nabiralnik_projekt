<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Čas Dostopa</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dostopi as $dostop) { ?>
                <tr>
                    <td><?php echo $dostop->id; ?></td>
                    <td><?php echo $dostop->cas_odpiranja; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>