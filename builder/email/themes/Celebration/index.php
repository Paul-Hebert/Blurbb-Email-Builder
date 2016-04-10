<?php
  start_email();  

    start_row('style1');      
      start_column('style1'); 
        append_block('header', 1, 'A Holiday Celebration');        
      end_column();
    end_row();    

    start_row('style1');
      start_column('style1'); 
        append_block('image', 1, 'email/themes/Celebration/imgs/celebration2.jpg');
      end_column();
    end_row();

    start_row('style2');
      start_column('style2'); 
        append_block('header', 2, 'You&rsquo;re Invited!');      
        append_block('text', 1, 'Come over this Sunday for a day of friends, family and fun!');        
      end_column();                   
    end_row();   


    start_row('style2');
      start_column('style2'); 
        append_block('image', 2, 'email/themes/Celebration/imgs/map.png');        
      end_column();                   
    end_row();   


    start_row('style1');
      start_column('style1'); 
        append_block('text', 2, 'Bla');        
      end_column();  
      start_column('style1'); 
        append_block('text', 3, 'Bla');        
      end_column();   
      start_column('style1'); 
        append_block('text', 4, 'Bla');        
      end_column();                    
    end_row();

    start_row('style2');
      start_column('style2'); 
        append_block('text', 5, 'Come over this Sunday for a day of friends, family and fun!');        
      end_column();                   
    end_row();   

  end_email();
?>
