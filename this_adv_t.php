<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
    
    
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="fav.png"/>
    <title>kupuj.pl</title>
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
    
       include 'scripts/this_adv_t_script.php';

    ?>
    
    <div class="this_adv_main_parent">
        <div class="this_adv_photo_house">
             
            
            <?php 
           
            include 'scripts/this_adv_t_script2.php';
                
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
           include 'scripts/this_adv_t_script3.php';
          
        ?>
        </article> 
        
      
            
    </div>  
    


    <script src="lb/fslightbox.js"></script>

  





   


</body>