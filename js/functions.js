/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Run on page load

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


$(function(){
	initialize_dashboard();

	initialize_toggle_icons();

	initialize_theme_selection_page();
});


function initialize_toggle_icons(){
	$('.icon_toggle').click(function(){
		modal( $(this).attr('data-heading'), $(this).children('.toggled_text').html() );
	});
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Theme Selector

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


function initialize_theme_selection_page(){

}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Dashboard

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


function initialize_dashboard(){
	theme_name = window.location.href.split('?theme=')[1];

	initialize_html_export();

	initialize_colorpickers();

	$('.block').each(function(){
		append_block_controls(this);
	});

	initialize_blocks_and_pickers();

	initialize_drag_and_drop();		
}


function initialize_blocks_and_pickers(){
	initialize_image_pickers();

	initialize_range_sliders();

	initialize_text_pickers();

	initialize_list_pickers();

	initialize_font_selector();

	initialize_spreadsheet_picker();

	append_spacers();

	$('.input_toggle').click(function(){
		$(this).parent().children('.input_toggle').toggleClass('selected');
		$(this).siblings('input').toggleClass('hidden');
	});

	$('.block .fa-close').click(function(){
		remove_block(this);
	});

	$('.block .fa-pencil').click(function(){
		var class_list = $(this).parents('.block').attr('class').split(' ');
		var content_type = class_list[0];
		var element_count = class_list[2].replace('n','')

		switch_picker(content_type, '.' + $(this).parents('.block').attr('class').replace(/\s/g,".") );
	});

	$('#email a').click(function(){
		return false;
	});
}

/************************************************************************************************************************
	Color Pickers
/***********************************************************************************************************************/


function initialize_colorpickers(){
	$('.colorpicker-wrapper').ColorPicker({
		flat: true,
		onChange: function (hsb, hex, rgb) {
			var css_targets = $(this).parent().parent().attr('data-target').split('-');

			$('#added_CSS').append('#email ' + css_targets[0] + '{' + css_targets[1] + ': #' + hex + ';}');
		}
	});

	$('.colorpicker, .color-selector-wrapper .file-picker').addClass('hidden_y');



	$(".color-selector-wrapper .file-picker input[type=text]").keyup(function(){
	    $( $(this).parents('.color-selector-wrapper').attr('data-target').split('-')[0] ).css('background', 'url("' + $(this).val() + '")'); 
	});

	$(".color-selector-wrapper .file-picker input[type=file]").change(function(){
	    image_from_file( this , $(this).parents('.color-selector-wrapper').attr('data-target').split('-')[0], 'background');
	});



	$('.color-swatch').each(function(){
		$(this).css('background',$(this).attr('data-color')).click( function(){
			var css_targets = $(this).parent().attr('data-target').split('-');
			
			$('#added_CSS').append('#email ' + css_targets[0] + '{' + css_targets[1] + ':' + $(this).attr('data-color') + '}');
		});
	});

	$('.color-selector-wrapper .fa-eyedropper').click(function(){
		$(this).siblings('p').children('.colorpicker').toggleClass('hidden_y');
	});

	$('.color-selector-wrapper .fa-picture-o').click(function(){
		$(this).siblings('.file-picker').toggleClass('hidden_y');
	});

	$('.color-selector-wrapper .fa-picture-o, .color-swatch').click(function(){
		if(! $(this).siblings('p').children('.colorpicker').hasClass('hidden_y') ){
			$(this).siblings('p').children('.colorpicker').addClass('hidden_y');
		}	
	});	

	$('.color-selector-wrapper .fa-eyedropper, .color-swatch').click(function(){
		if(! $(this).siblings('.file-picker').hasClass('hidden_y') ){
			$(this).siblings('.file-picker').addClass('hidden_y');
		}	
	});

	$('.color-selector-wrapper .fa-eyedropper, .color-selector-wrapper .fa-picture-o, .color-swatch').click(function(){
		$(this).siblings('.selected').removeClass('selected');
		$(this).addClass('selected');		
	});
}


/************************************************************************************************************************
	Font Selector
/***********************************************************************************************************************/


function initialize_font_selector(){
	$('#font option').each(function(){
		$(this).css('font-family',$(this).text());
	})

	$('#font').change(function(){
		$('#email *').css('font-family', $(this).val());
		$(this).css('font-family', $(this).val());
	});
}


/************************************************************************************************************************
	Text Pickers
/***********************************************************************************************************************/


function initialize_text_pickers(){
	$('.text_picker, .header_picker').each(function(){ 
		var target = $( $(this).attr('data_target') );
		$(this).attr('placeholder', target.text().trim() );
	});

	$('.text_picker, .header_picker').keyup(function(){
		var target = $( $(this).attr('data_target') );
		var target_type = target.get(0).tagName;
		var text =  $(this).val();
		text = text.replace(/\n\r?/g, '</' + target_type + '>' + '<' + target_type + '>');
		target.text( text );
	});

	initialize_text_styles();

	$('.text_picker, .header_picker').focus();
}

function initialize_text_styles(){
	$('.alignment i').click(function(){
		$(this).parent().children('.alignment i').removeClass('selected');

		var classes = $(this).attr('class').split(/\s+/);
		var finalClass = classes[classes.length - 1].split('-');
		var alignment = finalClass[finalClass.length - 1];

		$(this).addClass('selected');		

		$('#added_CSS').append('#email ' + $('.text_picker, .header_picker').attr('data_target') + ', #email ' + $('.text_picker, .header_picker').attr('data_target') + ' *{text-align:' + alignment + '}');
	});

	$('.fa-bold').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#added_CSS').append('#email ' + $('.text_picker, .header_picker').attr('data_target') + ', #email ' + $('.text_picker, .header_picker').attr('data_target') + ' *{font-weight:bold}');			
		}	else{
			$('#added_CSS').append('#email ' + $('.text_picker, .header_picker').attr('data_target') + ', #email ' + $('.text_picker, .header_picker').attr('data_target') + ' *{font-weight:normal}');						
		}
	});

	$('.fa-italic').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#added_CSS').append('#email ' + $('.text_picker, .header_picker').attr('data_target') + ', #email ' + $('.text_picker, .header_picker').attr('data_target') + ' *{font-style:italic}');			
		}	else{
			$('#added_CSS').append('#email ' + $('.text_picker, .header_picker').attr('data_target') + ', #email ' + $('.text_picker, .header_picker').attr('data_target') + ' *{font-style:normal}');						
		}	
	});
}

