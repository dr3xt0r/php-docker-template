<?php
try {
    $name = '';

    // env.POSTGRES_SERVER = Docker container name
    $host = 'database';
    // env.POSTGRES_USER 
    $user = 'admin';
    // env.POSTGRES_PASSWORD
    $password = 'longestpassword';
    // Test db inited in - ~/database/init/init.sql
    $db = 'master';
    //
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;";

    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    if ($pdo) {
        $sth = $pdo->prepare("SELECT name FROM Urak");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        $name = $result->name;
    }
} catch (PDOException $e) {
    die($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
    }

    body {
        min-width: 100vw;
        min-height: 100vh;
    }

    .center {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

    }

    h2 {
        letter-spacing: 5px;
    }
</style>

<body>
    <div class="center">
        <h2> Szia <?= $name ?>!</h2>
        <a href="/info">php_info()</a>
    </div>
</body>

</html>