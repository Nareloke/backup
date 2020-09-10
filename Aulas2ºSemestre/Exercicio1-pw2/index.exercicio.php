<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicios</title>
</head>
<body>

    <?php 
    function printArrayAsLi ($param) {
        echo "<ul>";                                // Abre uma lista não-ordenada
        foreach ($param as $key => $value) {        // Percorre o vetor key=>value 
            if ( gettype($value) == "array" ) {     // Caso o value seja um outro array do tipo key=>value
                echo "<li>".$key."</li>";           // Abre um "list item" com o nome da chave do key=>array
                printArrayAsLi($value);             // Cai no else abaixo
            } else
                echo "<li>".$key.":".$value."</li>"; // Imprime os "list Item" do array atual, no formato "chave:valor"
        }
        echo "</ul>";                               // Fecha a lista não-ordenada
    }

    function debug ($param){
        echo "<pre>";
        print_r($param);
        echo "</pre>";
        echo "<hr>";
    }


    echo "<h1>".'Olá, Mundo!'."</h1>"."<br>"; 
    $array1 = array("Chave1"=>'valor1', "Chave2"=>"Valor2");
    printArrayAsLi($array1);
    debug($array1);


    $array2 = array(0=>1, 1=>2, 2=>3, 3=>4);
    printArrayAsLi($array2);
    debug($array2);

    $array3 = array(0=>array("nome"=>"Rodrigo Ramos", "turma"=>"651", "prontuário"=>"1201506"), 1=>array("Nome"=>"Henrique", "Turma"=>"638", "Prontuário"=>"0800001"));
    for ($tam=0; $tam<count($array3); $tam++) {
        printArrayAsLi ($array3[$tam]);
    }
    debug($array3);
    
    $array4 = array(0=>array("Nome"=>"Rodrigo Ramos", "Turma"=>651, "Prontuário"=>"1201506", "Matérias"=>array("LP1"=>10, "EPO"=>10, "OPE"=>6)), 1=>
    array("Nome"=>"Henrique", "Turma"=>"638", "Prontuário"=>"0800001", "Matérias"=>array("LP1"=>"2", "EPO"=>"0", "OPE"=>"8")));
    for ($tam=0; $tam<count($array3); $tam++) {
        printArrayAsLi ($array4[$tam]);
    }
    debug($array4);
    ?> 

</body>
</html>