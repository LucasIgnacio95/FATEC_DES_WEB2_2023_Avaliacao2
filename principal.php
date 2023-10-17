<?php
    


    require_once('header.php');
    require_once('dados_banco.php');    
    
    try {
        $dsn = "mysql:host=$servername;dbname=$dbname";
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM veiculos";
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    $stmt = $conn->query($sql);
    $conn = NULL;
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


        <a href="registros.php" class="btn btn-primary">Verificar Veículos</a>
        <br><br>
        <a href="cadastro.php" class="btn btn-primary">Cadastro Veículos</a>
        <br><br>

        <a href="logout.php" class="btn btn-danger">Sair da conta</a>
    </p>
</body>
</html>