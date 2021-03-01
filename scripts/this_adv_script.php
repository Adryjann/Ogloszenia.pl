<?php
          $servername = "mysql01.adryjan.beep.pl";
          $username = "adryjan";
          $pass = "n5YFxwFCrWc0vwey";
    
          $id = $_GET['id'];

         try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            foreach($pdo->query('SELECT * FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo "<a href='this_adv.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>".$wiersz['lokalizacja']."</p> </article></a>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
    ?>