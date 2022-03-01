<center>
<div class="container">
  <form action="acoes.php?atualizar" method="POST">
      <input type="text" name="id" value="<?php echo $_POST['id']; ?>" style='display:none'>
        <p>Nome:</p>
        <input type="text" id="nome" name="nome" placeholder="Insira o nome do produto.">
        <br>
        <p>Custo:</p>
        <input type="number" step=".01" step="any" id="nome" name="custo" placeholder="Insira o custo do produto.">
        
       
           
              
     </select> 
        <br>
        <button type="submit" name="myButton" value="foo">Enviar</button>
  </form>
</div>

</center>