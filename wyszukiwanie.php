<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
   
</head>
<body>
  <header>
      <div class="left">
          <a href="index.php"><img src="logo.png" alt="logo" id="logo"></a>
      </div>

      <div class="right">
            <a href="logowanie.php"><button type="button" name="button" class="but_log">Zaloguj się</button></a>
              <a href="rejestracja.php"> <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button></a>
      </div>
  </header>
    
    <div class="ustaw_kryteria">
        <form method="post">
            <input type="text" placeholder="Nazwa" id="pierwsz_kryterium" name="pierwsze_kryterium"/>
            
            <br>
            <select name="set_category" class="set_category" placeholder="Kategoria">
                <option></option>
                <option value="Samochody">Samochody</option>
                <option value="Motocykle">Motocykle</option>
                <option value="Czesci samochodowe">Części samochodowe</option>
                <option value="Komputery stacjonarne">Komputery stacjonarne</option>
                <option value="Laptopy">Laptopy</option>
                <option value="Podzespoly komputerowe">Podzespoły komputerowe</option>
                <option value="Rolnictwo">Rolnictwo</option>
                <option value="Meble">Meble</option>
                <option value="Nieruchmosci">Nieruchomości</option>
                <option value="Zwierzeta">Zwierzęta</option>
                <option value="Ubrania">Ubrania</option>
                
            </select>
            
            <input type="text" name="set_location" class="set_category" placeholder="Lokalizacja"/>
            
            <input type="number" name="first_price" class="set_category" placeholder="Cena od"/>
            
            <input type="number" name="second_price" class="set_category" placeholder="Cena do"/>
            <br>
            
            <select name="sort" class="bottom_kryt" placeholder="sortuj">
                <option value="data desc">Od najnowszych</option>
                <option value="data asc">Od najstarszych</option>
                <option value="cena asc">Cena od najniższej</option>
                <option value="cena desc">Cena od najwyższej</option>
                
                
            </select>
            
            <button type="submit" class="bottom_kryt" id="ukb">Wyszukaj</button>
        </form>
    
    </div>
    
    
    
    
    <div class="find_container">
    
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
         
            
            
    
            session_start();
            
    
        try{
          $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            if(isset($_SESSION['kryterium']) || isset($_SESSION['location'])){
               
                
                foreach($pdo->query('SELECT * FROM ogloszenia where nazwa like "%'.$_SESSION['kryterium'].'%" and lokalizacja like "%'.$_SESSION['location'].'%" ') as $wiersz){ echo
                    "<a href='this_adv_t.php?id=".$wiersz['id']."'>
                    <div class='find_container_view'>
                    <div class='image_cont'>
                    <img src='".$wiersz['zdjecie']."'>
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
                unset($_SESSION['kryterium']);
                unset($_SESSION['location']);
                
            }
            else if(isset($pierwsze_k) || isset($set_cat) || isset($set_loc) || isset($first_p) || isset($second_p)){
                
                 foreach($pdo->query('SELECT * FROM ogloszenia where nazwa like "%'.$pierwsze_k.'%" and lokalizacja like "%'.$set_loc.'%" and kategoria like "%'.$set_cat.'%" and cena BETWEEN '.$first_p.' AND '.$second_p.' ORDER BY '.$sort.'') as $wiersz){ echo
                    "<a href='this_adv_t.php?id=".$wiersz['id']."'>
                    <div class='find_container_view'>
                    <div class='image_cont'>
                    <img src='".$wiersz['zdjecie']."'>
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
        
    </div>    
    
     
    


  

  








</body>