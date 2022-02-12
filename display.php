<?php

define('BASEPATH', true);

function showAll()
{
    try {

        require "db.php";
     
        $stmt = $pdo->prepare("SELECT id,name,email FROM managers");

        $stmt->execute();

        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode($data);

    } catch (\Throwable $t) {
        echo "caught!\n";
        echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
    }

}

exit(showAll());
