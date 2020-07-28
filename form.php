<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php';?>
    <div class="container">
        <form action="dados.php" method="post">
            <div class="form-row">

                <div class="form-group col-md-1">
                    <label>C/V</label>
                    <select class="custom-select" id="inputGroupSelect01" name="C_V">
                        <option selected>Escolher...</option>
                        <option value="C">C</option>
                        <option value="V">V</option>
                       
                    </select>
                 <!--   <input class="form-control" type="text" name="C_V"> -->
                </div>

                <div class="form-group col-md-4">
                    <label>Mercadoria</label>
                    <input class="form-control" type="text" name="mercadoria">
                </div>

                <div class="form-group col-md-3">
                    <label>vencimento</label>
                    <input class="form-control" type="text" name="vencimento">
                </div>

                <div class="form-group col-md-3">
                    <label>preco_ajuste</label>
                    <input class="form-control" type="text" name="preco_ajuste">
                </div>

                <div class="form-group col-md-1">
                    <label>tipo_negocio</label>
                    <input class="form-control" type="text" name="tipo_negocio">
                </div>

                <div class="form-group col-md-3">
                    <label>vlr_operacao</label>
                    <input class="form-control" type="text" name="vlr_operacao">
                </div>

                <div class="form-group col-md-1">
                    <label>D_C</label>
                    <select class="custom-select" id="inputGroupSelect01" name="D_C">
                        <option selected>Escolher...</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                       
                    </select>
                </div>

                <div class="form-group col-md-1">
                    <label>quantidade</label>
                    <input class="form-control" type="number" id="qtd" onclick="js:calctaxa()" name="quantidade">
                </div>

                <div class="form-group col-md-4">
                    <label>taxa_operacional</label>
                    <input class="form-control" type="text" id="taxa" name="taxa_operacional">
                </div>
            </div>

            <input type="submit" class="btn btn-light" name="action" value="cadastrar">
        </form>
    </div>
</body>
    <script type="text/javascript">
        function calctaxa() {
            var i = 0;
            i=i+document.getElementById('qtd').value;
            document.getElementById('taxa').value =(i*0.11).toLocaleString('pt-BR');
        }
        
    </script>

</html>