<?php
if (!empty($_POST['action'])) {
    # code...
    if($_POST['action']=='cadastrar'){
        // var_dump($_POST);
         $p= new Dados();
         $p->salvar();
     
     }
}
 
class Dados
{
    public $C_V;
    public $mercadoria;
    public $vencimento;
    public $preco_ajuste;
    public $tipo_negocio;
    public $vlr_de_operacao_ajuste;
    public $D_C;
    public $taxa_operacional;
    public $quantidade;

    public function salvar()
    {
        include "conexao.php";

        $this->C_V = $_POST['C_V'];
        $this->mercadoria = $_POST['mercadoria'];
        $this->vencimento = $_POST['vencimento'];
        $this->preco_ajuste = $_POST['preco_ajuste'];
        $this->tipo_negocio = $_POST['tipo_negocio'];
        $this->vlr_de_operacao_ajuste = $_POST['vlr_operacao'];
        $this->D_C = $_POST['D_C'];
        $this->taxa_operacional = $_POST['taxa_operacional'];
        $this->quantidade = $_POST['quantidade'];

        $sql = sprintf(
            "insert into operacoes(
                    C_V,
                    mercadoria,
                    vencimento,
                    preco_ajuste,
                    tipo_negocio,
                    vlr_de_operacao_ajuste,
                    D_C,
                    taxa_operacional,
                    quantidade) values('%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            $this->C_V,
            $this->mercadoria,
            $this->vencimento,
            $this->preco_ajuste,
            $this->tipo_negocio,
            $this->vlr_de_operacao_ajuste,
            $this->D_C,
            $this->taxa_operacional,
            $this->quantidade
        );

        if (mysqli_query($conexao, $sql)) {
            echo "<script>
                        alert('Salvo com sucesso');
                        window.location='index.php';
                        </script>";
        } else {
            mysqli_error($conexao);
        }
    }
    public function listar()
    {
        include 'conexao.php';

        $sql = sprintf("select * from operacoes");
        $result = mysqli_query($conexao, $sql);
        $dado = [];
        $i = 0;

        
        while ($linha = mysqli_fetch_array($result)) {
            $dado[$i]['id'] = $linha['id'];
            $dado[$i]['C_V'] = $linha['C_V'];
            $dado[$i]['mercadoria'] = $linha['mercadoria'];
            $dado[$i]['vencimento'] = $linha['vencimento'];
            $dado[$i]['preco_ajuste'] = $linha['preco_ajuste']; 

            $dado[$i]['tipo_negocio'] = $linha['tipo_negocio'];
            $dado[$i]['vlr_de_operacao_ajuste'] = $linha['vlr_de_operacao_ajuste'];
            $dado[$i]['D_C'] = $linha['D_C'];
            $dado[$i]['taxa_operacional'] = $linha['taxa_operacional'];
            $dado[$i]['quantidade'] = $linha['quantidade'];
            $i++;
        }
        return $dado;
        mysqli_free_result($result);
        mysqli_close($con);
    }
}
