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
    
    <?php
    
            
    
          $servername = "localhost";
          $username = "root";
          $pass = "";
          $id = $_GET['id'];
    
            session_start();
            if(!isset($id)){
                  header("Location: index.php");
            }
            if(!isset($_SESSION['login'])){
                header("Location: this_adv_t.php?id=$id");
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
            
             
            <?php 
           
            $zdj="";
            foreach($pdo->query('SELECT zdjecie FROM ogloszenia where id='.$id.' ') as $wiersz){
                    $zdj = $wiersz['zdjecie'];}  
            
                  
           
            
            
            echo "<a data-fslightbox='gallery' href='".$zdj."' ><img src='".$zdj."' alt='not_found' class='this_adv_photo'/></a>";
            
               
                    
                
                ?>
            
            
           
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
            <p class="this_adv_info_text">Numer telefonu:  <?php 
            foreach($pdo->query('SELECT nr_telefonu FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo $wiersz['nr_telefonu'];}  
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
            
             foreach($pdo->query('SELECT * FROM ogloszenia where kategoria="'.$kategoria.'" and id<>"'.$id.'" order by data LIMIT 5') as $wiersz){
                echo "<a href='this_adv_t.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><div><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>Lokalizacja: ".$wiersz['lokalizacja']."</p><p>Data dodania: ".$wiersz['data']."</div> </article></a>";
                 
                 echo"<br>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
        ?>
        </article> 
            
    </div>  
    


  
 <script src="lb/fslightbox.js"></script>
  








</body>