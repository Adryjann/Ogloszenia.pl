 <?php
        
            @$pierwsze_k=$_POST['pierwsze_kryterium'];
            @$set_cat = $_POST['set_category'];
            @$set_loc = $_POST['set_location'];
            @$first_p = $_POST['first_price'];
            @$second_p = $_POST['second_price'];
            @$sort = $_POST['sort'];
            if($first_p==null){
                $first_p=0;
            }
            if($second_p==null){
                $second_p=999999999999;
            }
            if($sort==null){
                $sort="data desc";
            }
        
            
    
            
    
          $servername = "localhost";
          $username = "root";
          $pass = "";
         
            
            
    
            
            
    
        try{
          $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            if(isset($_SESSION['kryterium']) || isset($_SESSION['location'])){
               
                
                foreach($pdo->query('SELECT * FROM ogloszenia where nazwa like "%'.$_SESSION['kryterium'].'%" and lokalizacja like "%'.$_SESSION['location'].'%" ') as $wiersz){
                    $zdj = $wiersz['zdjecie'];  
                    $lokalizacja ='photos/'.$zdj;
                    echo
                    "<a href='this_adv_t.php?id=".$wiersz['id']."'>
                    <div class='find_container_view'>
                    <div class='image_cont'>
                    
                    <img src='".$lokalizacja."'>
                    </div>
                    <div class='fcv_left'>
                    <span class='pierwszy_wiersz'><p>".$wiersz['nazwa']."</p></span>
                    <p> Data dodania: ".$wiersz['data']."</p>
                    <p>Lokalizacja: ".$wiersz['lokalizacja']."</p>
                    </div>
                    <div class='cena'>
                    <p>Cena: ".$wiersz['cena']."
                    </div>
                    </div>
                    </a>";
                    echo "<br>";
                }
                unset($_SESSION['kryterium']);
                unset($_SESSION['location']);
                
            }
            else if(isset($pierwsze_k) || isset($set_cat) || isset($set_loc) || isset($first_p) || isset($second_p)){
                
                 foreach($pdo->query('SELECT * FROM ogloszenia where nazwa like "%'.$pierwsze_k.'%" and lokalizacja like "%'.$set_loc.'%" and kategoria like "%'.$set_cat.'%" and cena BETWEEN '.$first_p.' AND '.$second_p.' ORDER BY '.$sort.'') as $wiersz){ 
                     $zdj = $wiersz['zdjecie'];  
                    $lokalizacja ='photos/'.$zdj;
                     echo
                    "<a href='this_adv_t.php?id=".$wiersz['id']."'>
                    <div class='find_container_view'>
                    <div class='image_cont'>
                    <img src='".$lokalizacja."'>
                    </div>
                    <div class='fcv_left'>
                    <span class='pierwszy_wiersz'><p>".$wiersz['nazwa']."</p></span>
                    <p> Data dodania: ".$wiersz['data']."</p>
                    <p>Lokalizacja: ".$wiersz['lokalizacja']."</p>
                    </div>
                    <div class='cena'>
                    <p>Cena: ".$wiersz['cena']."
                    </div>
                    </div>
                    </a>";
                }
                
            }

        }

        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
    
    


    ?>