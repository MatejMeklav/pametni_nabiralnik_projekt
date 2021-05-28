<h2>Zadnjih pet komentarjev</h2>
<p id="komentarji"></p>

<p>Seznam vseh oglasov</p>
<!-- pogled za pregeld vseh oglasov-->
<!-- na vrhu damu uporabniku gumb, s katerim proži akcijo dodaj, da lahko dodaja nove uporabnike -->
<a href="?controller=oglasi&action=dodaj" class="btn btn-primary">Dodaj <i class="fas fa-plus"></i></a>
<table class="table table-hover">
    <>
      <tr>
        <th>Naslov</th>
        <th>Vsebina</th>
        <th>Datum Objave</th>
      </tr>
    </thead>
    <tbody>
 
 <!-- tukaj se sprehodimo čez array oglasov in izpisujemo vrstico posameznega oglasa-->

<?php foreach($oglasi as $oglas) { ?>
  <tr>
  <td><?php echo $oglas->naslov; ?></td>
  
  <td>
    <!-- pri vsakem oglasu dodamo povezavo na akcijo prikaži, z idjem oglasa. Uporabnik lahko tako proži novo akcijo s pritiskom na gumb.-->
    <a href='?controller=oglasi&action=prikazi&id=<?php echo $oglas->id; ?>'>Poglej vsebino</a>
	</td>
	<td><?php echo $oglas->datumObjave; ?></td>
 </tr>
<?php } ?>

    
       
      
    </tbody>
  </table>
<script>
    $( document ).ready(function(){
        var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val(),date_added:$("#date_added").val()  }
        $.get("api/komentar/vrniPet",komentar,function(data){

            //data.sort(GetSortOrder("date_added"));

            var i;
            var text = "";
            var textNeprijavljen = "";
            for (i = 0; i < data.length; i++) {
                text += "<p style='border-style: none none none solid;background-color:powderblue;'>Ime komentatorja:" + data[i].nickname+" <br> Email: "+ data[i].email +"<br> Datum objave:"+data[i].date_added+"</p><p> Komentar: " + data[i].comment+"</p>";
                text+= "<a style='color: black;background: #2498ff;border-radius: 25px;' href='?controller=oglasi&action=prikaziKomentar&id="+data[i].id+"'>Poglej vsebino</a>";
                text+= "<a style='color: black;background: #2498ff;border-radius: 25px;' href='?controller=oglasi&action=prikazi&id="+data[i].oglas_id+"'>Poglej Oglas</a>";
            }
            document.getElementById("komentarji").innerHTML = text;

        });
    });
</script>

