<?php

include("../classes/Conexao.php");
//PRECIFICA OS PRODUTOS
$conn=new Conexao;
$conn->exec("DELETE FROM PRECO");
$produtos=$conn->exec("SELECT IDPROD,CUSTO FROM PRODUTO");

foreach($produtos as $produto){

    $regioes=$conn->exec("SELECT * FROM REGIAO");
    foreach($regioes as $regiao){
        
        $idregiao=$regiao['idregiao'];

        //aumenta a margem de venda ao custo do produto
        $preco=floatval($produto['CUSTO'])*((floatval($regiao['margem'])/100)+1);

        $idprod=$produto['IDPROD'];

        $conn->exec("INSERT INTO PRECO(REGIAO,PRECO,IDPROD) VALUES ($idregiao,$preco,$idprod)");

    }


}

?>