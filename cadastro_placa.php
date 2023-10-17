<?php
   

     require_once('header.php');
     require_once('dados_banco.php');
  

    if (!isset($_SESSION['online']) || !$_SESSION['online']) {
        header('Location: index.php');
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: cadastro.php');
        exit;
    }

    if (!isset($_POST['aluno']) || !isset($_POST['placa'])) {
        echo "Preencha todos os campos do formulário.";
        exit;
    }

    $aluno = $_POST['aluno'];
    $placa = $_POST['placa'];

    if(strlen($aluno) > 10 ){
        header("location: cadastro.php");
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO veiculos (aluno, placa)
        VALUES ('$aluno', '$placa')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
    ?>
?>
 
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Portaria Fatec</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>
            <?php echo $_SESSION["username"]; ?>
            <br>
        </h1>
    </div>
    <p>
    Aluno: <b>
        <?php echo $aluno; ?>
    </b>cadastrado com sucesso.
    <br><br>
        <a href="principal.php" class="btn btn-primary">Voltar</a>
    <br><br>
    </p>
</body>
</html>