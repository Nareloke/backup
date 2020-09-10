<?php
    $contentFromAPI2 = file_get_contents("https://api.magicthegathering.io/v1/types");
    $contentDecoded2 = json_decode( $contentFromAPI2 );
    $lista = $contentDecoded2->types;
    
?>

<div class="container" id="types">
    <h1 style="color:#343a40; background-color:lightblue; border-radius:10px; padding-left:10px;"> Tipos de carta </h1>
    <div class="row">
        <?php 
            $cont=0;
            $contImpar=0;
            foreach($lista as $item){
              if($contImpar==4){
                  echo '<div class="w-100"></div>';
                  $contImpar=0;
              }
              else{
                  $StringName = "'".$lista[$cont]."'";
                  echo '<div class="col-6 col-sm-3"><a style="color:#343a40" href="#" onclick="passName('.$StringName.')">'.$lista[$cont].'</a></div>';
                  $contImpar++;
                  $cont++;
              }
            }
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:lightblue">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- CONTEUDO -->
        <div class="container" id="InserirConteudo">

        </div>
        <!--         -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="wait" style="position: fixed; left: 50%; top: 50%; z-index: 999; display:none; backgorund-color:lightblue">
    <div class="spinner-border text-success" style="width: 5rem; height: 5rem;" role="status">
        <span class="sr-only">Carregando...</span>
    </div>
</div>

<script>
    function passName(name){
        let urlData = "https://api.magicthegathering.io/v1/cards?types="+name; 
        console.log(urlData);

        //Mostra a bolinha de loading
        $("#wait").show();

        $.ajax({
                url: urlData,
                type: "GET",
                dataType: "html"
            }).done(function(resposta) {  
                $("#wait").hide();
                console.log(resposta);
                resposta = JSON.parse(resposta); 
                InsereTituloModal(resposta)
                InsereDadosModal(resposta);
            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus);
            });
    }

    function InsereTituloModal(resposta){
      let tipoDaCarta = String(resposta.cards[0].type);
      console.log(tipoDaCarta);
      document.getElementById("exampleModalLongTitle").innerHTML = "Tipo: " + tipoDaCarta;
    }

    function InsereDadosModal(resposta){
      $('#InserirConteudo').html("");
      let tamanho = resposta.cards.length;
      console.log(tamanho);
      let pos;
      let conteudo;
      for(pos=0;pos<tamanho;pos++){
        conteudo = '<hr><div class="col" id="type-card" style="padding:10px;"><h3>'+resposta.cards[pos].name+'</h3><p>'+resposta.cards[pos].manaCost+'</p><img src="'+resposta.cards[pos].imageUrl+'"></div>';
        $("#InserirConteudo").append(conteudo);
      }
      $('#exampleModalCenter').modal();
    } 
</script>