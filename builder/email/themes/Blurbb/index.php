<?php
  start_email();
    start_row('style1');
      start_column('style1'); 
        append_block('image', 1);
      end_column();    

      start_column('style1');
        append_block('header', 1);        
      end_column();
    end_row();

    start_row('style3');
      start_column('style3'); 
        append_block('header', 2);
      end_column();

      start_column('style3');
        append_block('text', 1);        
      end_column();
    end_row(); 

    start_row('style1');
      start_column('style1'); 
        append_block('header', 3);
        append_block('text', 2);        
      end_column();
    end_row();    

    start_row('style2');
      start_column('style2'); 
        append_block('text', 3);        
      end_column();
    end_row();         
  end_email();
?>