/************************************************************************************************************************
	List Pickers
/***********************************************************************************************************************/


function initialize_list_pickers(){
	$('.list_picker textarea').keyup(function(){
		$( $(this).parent().attr('data_target') + ' li:nth-of-type(' + $(this).attr('class')[1] + ')' ).text( $(this).val() );
	});

	$('.list_picker textarea:first-of-type').focus();
}


/************************************************************************************************************************
	Image Pickers
/***********************************************************************************************************************/


function initialize_image_pickers(){
	$(".image_picker input[type=file]").change(function(){
	    image_from_file( this , $('.image_picker').attr('data-target'), 'src');
	});

	$(".image_picker .file-picker input[type=text]").keyup(function(){
	    $( $('.image_picker').attr('data-target') ).attr('src', $(this).val()); 
	});

	$(".image_picker .file-picker input[type=text]").each(function(){
		$(this).attr( 'placeholder', $( $('.image_picker').attr("data-target") ).attr('src') );
	});
}


function image_from_file(input,target,attribute) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();


        reader.onload = function (e) {
        	if (attribute === 'src'){
            	$(target).attr('src', e.target.result);
            } else if(attribute === 'background'){
            	$(target).css('background', 'url("' + e.target.result +'")');
            	console.log('d');
            }
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function initialize_range_sliders(){
	$('input[type=range]').change(function(){
		var range_value = $(this).val();

		var css_targets = $(this).attr('data-target').split('-');

		$( css_targets[0] ).css( css_targets[1], range_value + 'px' );

		$(this).siblings('input').val(range_value);
	});

	$('.range-slider-wrapper input[type=text]').change(function(){
		$(this).siblings('input').val( $(this).val() ).change();	
	});

	$('input[type=range]').each(function(){
		var css_targets = $(this).attr('data-target').split('-')[0];
		var start_val = $(css_targets).css('width').replace('px','');

		$(this).val( start_val ).change();
	});	
}


/************************************************************************************************************************
	Spreadsheet Pickers
/***********************************************************************************************************************/


function initialize_spreadsheet_picker(){
	$('.spreadsheet_picker input[type=file]').change(function(){
		CSV_from_file( this, $('.spreadsheet_picker').attr('data-target') );
	});

	$('.spreadsheet_picker input[type=text]').keyup(function(){
		// Need to reformat spreadsheet php script to accept external URL
	});
}


function CSV_from_file(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $.ajax({
			     type: "GET",
			     url: '../../includes/utilities/csv_as_table.php',
			     data: "path=" + e.target.result,
			     success: function(data) {
			          $(target).html(data);
			     }
			});
        }

        reader.readAsDataURL(input.files[0]);
    }
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Exporting HTML

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


