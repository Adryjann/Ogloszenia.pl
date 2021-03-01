<?php
      
        @$kryterium = $_POST['find'];
        @$location = $_POST['location'];
        
        $_SESSION['kryterium']=$kryterium;
        $_SESSION['location']=$location;
      
        if(isset($kryterium) || isset($location)){
            header ("Location: wyszukiwanie_t.php");
        }
        
      ?>