<!--enostaven pogled za prikaz enega oglasa -->
<!-- ta se nahaja v spremenljivki $oglas, ki smo jo pripravili v kontrolerju -->
 <div class="panel panel-default">
  <div class="panel-heading"><h2><?php echo $oglas->naslov; ?></h2><span class="label label-primary"><?php echo $oglas->datumObjave; ?></span></div>
  <div class="panel-body"><?php echo $oglas->vsebina; ?></div>
     <?php $oglasUserId= $oglas->user_id;
     if(isset($_SESSION['user_id'])){
      if($_SESSION["user_id"] == $oglasUserId){?>
          <a id="edit-comment" href='?controller=oglasi&action=uredi&id=<?php echo $oglas->id; ?>' class="btn btn-info btn-block rounded-0 py-2">Uredi oglas</a><?php
      }
     }?>


</div> 

<div class="panel panel-default">
    <div class="panel-body" id="comments"></div>
    <div class="panel-heading"><h2>Pretekli komentarji</h2></div>
    <p id="komentarji"></p>

</div>

<div class="panel panel-default">
    <input type="hidden" id="oglas_id" value="<?php echo $oglas->id; ?>" />
  <div class="card border-primary rounded-0">
        <div class="card-header p-0">
            <div class="bg-info text-white text-center py-2">
                <h3><i class="fa fa-envelope"></i> Vaš komentar</h3>
                <p class="m-0"> Oddaj komentar</p>
            </div>
        </div>
        <div class="card-body p-3">
            <!--Body-->
            <?php if(!isset($_SESSION['user_id'])){?>
                <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                        <input type="hidden" id="user_id" name="user_id" value="0">
                    </div>
                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Vaš vzdevek" required>
                </div>
            </div>
               <?php
            }else{?>
                <input type="hidden" id="nickname" name="nickname" value="<?php echo $_SESSION["username"] ?>">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
            <?php
            }
            ?>
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Vaš e-naslov" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                    </div>
                    <textarea id="comment" name="comment" class="form-control" placeholder="" required></textarea>
                </div>
            </div>

            <div class="text-center">
                <a id="add-comment"class="btn btn-info btn-block rounded-0 py-2">Oddaj komentar</a>
            </div>
        </div>

    </div>
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

$("#add-comment").on('click', function(e){
  var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(),user_id:$("#user_id").val() }

  $.post("api/komentar", JSON.stringify(komentar), function(data){
    //$("#cors").append(JSON.stringify(data));
    console.log(data);
  });

  e.preventDefault();
});

$( document ).ready(function(){
    var komentar={ nickname:$("#nickname").val(), email:$("#email").val(), comment:$("#comment").val(), oglas_id:$("#oglas_id").val(), id:$("#id").val(),date_added:$("#date_added").val()  }
    $.get("api/komentar/"+$("#oglas_id").val(),komentar,function(data){

        data.sort(GetSortOrder("date_added"));

        var i;
        var text = "";
        var textNeprijavljen = "";
        for (i = 0; i < data.length; i++) {
            text += "<p style='border-style: none none none solid;background-color:powderblue;'>Ime komentatorja:" + data[i].nickname+" <br> Email: "+ data[i].email +"<br> Datum objave:"+data[i].date_added+"</p><p> Komentar: " + data[i].comment+"</p>";
            text+= "<a style='color: black;background: #2498ff;border-radius: 25px;' href='?controller=oglasi&action=prikaziKomentar&id="+data[i].id+"'>Poglej vsebino</a>";
        }
        document.getElementById("komentarji").innerHTML = text;

    });
});


</script>