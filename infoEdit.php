<?php

//$i = $_GET["id"];

define('BASEPATH', true);

function Info($id)
{

    try {


        $id = $_GET['id'];

        require "db.php";

        $sql = "SELECT id,name,email FROM managers where id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return json_encode($data);

    } catch (\Throwable $t) {
        echo "caught!\n";
        echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
    }
}

exit(Info(5));
