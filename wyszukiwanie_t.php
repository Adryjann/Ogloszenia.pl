<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="fav.png"/>
    <title>Wyszukiwanie</title>
   
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
        include 'scripts/wyszukiwanie_t_script.php';
    ?>
    
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
        include 'scripts/wyszukiwanie_t_script2.php';
    
    


    ?>
        
    </div>    
    
     
    


  

  








</body>