function initialize_html_export(){
	$('#export_HTML').click(function(){
		export_HTML();
		return false;
	});
}


function export_HTML(){
	modal('Code','<ul class="links"><li id="download_HTML">Download HTML</li></ul><pre><i class="fa fa-spinner</pre>');

	$('#download_HTML').click(function(){
		download('email.html', $('.modal pre').text() );
	});

    var request = $.ajax({
	     type: "POST",
	     url: '../../includes/utilities/return_html.php',
  		 data: { 
  		 	message: '<div id="email">' + $('#email').html() + '</div>', 
  		 	theme: theme_name,
  		 	added_CSS: $('#added_CSS').text()
  		 },
	     success: function(data) {
			$('.modal.content pre').html(data);			
		}
	});

	request.fail(function(jqXHR, textStatus) {
		console.log( "Request failed: " + textStatus );
	});
}


function download(filename, text){
    var pom = document.createElement('a');
    pom.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    pom.setAttribute('download', filename);

    if (document.createEvent) {
        var event = document.createEvent('MouseEvents');
        event.initEvent('click', true, true);
        pom.dispatchEvent(event);
    }
    else {
        pom.click();
    }
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Drag and Drop

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


/************************************************************************************************************************
	Drag
/***********************************************************************************************************************/


function initialize_drag_and_drop(){
	$('.content_picker .fa').mousedown(function(e){
		var content_type = $(this).attr('data-type');

		$('.spacer').removeClass('hidden_x_y');

		var offset = $(this).offset();
		var x_offset = e.pageX - offset.left;
		var y_offset = e.pageY - offset.top;		
		
		$('.content_picker').append('<i class="selected"></i>');
		$('.content_picker .selected').attr( 'class', $(this).attr('class') + ' selected' );
		$('.content_picker .selected').css({
			'left':e.pageX - x_offset,
			'top':e.pageY - y_offset
		});

		$('body').mousemove(function(e){
			$('.content_picker .selected').css({
				'left':e.pageX - x_offset,
				'top':e.pageY - y_offset
			});

			$('.spacer').each(function(){
				if ( $(this).ismouseover() ) {
				    $(this).addClass('droppable');
				} else{
				    $(this).removeClass('droppable');					
				}
			});
		}).mouseup(function(){
			$('.content_picker .selected').fadeOut(200);	

			setTimeout(function(){
				$('.content_picker .selected').remove();
			}, 200);

			$('body').unbind('mousemove').unbind('mouseup').removeClass('unselectable');	

			$('.spacer').each(function(){
				if ( $(this).ismouseover() ) {
				    ajax_block(this, content_type);
				}
			});

			$('.spacer').addClass('hidden_x_y');
		}).addClass('unselectable');
	})
}



function append_spacers(){
	var spacer = '<div class="spacer hidden_x_y"></div>';

	$('.spacer').remove();

	$('.email_column').each(function(){
		$(this).children('.block:first').before(spacer);
	}); 

	$('.block').after(spacer);


	var spacer_column = '<td class="email_column spacer hidden_x_y"><div width="10"></div></td>';

	$('.email_column').after(spacer_column);

	$('.email_row tr').each(function(){
		$(this).children('.email_column:first').before(spacer_column);
	}); 

	var spacer_row = '<table class="email_row light spacer hidden_x_y"><tr><td class="email_column"><div width="600"></td></tr></table>'

	$('.email_row').after(spacer_row);

	$('.email_row:first-of-type').before(spacer_row);	
}


/************************************************************************************************************************
	Drop
/***********************************************************************************************************************/


function ajax_block(target, content_type){
	var element_count = $('.block.' + content_type).length + 1;
	var new_block = '.' + content_type + '.block.n' + element_count;

    $.ajax({
	    type: "GET",
	    url: 'email/' + content_type + '.php',
	    data: {
	    	include_number : element_count
	    },
		success: function(data) {
			if ( $(target).hasClass('email_row') ){
				$(target).children().children().children().html(data);
				$(target).removeClass('spacer').removeClass('hidden_x_y').removeClass('droppable');
			} else if ( $(target).hasClass('email_column') ){
				$(target).html(data);
				$(target).removeClass('spacer').removeClass('hidden_x_y').removeClass('droppable');				
			}else{
				$(target).replaceWith(target, data);
			}

			append_block_controls(new_block);
			$(new_block).before('<div class="spacer hidden_x_y"></div>');
		}
	});

    switch_picker(content_type, new_block);
}


function append_block_controls(target){
	$(target).append('<span class="controls"><span class="background"></span><i class="fa fa-close"></i><i class="fa fa-pencil"></span>');
}


function switch_picker(content_type, new_block){
		$.ajax({
		type: "GET",
		url: content_type + '_picker.php',
		data: {
			include_data : [new_block]
		},
		success: function(data) {
			if( $('#current_picker').length === 0 ){
				$('#content_menu fieldset').append('<div id="current_picker" class="subsection"></div>');
				append_picker_controls();
			}

		    $('#current_picker').html(data);

		    initialize_blocks_and_pickers();
	    }
	});
}


function append_picker_controls(){
	$.ajax({
		type: "GET",
		url:'picker_controls.php',
		success: function(data) {
			$('#content_menu fieldset').append(data);
	    }
	});
}


function remove_block(target){
	var block = $(target).parents('.block');
	var column = block.parents('.email_column');
	var row = column.parents('.email_row');

	block.remove();

	$('.spacer').remove();

	remove_parent(column,'');
	remove_parent(row,'<tbody><tr></tr></tbody>');

	append_spacers();
}

function remove_parent(type,empty){
	if (type.length > 0){
		var contents = type.html().replace(/\s/g,"");

		if (contents == empty ){
			type.remove();
		}
	}
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Utility Functions

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


function modal(heading,content){
	$('body').append('<div class="modal background transparent"></div><div class="modal content transparent"></div>');

	$('.modal.content').html('<h1>' + heading + '</h1><i class="fa fa-close"></i>' + content);		

	setTimeout(function(){
		$('.modal').removeClass('transparent');
	},1);
	
	$('.modal.background, .modal .fa-close').click(function(){
		$('.modal').addClass('transparent');

		setTimeout(function(){
			$('.modal').remove();
		},300);
	})
}


//jQuery ismouseover method
(function($){ 
    $.mlp = {x:0,y:0}; // Mouse Last Position
    function documentHandler(){
        var $current = this === document ? $(this) : $(this).contents();
        $current.mousemove(function(e){jQuery.mlp = {x:e.pageX,y:e.pageY}});
        $current.find("iframe").load(documentHandler);
    }
    $(documentHandler);
    $.fn.ismouseover = function(overThis) {  
        var result = false;
        this.eq(0).each(function() {  
                var $current = $(this).is("iframe") ? $(this).contents().find("body") : $(this);
                var offset = $current.offset();             
                result =    offset.left<=$.mlp.x && offset.left + $current.outerWidth() > $.mlp.x &&
                            offset.top<=$.mlp.y && offset.top + $current.outerHeight() > $.mlp.y;
        });  
        return result;
    };  
})(jQuery);

