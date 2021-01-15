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
          <a href="dodaj_ogloszenie.php"> <button type="button" name="button" class="but_log">Dodaj ogłoszenie</button></a>
          <a href="logout.php"> <button type="button" name="button" class="but_log" id="but_reg">Wyloguj się</button></a>
      </div>
  </header>
    
        
    <div class="form_dodawania_info">
        <form method="post">
            <br>
            <p><span class="form_dodawania_info_naglowek">Informacje</span></p>
            <br>
            
        
        <input type="text" name="dodaj_nazwe_ogloszenia" placeholder="Nazwa ogłoszenia" class="kontrolka_dodawania"/>
        <br>
            
        
        <select name="dodaj_kategorie" class="kontrolka_dodawania" placeholder="Kategoria">
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
                <option value="AGD">AGD</option>
                
        </select>
        
        <br>
        
        <input type="textarea" name="dodaj_opis" class="kontrolka_dodawania_opis" placeholder="Opis..."/>
            
            <input type="number" name="dodaj_cene" placeholder="Cena" class="kontrolka_dodawania"/>
        
    
    
    
            
            <br>
            <p><span class="form_dodawania_info_naglowek">Dodaj zdjęcie przedmiotu</span></p>
        <input type="text" name="dodaj_obrazek" class="kontrolka_dodawania"/>
        
        
       
   
            <p><span class="form_dodawania_info_naglowek">Dane kontaktowe</span></p>
      
            <br>
        <input type="text" name="adres" placeholder="Adres"
               class="kontrolka_dodawania"/>
            <br>
        <button type="submit">Dodaj ogłoszenie wariacie</button>
         </form>    
    </div>
       
    
        <?php
    
        session_start();
        if(!isset($_SESSION['login'])){
                header("Location: index.php");
        }
    
            $login = $_SESSION['login'];
            

    
           
            
            
          $servername = "localhost";
          $username = "root";
          $pass = "";
    
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
    
            foreach($pdo->query("SELECT phone from uzytkownicy where login='".$login."'") as $wiersz){
                $pn=$wiersz['phone'];
            }
    
    
            @$nazwa_ogloszenia = $_POST['dodaj_nazwe_ogloszenia'];
            @$kategoria = $_POST['dodaj_kategorie'];
            @$opis = $_POST['dodaj_opis'];
            @$adres = $_POST['adres'];
            @$cena_p = $_POST['dodaj_cene'];
            @$dodaj_obrazek = $_POST['dodaj_obrazek'];
            
    
          

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
                 
                 if(strlen($dodaj_obrazek)<6 ){
                     $a_ok=false;
                     $_SESSION['e_obraz']="Nie poprawny link";
                 }
                 
              
                 
                 if($cena_p<=0){
                    $a_ok=false;
                    $_SESSION['e_cena'] = "Nie poprawna cena"; 
                     
                 }
                 
                 
             }
              
              $nr_t=$_SESSION['nr_tel'];
              if($a_ok==true){
                 $query = "INSERT INTO ogloszenia (nazwa, cena, lokalizacja, kategoria, opis, zdjecie, uzytkownik, nr_telefonu) VALUES('".$nazwa_ogloszenia."','".$cena_p."','".$adres."','".$kategoria."','".$opis."','".$dodaj_obrazek."','".$login."','".$nr_t."')";
                  
                 $pdo->exec($query);
             echo("Rekord zostal dodany");
             
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

  

  








</body>