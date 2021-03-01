<?php 
           
            $zdj="";
            foreach($pdo->query('SELECT zdjecie FROM ogloszenia where id='.$id.' ') as $wiersz){
                    $zdj = $wiersz['zdjecie'];} 
            

             $lokalizacja ='photos/'.$zdj;
            
                 
           
            
            
            echo "<a data-fslightbox='gallery' href='".$lokalizacja."' ><img src='".$lokalizacja."' alt='not_found' class='this_adv_photo'/></a>";
            
               
                    
                
                ?>