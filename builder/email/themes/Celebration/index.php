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
        append_block('text', 1, 'An e-commerce site selling high quality, hand decorated skateboard decks. Board in Hand sells decks as art pieces as well as complete decks that are ready to ride!');        
      end_column();                   
    end_row();       
  end_email();
?>
