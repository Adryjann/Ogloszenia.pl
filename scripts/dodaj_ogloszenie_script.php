<?php


              function sprawdz_bledy()
              {     
              if ($_FILES['obrazek']['error'] > 0)
              {
                echo 'problem: ';
                switch ($_FILES['obrazek']['error'])
                {
                  // jest większy niż domyślny maksymalny rozmiar,
                  // podany w pliku konfiguracyjnym
                  case 1: {echo 'Rozmiar pliku jest zbyt duży.'; break;} 

                  // jest większy niż wartość pola formularza 
                  // MAX_FILE_SIZE
                  case 2: {echo 'Rozmiar pliku jest zbyt duży.'; break;}

                  // plik nie został wysłany w całości
                  case 3: {echo 'Plik wysłany tylko częściowo.'; break;}

                  // plik nie został wysłany
                  case 4: {echo 'Nie wysłano żadnego pliku.'; break;}

                  // pozostałe błędy
                  default: {echo 'Wystąpił błąd podczas wysyłania.';
                    break;}
                }
                return false;
              }
              return true;
            }



            function sprawdz_typ()
            {
                if ($_FILES['obrazek']['type'] != 'image/jpg')
                    return false;
                return true;
            }



            function zapisz_plik($nowa_nazwa)
            {
              $lokalizacja = getcwd().'/photos/'.$nowa_nazwa.'.png';

              if(is_uploaded_file($_FILES['obrazek']['tmp_name']))
              {
                if(!move_uploaded_file($_FILES['obrazek']['tmp_name'], $lokalizacja))
                {
                  echo 'problem: Nie udało się skopiować pliku do katalogu.';
                    return false;  
                }
              }
              else
              {
                echo 'problem: Możliwy atak podczas przesyłania pliku.';
                echo 'Plik nie został zapisany.';
                return false;
              }
              return true;
            }   



    
        session_start();
        if(!isset($_SESSION['login'])){
                header("Location: index.php");
        }
    
            $login = $_SESSION['login'];
            

    
           
            
            
          $servername = "mysql01.adryjan.beep.pl";
          $username = "adryjan";
          $pass = "n5YFxwFCrWc0vwey";
    
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
    
            foreach($pdo->query("SELECT phone from uzytkownicy where login='".$login."'") as $wiersz){
                $pn=$wiersz['phone'];
            }
    
    
            @$nazwa_ogloszenia = $_POST['dodaj_nazwe_ogloszenia'];
            @$kategoria = $_POST['dodaj_kategorie'];
            @$opis = $_POST['dodaj_opis'];
            @$adres = $_POST['adres'];
            @$cena_p = $_POST['dodaj_cene'];
            @$obrazek = $_POST['obrazek'];
            @$nowa_nazwa = sha1(time());
            $max_rozmiar = 1024*1024;
            $data=date("Y-m-d");
    
          

          try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            $a_ok=false;
           
             if(isset($nazwa_ogloszenia)){
                $a_ok=true;
                
                 if(strlen($nazwa_ogloszenia)<3 || strlen($nazwa_ogloszenia)>30){
                     $a_ok=false;
                     $_SESSION['e_nazwa_ogloszenia']="Zbyt krótka nazwa ogłoszenia";
                 }
                 
                 
                 if(strlen($opis)<10 || strlen($opis)>600){
                     $a_ok=false;
                     $_SESSION['e_opis']="Zbyt krótki opis";
                 }
                 
                 
                 
                 if(strlen($adres)<6 ){
                     $a_ok=false;
                     $_SESSION['e_adres']="Nie poprawny adres";
                 }
                 
                 if(sprawdz_bledy()==true){
                         if(zapisz_plik($nowa_nazwa)==true){   
                         }
                         else{
                             $a_ok=false;
                             $_SESSION['e_obraz'] = "blad3";
                         }
                     }
                 else{
                     $a_ok=false;
                     $_SESSION['e_obraz'] = "blad1";
                 }
                 
                 
                 
                
              
                 
                 if($cena_p<=0){
                    $a_ok=false;
                    $_SESSION['e_cena'] = "Nie poprawna cena"; 
                     
                 }
                 
                 
             }
              
              $nr_t=$_SESSION['nr_tel'];
              if($a_ok==true){
                 $query = "INSERT INTO ogloszenia (data, nazwa, cena, lokalizacja, kategoria, opis, zdjecie, uzytkownik, nr_telefonu) VALUES('".$data."','".$nazwa_ogloszenia."','".$cena_p."','".$adres."','".$kategoria."','".$opis."','".$nowa_nazwa.".png','".$login."','".$nr_t."')";
                  
                 $pdo->exec($query);
             echo("Rekord zostal dodany");
                  header ('Location: index_log.php');
             
             }
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
              echo "<br>";
             
              echo "<div class='fdi'>";
             if(isset($_SESSION['e_nazwa_ogloszenia'])){
                 echo "<p class='reg_error'>".$_SESSION['e_nazwa_ogloszenia']."</p>";
                 unset($_SESSION['e_nazwa_ogloszenia']);
             }
             
             if(isset($_SESSION['e_opis'])){
                 echo "<p class='reg_error'>".$_SESSION['e_opis']."</p>";
                 unset($_SESSION['e_opis']);
             }
             
             if(isset($_SESSION['e_adres'])){
                 echo "<p class='reg_error'>".$_SESSION['e_adres']."</p>";
                 unset($_SESSION['e_adres']);
             }
             
             if(isset($_SESSION['e_cena'])){
                 echo "<p class='reg_error'>".$_SESSION['e_cena']."</p>";
                 unset($_SESSION['e_cena']);
             }
              
              if(isset($_SESSION['e_obraz'])){
                 echo "<p class='reg_error'>".$_SESSION['e_obraz']."</p>";
                 unset($_SESSION['e_obraz']);
             }
              
              echo "</div>";
            

          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }

    
    
        ?>