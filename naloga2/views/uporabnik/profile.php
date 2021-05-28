<div class="profile">
    <h4>Uporabniško ime: <?php echo $uporabnik->username; ?></h4>
    <div class="container-fluid well span6">
        <div class="row-fluid">
            <div class="span2">
                <i class="fas fa-user fa-10x"></i>
            </div>

            <div class="span8">
                <br>
                <h6>Spol: <?php 
                if($uporabnik->gender=='male'){
                    echo "Moški";
                }else{
                    echo "Ženski";
                }
                ?></h6>
                <h6>Email: <?php echo $uporabnik->email; ?></h6>
                <h6>Naslov: <?php echo $uporabnik->address; ?></h6>
                <h6>Pošta: <?php echo $uporabnik->post; ?></h6>
                <h6>Telefon: <?php echo $uporabnik->phone; ?></h6>
            </div>
        </div>
    </div>
</div>