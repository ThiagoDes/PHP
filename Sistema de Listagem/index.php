<?php
try {
    $pdo = new PDO("mysql:dbname=test;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "Erro de coneção".$e->getMessage();
    exit;
}


if(isset($_GET['ordem']) && empty($_GET['ordem']) == false) {
	$ordem = addslashes($_GET['ordem']);
	$sql = "SELECT * FROM medico ORDER BY ".$ordem;
} else {
	$ordem = '';
	$sql = "SELECT * FROM medico";
}

?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="center-h2">
        <h2>Tabela de Médicos</h2>
    </div>

    <div class="pesquisa">
        <form method="GET">

            <select name="ordem" onchange="this.form.submit()">
                <option></option>
                <option value="nome" <?php echo ($ordem=="nome")?'selected="selected"':''; ?>>pelo nome</option>
                <option value="cnr" <?php echo ($ordem=="cnr")?'selected="selected"':''; ?>>pelo cnr</option>
            </select>

        </form>
    </div>

    <div class="center-form">
        <table class="w3-table-all" border=" 1">
            <tr class="thicker">
                <td>Nome</td>
                <td>Área</td>
                <td>CNR</td>
                <td>Endereço</td>
                <td>Telefone</td>
            </tr>

            <?php
              
              $sql = $pdo->query($sql);

              if ($sql->rowCount() > 0) {
                  
                foreach ($sql->fetchAll() as $medico):
                    ?>
            <tr>
                <td><?php echo $medico['nome']; ?></td>
                <td><?php echo $medico['area']; ?></td>
                <td><?php echo $medico['cnr']; ?></td>
                <td><?php echo $medico['endereco']; ?></td>
                <td><?php echo $medico['telefone']; ?></td>
            </tr>
            <?php
                endforeach;
              }
              
            ?>

        </table>
    </div>
</body>

</html>