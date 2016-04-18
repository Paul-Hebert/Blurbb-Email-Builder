<?php
  start_email(); 

    start_row('style2');
      start_column('style2'); 
        append_block('text', 'Blurbb\'s turning 2 months old!');        
      end_column();                   
    end_row();    

    start_row('style1');      
      start_column('style1'); 
        append_block('header', 'A Birthday Celebration');        
      end_column();
    end_row();    

    start_row('style1');
      start_column('style1'); 
        append_block('image', 'email/themes/Celebration/imgs/celebration2.jpg');
      end_column();
    end_row();

    start_row('style2');
      start_column('style2'); 
        append_block('header', 'You&rsquo;re Invited!');      
        append_block('text', 'Come over this Sunday for a day of friends, family and fun!');        
      end_column();                   
    end_row();   


    start_row('style2');
      start_column('style2'); 
        append_block('image', 'email/themes/Celebration/imgs/map.png');        
      end_column();                   
    end_row();   


    start_row('style1');
      start_column('style1'); 
        append_block('text', 'Bla');        
      end_column();  
      start_column('style1'); 
        append_block('text', 'Bla');        
      end_column();   
      start_column('style1'); 
        append_block('text', 'Bla');        
      end_column();                    
    end_row();

    start_row('style2');
      start_column('style2'); 
        append_block('text', 'Come over this Sunday for a day of friends, family and fun!');        
      end_column();                   
    end_row();   

  end_email();
?>
