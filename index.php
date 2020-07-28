<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    include 'dados.php';
    include 'header.php';
    $o = new Dados();
    $operacao = $o->listar();
 
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mercadoria', 'Quantidade', 'C','V'],
          <?php foreach ($operacao as $key => $op) :?>
          ['<?=$op['mercadoria']?>','<?=$op['quantidade']?>',<?=($op['C_V']=='C'?str_replace(',','.',$op['preco_ajuste']):0)?>,<?=($op['C_V']=='V'?str_replace(',','.',$op['preco_ajuste']):0)?>],
          <?php endforeach;?>
        ]);

        var options = {
          chart: {
            title: 'C/V',
           
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
 
   
    <div class="container">

        
        <table class="table">
            <thead>
            <tr>
                <th scope="col">C/V</th>
                <th scope="col">Mercadoria</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Quantidae</th>
                <th scope="col">Preço/ajuste</th>
                <th scope="col">Vlr de operação/ajuste</th>
                <th scope="col">D/C</th>
                <th scope="col">Taxa Operacional</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($operacao as $key => $op) :?>
                    <tr>
                    <td class="col"><?=$op['C_V']?></td>
                    <td class="col"><?=$op['mercadoria']?></td>
                    <td class="col"><?=$op['vencimento']?></td>
                    <td class="col"><?=$op['quantidade']?></td>
                    <td class="col"><?=$op['preco_ajuste']?></td>
                    <td class="col"><?=$op['vlr_de_operacao_ajuste']?></td>
                    <td class="col"><?=$op['D_C']?></td>
                    <td class="col"><?=$op['taxa_operacional']?></td>
                    
                    </tr>
                    
                <?php endforeach; 
                ?> 
            </tbody>
        </table>
        <center>
            <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
        </center>
       

    </div>
    
</body>

</html>