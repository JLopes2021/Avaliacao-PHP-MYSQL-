<?php
    if(!isset($produto)){

        
    include "../classes/Conexao.php";
    
    include "../classes/Desconto.php";
    include "../classes/Produto.php";

    }
    $conn= new Conexao();
    $desconto=new Desconto();
    $produt=new Produto();
    $produtos=$conn->exec("SELECT PRODUTO.IDPROD,PRODUTO.NOME,COR.DESCRICAO,PRECO.PRECO,PRECO.REGIAO FROM PRODUTO INNER JOIN COR ON PRODUTO.IDCOR=COR.IDCOR INNER JOIN PRECO ON PRODUTO.IDPROD=PRECO.IDPROD");
    foreach($produtos as $produto){
        $PorcentagemDesconto=$desconto->PorcentagemDesconto($produto['IDPROD'],$produto['DESCRICAO'],$produto['PRECO']);
        $valordesconto=$produto['PRECO']*($PorcentagemDesconto/100);

        $subtotal=$produt->currency($produto['PRECO']-$valordesconto);
        
        echo"
        <tr>
             
        <td>".$produto['IDPROD']."</td>
        <td>".$produto['NOME']."</td>
        <td>".$produto['DESCRICAO']."</td>
        <td>R$ ".$produto['PRECO']."</td>
        <td>R$ $valordesconto</td>
        <td><b>R$ $subtotal</b></td>
        <td>
            <a class='bt bt-lj' onclick='AtualizarProduto(".$produto['IDPROD'].")'>Atualizar Produto</a>
        </td>
        <td>
            <a class='bt bt-vm' onclick='Excluir(".$produto['IDPROD'].")'>Excluir</a>
        </td>
    </tr>
        ";
       
    }
?>