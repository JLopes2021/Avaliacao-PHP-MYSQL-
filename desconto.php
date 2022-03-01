<?php

class Desconto{

    public $conn;
	
	function __construct() {
	
		$this->conn=new Conexao();

	}
    
    
    function PorcentagemDesconto($idprod,$cor,$valor){

        $IdPoliticas=$this->conn->exec("SELECT DISTINCT IDPOLITICA FROM POLITICA_DESCONTO");
       
        $descontos=array(0);

        foreach($IdPoliticas as $IdPolitica){

            $politicas=$this->conn->exec("SELECT * FROM POLITICA_DESCONTO WHERE IDPOLITICA=".$IdPolitica['IDPOLITICA']);
            $sequencial=false;
            $validacao=array();
            $i=0;
            foreach($politicas as $politica){
               
                 if($politica['TIPO']=="COR"){
                    switch($politica['OPERADOR']){
                        case"=":
                            if($politica['REFERENCIA']==$cor){
                                /*politica de cor é atendida*/
                                if($politica['sequencial']==null){
                                    
                                    array_push($descontos,$politica['DESCONTO']);

                                }else{

                                    $validacao[0][$i]=true;
                                    $validacao[1][$i]=$politica['OperadorSequencial'];
                                    

                                }     
                            }else{
                                if($politica['sequencial']!=null){
                                    $validacao[0][$i]=false;
                                    $validacao[1][$i]=$politica['OperadorSequencial'];
                                }
                            }
                            break;

                    }
                }
                if($politica['TIPO']=="VALOR"){
                    switch($politica['OPERADOR']){
                        case ">":
                            if($valor>$politica['REFERENCIA']){

                                if($politica['sequencial']==null){
                                    
                                    array_push($descontos,$politica['DESCONTO']);

                                }else{

                                    $validacao[0][$i]=true;
                                    $validacao[1][$i]=$politica['OperadorSequencial'];
                                    

                                }  
                            }else{

                                if($politica['sequencial']!=null){

                                    $validacao[0][$i]=false;
                                    $validacao[1][$i]=$politica['OperadorSequencial'];
                                }

                            }
                            break;

                    }
                }
                $i++;
            }

            
            if($politica['OperadorSequencial']=="F"){
                
                
                for ($i = 0; $i <= count($validacao)-1; $i++) {
                    if(isset($anterior)){
                        switch($operadoratual){
                             case "E":
                              if($valoranterior==$validacao[0][$i]){
                                  $valoranterior=true;
                              }else {
                                  $valoranterior=false;
                              }  
                             break;

                        }
                    }else{
                        $operadoratual=$validacao[1][$i];
                        $valoranterior=$validacao[0][$i];
                    }   


                }
              
              if($valoranterior){

                
                array_push($descontos,$politica['DESCONTO']);

              }
                

            }
        
        }

        return max($descontos);
    }


	


}