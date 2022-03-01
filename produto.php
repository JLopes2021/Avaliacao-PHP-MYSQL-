<?php
class Produto{
	public $conn;
	
	function __construct() {
	
		$this->conn=new Conexao();
		
	}
	function CalcularPreco($regiao,$produto){
	
	}
	function GetAllProdutos(){
	
		$result = mysqli_query($conn, "SELECT * FROM PRODUTO") or die ( mysqli_error( $conn ) );
	
	}
	function atualizar($dados){

		if($dados['nome']!=""){

			$this->conn->exec('UPDATE PRODUTO SET NOME="'.$dados['nome'].'" WHERE IDPROD='.$dados['id']);

		}
		if($dados['custo']!=""){

			$this->conn->exec('UPDATE PRODUTO SET CUSTO='.$dados['custo'].' WHERE IDPROD='.$dados['id']);

		}

	}
	function cadastrar($dados){
	$conn=new Conexao;
	$nome=$_POST['nome'];
	$id=$_POST['id'];
	$custo=$_POST['custo'];
	/*construir query assim nao e seguro ajustar posteriormente*/
	$sql="INSERT INTO `produto`(`NOME`, `IDCOR`, `CUSTO`) VALUES ('$nome',$id,$custo)";
	$conn->exec($sql);
		
	}
	function currency(float $val){
       return number_format($val, 2, ',', '.');
    }

}