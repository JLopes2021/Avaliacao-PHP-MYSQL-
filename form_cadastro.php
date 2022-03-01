<?php
$conn= new Conexao();
?>
<center>
<div class="container">
  <form action="acoes.php?cadastrar" method="POST">
        
        <p>Nome:</p>
        <input type="text" id="nome" name="nome" placeholder="Insira o nome do produto.">
        <br>
        <p>Custo:</p>
        <input type="number" step=".01" step="any" id="nome" name="custo" placeholder="Insira o custo do produto.">
        <br>
        <p>Cor:</p>
       <select name="id" id="cor" >
       <?php

       
       $result=$conn->exec("SELECT * FROM COR");
       
       foreach($result as $linha){
      
       echo "<option value='".$linha['IDCOR']."'>".$linha['DESCRICAO']."</option>";
       }
             
       ?>
              
     </select> 
        <br>
        <button type="submit" name="myButton" value="foo">Enviar</button>
  </form>
</div>

</center>