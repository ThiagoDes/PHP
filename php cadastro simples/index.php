<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagína de Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <?php 
    
require 'config.php';

?>
    <a href="adicionar.php">Adicionar Novo Usuário</a>
    <table border="0" width="100%">
        <tr>

            <th>Nome:</th>
            <th>Email:</th>
            <th>Ações:</th>

        </tr>

        <?php 

        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
        if ($sql->rowCount() > 0) {
          foreach ($sql->fetchAll() as $usuario) {
            echo  '<tr>';
                echo '<td>'.$usuario['nome'].'</td>';
                echo '<td>'.$usuario['email'].'</td>';
                echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> 
                - <a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
            echo  '</tr>';
          }
        }
         ?>

    </table>
</body>

</html>