<?php
                if(isset($_SESSION['error'])){
                    echo "<p class='reg_error'>".$_SESSION['error']."</p>";
                     unset($_SESSION['error']);
                }
               
                
              
  ?>