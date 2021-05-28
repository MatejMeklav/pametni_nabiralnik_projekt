<div class="oglas">
    <div class="buttons">
    <p id="komentarji"></p>
    </div>
	<form action="" method="POST" enctype="multipart/form-data">
        <h2">Uredi oglas</h2></form><br>
	<label>Naslov oglasa:</label><input type="text" name="title" value="<?php echo $oglas->naslov;?>"/><br>
	<label>Vsebina:</label><textarea  name="description" rows="10" cols="50"><?php echo $oglas->vsebina;?></textarea> <br/>
        <label>Datum objave: </label><span class="label label-primary"><?php echo $oglas->datumObjave; ?></span><br>
        <input type="submit" name="potrdi" value="Potrdi spremembe" /> <br/>
	</form>
</div>
<script>
    function GetSortOrder(prop) {
        return function(a, b) {
            if (a[prop] < b[prop]) {
                return 1;
            } else if (a[prop] > b[prop]) {
                return -1;
            }
            return 0;
        }
    }
    $( document ).ready(function(){
        var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val(),date_added:$("#date_added").val()  }
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('=') + 1);
        $.get("api/komentar/"+id,komentar,function(data){

            data.sort(GetSortOrder("date_added"));

            var i;
            var text = "";
            var textNeprijavljen = "";
            for (i = 0; i < data.length; i++) {
                text += "<p style='border-style: none none none solid;background-color:powderblue;'>Ime komentatorja:" + data[i].nickname+" <br> Email: "+ data[i].email +"<br> Datum objave:"+data[i].date_added+"</p><p> Komentar: " + data[i].comment+"</p><button type='button' id='Delete-Btn' class='btn btn-danger'>Brisi</button>";
                text+= "<a style='color: black;background: #2498ff;border-radius: 25px;' href='?controller=oglasi&action=prikaziKomentar&id="+data[i].id+"'>Poglej vsebino</a>";
            }
            document.getElementById("komentarji").innerHTML = text;

        });
    });

    $(".buttons").on( 'click','#Delete-Btn',function(){

        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('=') + 1);

        var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val() }
        console.log(komentar);
        $.ajax({
            url: "api/komentar/"+id,
            data: JSON.stringify(komentar),
            method: "delete",
            success: function(data){$("#result").text(JSON.stringify(data));


            }});
        window.location.href = "http://localhost/?controller=oglasi&action=index";
    });


</script>

