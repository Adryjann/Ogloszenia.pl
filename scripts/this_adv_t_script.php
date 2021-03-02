<?php
    
            
    
          $servername = "localhost";
          $username = "root";
          $pass = "";
          $id = $_GET['id'];
    
            session_start();
    
            if(!isset($id)){
                  header("Location: index.php");
            }
            if(isset($_SESSION['login'])){
                header("Location: this_adv_t_log.php?id=$id");
            }
    
        try{
          $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);

        }

        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
    
    


    ?>