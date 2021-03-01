<?php
         
           
            @$login = $_POST['login'];
            @$haslo = $_POST['haslo'];
          
          
             
         $servername = "mysql01.adryjan.beep.pl";
          $username = "adryjan";
          $pass = "n5YFxwFCrWc0vwey";
         session_start();
          
          if(isset($_SESSION['login'])){
              header ("Location: index_log.php");
          }
         
         try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",
            $username, $pass);
              
             
            
             $login_query = "SELECT count(*) from uzytkownicy where login='".$login."'";
             $password_query = "SELECT password from uzytkownicy where login='".$login."'";
             
             
            $log = $pdo->query($login_query);
            $pass = $pdo->query($password_query);
             
            $count = $log->fetchColumn();
            $cpass = $pass->fetchColumn();
            
              if(!isset($login)){
                  echo "";
              }
             else if($count==0){
                
                 $_SESSION['error']="Nie ma takiego użytkownika";
                 
             }
             else if(password_verify($haslo,$cpass)){
                    
                 foreach($pdo->query("SELECT phone from uzytkownicy where login='".$login."'") as $wiersz){
                     $nr_tel=$wiersz['phone'];
                 }
                
             $_SESSION['nr_tel']=$nr_tel;
             $_SESSION['login']=$login;
             echo $_SESSION['login'];
             header ("Location: index_log.php");     
                
             }
             else{
                 
                 $_SESSION['error']="Podano błędne hasło";
             }
               
             
                
             
             }
         
         
             
             catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }

          
          ?>