<?php
            session_start();
            if(isset($_SESSION['login'])){
                header("Location: index_log.php");
            }
          $servername = "localhost";
          $username = "root";
          $pass = "";

          try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            foreach($pdo->query('SELECT * FROM ogloszenia order by data desc LIMIT 5 ') as $wiersz){
                $zdj = $wiersz['zdjecie'];  
                $lokalizacja ='photos/'.$zdj;
                echo "<a href='this_adv_t.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$lokalizacja."'><div><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>Lokalizacja: ".$wiersz['lokalizacja']."</p><p>Data dodania: ".$wiersz['data']."</div> </article></a>";
                
                echo"<br>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }



       ?>