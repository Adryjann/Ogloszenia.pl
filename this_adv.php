<!DOCTYPE HTML>
<html>
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
            <button type="button" name="button" class="but_log">Zaloguj się</button>
              <button type="button" name="button" class="but_log" id="but_reg">Zarejestruj się</button>
      </div>
  </header>
    
    
    
    <?php
          $servername = "localhost";
          $username = "root";
          $pass = "";
    
          $id = $_GET['id'];

         try{
            $pdo = new PDO("mysql:host=$servername;dbname=baza_ogloszenia",$username, $pass);
            foreach($pdo->query('SELECT * FROM ogloszenia where id='.$id.' ') as $wiersz){
                echo "<a href='this_adv.php?id=".$wiersz['id']."'><article class='adv_view'> <img src='".$wiersz['zdjecie']."'><p>".$wiersz['nazwa']."</p><p> Cena: ".$wiersz['cena']."</p><p>".$wiersz['lokalizacja']."</p> </article></a>";
            }


          }

          catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
          }
    ?>
    
    
    
</body>

</html>