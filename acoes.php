
function AtualizarProduto(id) {
    $.post('acoes.php?ModelAtualizar='+id, {id:id}, function (retorno) {
        if (retorno != null) {

            document.getElementById("ConteudoModel").innerHTML = retorno;
            document.getElementById("abrirmodal").click();

        } else {

            alert("Resultado nulo");

        }

    
    });
}
function Excluir(id) {
    $.post('acoes.php?Excluir='+id, {id:id}, function (retorno) {
        if (retorno != null) {

            alert("Excluido");
            document.location.reload(true);
        } else {

            alert("Resultado nulo");

        }

    
    });
    }
function MostrarCriarProduto() {


    $.post('acoes.php?ModelCriarProduto', { }, function (retorno) {
        if (retorno != null) {

            document.getElementById("ConteudoModel").innerHTML = retorno;
            document.getElementById("abrirmodal").click();

        } else {

            alert("Resultado nulo");

        }

    
    });
        }



        $(document).ready(function(){
            
            $.post('acoes.php?gettabela', { }, function (retorno) {
            document.getElementById("table").innerHTML = retorno;
            });
        });