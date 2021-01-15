<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
  <header>
      <div class="left">
          <a href="index.php"><img src="logo.png" alt="logo" id="logo"></a>
      </div>

      <div class="right">
            <button type="button" name="button" class="but_log">Zaloguj się</button>
              <a href="rejestracja.php"> <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button></a>
      </div>
  </header>
    
    <div id="register_section">
      
      <article class="main_register">
        <img src="logo.png" alt="logo" id="register_logo"/>
      
          <form method="post">
              
              <input type="text" name="phone" placeholder="Wprowadź nowy numer telefonu" class="register_form"/>
              
            <input type="submit" value="Zmień numer" class="but_log" id="but_reg">
              
          </form>  
          
          
         
      </article>
        
        <div class="find_container">
         <?php
        
            
    
          $servername = "localhost";
          $username = "root";
          $pass = "";
         
            
           
    
            session_start();
          
           $login = $_SESSION['login'];
            
    
        try{
          $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
           
               
                
                foreach($pdo->query('SELECT * FROM ogloszenia where uzytkownik = "'.$login.'" ') as $wiersz){ echo
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
                    echo "<br>";
                }
                unset($_SESSION['kryterium']);
                unset($_SESSION['location']);
                
            
            

        }

        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
    
    


    ?>
        </div>
   

    

   


  </div>


  <footer>


  </footer>








</body>