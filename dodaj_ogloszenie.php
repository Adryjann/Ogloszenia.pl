<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="fav.png"/>
    <title>Dodaj ogłoszenie</title>
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
        <form method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
        <input type="file" name="obrazek" class="kontrolka_dodawania"/>
        
        
       
   
            <p><span class="form_dodawania_info_naglowek">Dane kontaktowe</span></p>
      
            <br>
        <input type="text" name="adres" placeholder="Adres"
               class="kontrolka_dodawania"/>
            <br>
        <button type="submit">Dodaj ogłoszenie wariacie</button>
         </form>    
    </div>
    
        
       
    
        <?php
    
        include 'scripts/dodaj_ogloszenie_script.php';
    
    
        ?>

  

  








</body>