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
    
    <div class="this_adv_main_parent">
        <div class="this_adv_photo_house">
            <img src= <?php 
            foreach($pdo->query('SELECT zdjecie FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['zdjecie'];}  
                 ?> alt="not_found" class="this_adv_photo"/>
        </div>
        <div class="this_adv_description">
            <p class="this_adv_description_title">Opis</p>
            <br>
            <br>
            <p class="this_adv_description_text"><?php 
            foreach($pdo->query('SELECT opis FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['opis'];}  
                 ?></p>
        
        </div>
        <div class="this_adv_info">
            <p class="this_adv_description_title">Informacje</p>
            <br>
            <br>
            <p class="this_adv_info_text">Lokalizacja:  <?php 
            foreach($pdo->query('SELECT lokalizacja FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['lokalizacja'];}  
                 ?> </p>
            <p class="this_adv_info_text">Data:  <?php 
            foreach($pdo->query('SELECT data FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['data'];}  
                 ?></p>
            <p class="this_adv_info_text">Użytkownik:  <?php 
            foreach($pdo->query('SELECT uzytkownik FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['uzytkownik'];}  
                 ?></p>
        
            
        </div>
        <div class="info_text">
            <p>Najnowsze ogłoszenia z tej kategorii</p>
        
        </div>
        <article class="center_art">    
        <?php
          
            foreach($pdo->query('SELECT kategoria FROM ogloszenia where id='.$id.' ') as $wiersz){
                $kategoria = $wiersz['kategoria'];
            } 
        
            
            

         try{
            
             foreach($pdo->query('SELECT * FROM ogloszenia order by data ') as $wiersz){
                echo "<a href='this_adv_t.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><div><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>Lokalizacja: ".$wiersz['lokalizacja']."</p><p>Data dodania: ".$wiersz['data']."</div> </article></a>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
        ?>
        </article> 
            
    </div>  
    


  

  








</body>