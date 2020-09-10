<html>

   <head>
      <title>Arquivo com PHP</title>
      <meta charset="UTF-8">
   </head>
   
   <body>
      
      <?php
         function debug($param){
            echo "<pre>";
            print_r($param);
            echo "</pre>";
         }

         $caminhoArquivo = "./arquivos/funcionario.csv";
         $caminhoArquivo2 = "./arquivos/departamento.csv";

         //Abre como apenas leitura ("r")
         $arquivo = fopen( $caminhoArquivo, "r" );
         $arquivo2 = fopen( $caminhoArquivo2, "r" );
         
         $departamento = [];
         while (($linha = fgets($arquivo2)) !== FALSE) {
            $funcionario = [];
            $linha = str_replace('"', '', $linha);
            $linhaExplodida = explode(';',$linha);

            $funcionario["numero"] = $linhaExplodida[0];
            $funcionario["nome"] = $linhaExplodida[1];
            $funcionario["numeroFuncGer"] = $linhaExplodida[2];
            $funcionario["data"] = $linhaExplodida[3];

            array_push($departamento, $funcionario);
         }


         if( $arquivo == false ) {
            //Provavelmente vai cair aqui se o arquivo não existir 
            //ou se não tiver permissão para abrir o arquivo (Linux)
            echo ("Erro ao abrir o arquivo");
            exit();
         }
         
         $filesize = filesize( $caminhoArquivo );
         /*echo ( "Tamanho do arquivo : $filesize bytes" );*/
         //$conteudoArquivo = fread( $arquivo, $filesize );
         //debug($conteudoArquivo);

         /*while (($linha = fgetcsv($arquivo)) !== FALSE) {
            debug($linha);
         }*/
         /*while (($linha = fgets($arquivo)) !== FALSE) {
            $linha=str_replace('"', '', $linha);
            debug($linha);
            $linhaExplodida = explode(';',$linha);
            debug($linhaExplodida);
         }*/

         $funcionarios = [];
         while (($linha = fgets($arquivo)) !== FALSE) {
            $funcionario = [];
            $linha = str_replace('"', '', $linha);
            $linhaExplodida = explode(';',$linha);

            //Cria um array associativo para o funcionario atual
            $funcionario["id"] = $linhaExplodida[0];
            $funcionario["nome"] = $linhaExplodida[1];
            $funcionario["rua"] = $linhaExplodida[2];
            $funcionario["numero"] = $linhaExplodida[3];
            $funcionario["cep"] = $linhaExplodida[4];
            $funcionario["estado"] = $linhaExplodida[5];
            $funcionario["salario"] = $linhaExplodida[6];
            $funcionario["numerosuper"] = $linhaExplodida[7];          
            $funcionario["numeroDepartamento"] = $linhaExplodida[8];  
            array_push($funcionarios, $funcionario);
         }

         //Fecha o arquivo csv
         fclose( $arquivo2 );
         fclose( $arquivo );

   
         $salarios = [array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0),
         array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0),
         array("salarioTot"=>0, "quantidadeTot"=>0), array("salarioTot"=>0, "quantidadeTot"=>0)];

         // Insere os nomes dos departamentos
         for($i=1; $i<count($funcionarios); $i++) {

            $numero = (int) $funcionarios[$i]["numeroDepartamento"];
            $funcionarios[$i]["Departamento"] = $departamento[$numero]["nome"];

            $salarios[$numero-1]["salarioTot"] = (int) $salarios[$numero-1]["salarioTot"] + (int) $funcionarios[$i]["salario"]; 
            $salarios[$numero-1]["quantidadeTot"] = $salarios[$numero-1]["quantidadeTot"] + 1;
         }
         debug($funcionarios);
      
         $salarioMedio = [];
        for ($teste=1; $teste<count($salarios); $teste++) {
           $salario = [];
           $salario["Departamento"] = $departamento[$teste]["nome"];
           $salario["Salario Medio"] = $salarios[$teste-1]["salarioTot"] / $salarios[$teste-1]["quantidadeTot"];

           array_push($salarioMedio, $salario);
         }
         debug($salarioMedio);

         //Transforma em JSON e salva no arquivo.
         $funcionarios = json_encode($funcionarios);
         debug($funcionarios);

         $filename = "./arquivos/funcionarios.json";
         $file = fopen( $filename, "w" );
         
         if( $file == false ) {
            echo ( "Erro ao abrir o arquivo" );
            exit(); 
         }
         fwrite( $file, $funcionarios);
         fclose( $file );   
         
         //Transforma em JSON e salva no arquivo.
         $salarioMedio = json_encode($salarioMedio);
         debug($salarioMedio);

         $filename = "./arquivos/salariosMedio.json";
         $file = fopen( $filename, "w" );
         
         if( $file == false ) {
            echo ( "Erro ao abrir o arquivo" );
            exit();
         }
         fwrite( $file, $salarioMedio);
         fclose( $file );  
      ?>
      
   </body>
</html>