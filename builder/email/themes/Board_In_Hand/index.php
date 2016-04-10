<?php
  start_email();
    start_row('style1');
      start_column('style1'); 
        append_block('image', 1, 'http://boardinhand.com/imgs/logo.png');
      end_column();    

      start_column('style1');
        append_block('header', 1, 'Board in Hand');    
        append_block('text', 1, 'High Quality Skateboard Art');                    
      end_column();
    end_row();

    start_row('style2');
      start_column('style2'); 
        append_block('header', 3, 'Holiday Deals');      
        append_block('text', 2, 'An e-commerce site selling high quality, hand decorated skateboard decks. Board in Hand sells decks as art pieces as well as complete decks that are ready to ride!');        
      end_column();

      start_column('style2');
        append_block('image', 2, 'http://boardinhand.com/imgs/decks/thumb/Hypnosis.png');        
      end_column();      

      start_column('style2');
        append_block('image', 3, 'http://boardinhand.com/imgs/decks/thumb/Decktrio.png');      
      end_column();                         

    end_row();    

    start_row('style1');
      start_column('style1');
        append_block('image', 4, 'http://boardinhand.com/imgs/cart.png');      
      end_column();         
      start_column('style1'); 
        append_block('header', 3, 'View Our Shop');        
      end_column();
    end_row();         
  end_email();
?>
