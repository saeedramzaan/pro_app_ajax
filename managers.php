<?php

define('BASEPATH', true);

class Employee
{
    
    public function __construct()
    {
       

    }
    // Insert customer data into customer table
    public function insertData($post)
    {

        require 'db.php';

        try {
            
            $user = $_POST['name'];
            $email = $_POST['description'];
            $int = "98";

            $stmt = $pdo->prepare("INSERT INTO managers (name, email,tel_no) VALUES (?,?,?)");

            if ($stmt->execute([$user, $email,$int])) {
                echo '<script>alert("New account created.")</script>';
            } else {
                echo '<script>alert("An error occurred")</script>';
            }

        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("' . $error . '");</script>';
        }

    }

    public function updateRecord($postData)
    {
        require 'db.php';

        try {

            $id = $_GET['id'];

            $user = $_POST['name'];
            $email = $_POST['description'];

            $stmt = $pdo->prepare("UPDATE managers SET name=?, email=? WHERE id=?");

            if ($stmt->execute([$user, $email, $id])) {
                echo '<script>alert("Data Updated.")</script>';

            } else {
                echo '<script>alert("An error occurred")</script>';
            }

        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
            echo '<script type="text/javascript">alert("' . $error . '");</script>';
        }

    }
   
    public function deleteRecord()
    {
        $id = $_GET['id'];
        try {
            
            require "db.php";

            $sql_stmt = $pdo->prepare("DELETE FROM managers WHERE id = ?");

            if ($sql_stmt->execute([$id])) {
                echo $id . ' was deleted successfully.';
            }

        } catch (\Throwable $t) {
            echo "caught!\n";
            echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
        }
    }
}
