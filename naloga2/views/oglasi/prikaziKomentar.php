<div class="buttons">
    <p id="komentarji"></p>
</div>


<p ><?php $komentar -> nickname?></p>

<script>
<?php
if($idbool == true){?>
    $( document ).ready(function(){
        var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val() }
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('=') + 1);
        $.get("api/komentar/1/"+id,komentar,function(data){
            var i;
            var text = "";
            text += "<p style='border-style: none none none solid;background-color:powderblue;'>Ime komentatorja:" + data.nickname+" <br> Email: "+ data.email +"<br> Datum objave:"+data.date_added+"</p><p> Komentar: " + data.comment+"</p><button type='button' id='Delete-Btn' class='btn btn-danger'>Brisi</button>";
            document.getElementById("komentarji").innerHTML = text;

        });
    });
    <?php
}else{
?>
    $( document ).ready(function(){
        var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val() }
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('=') + 1);
        $.get("api/komentar/1/"+id,komentar,function(data){
            var i;
            var text = "";
            text += "<p style='border-style: none none none solid;background-color:powderblue;'>Ime komentatorja:" + data.nickname+" <br> Email: "+ data.email +"<br> Datum objave:"+data.date_added+"</p><p> Komentar: " + data.comment+"</p>";
            document.getElementById("komentarji").innerHTML = text;

        });
    });
    <?php
    }
?>


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