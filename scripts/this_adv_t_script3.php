<?php
          
            foreach($pdo->query('SELECT kategoria FROM ogloszenia where id='.$id.' ') as $wiersz){
                $kategoria = $wiersz['kategoria'];
            } 
        
            
            

         try{
            
             foreach($pdo->query('SELECT * FROM ogloszenia where kategoria="'.$kategoria.'" order by data LIMIT 5 ') as $wiersz){
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