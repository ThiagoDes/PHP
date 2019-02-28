<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body >

<?php
require 'config.php';

 if (isset($_POST['nome']) && empty($_POST['nome']) == false) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
    $pdo->query($sql);

    header("Location: index.php");
 }
?>

    <form method="POST">
        Nome:<br />
        <input type="text" name="nome" /><br/>

        Email:<br />
        <input type="text" name="email" /><br/>

        Senha:<br />
        <input type="text" name="senha" /><br/>
<br/>
        <input type="submit" value="Cadastrar" />

    </form>
</body>

</html>