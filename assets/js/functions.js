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
	$('#theme_selection_button').click(function(){
		window.location = '?theme=' + $('#theme_picker').val();
	});

	$('#theme_picker').change(function(){
		theme_name = $(this).val().replace(' ','_');

		pick_theme();
	});

	$('.theme_thumbnail').click(function(){
		theme_name = $(this).attr('id');

		pick_theme();
	});

	$('.arrow.left').click(function(){
		$('.theme_thumbnail:last-of-type').insertBefore( $('.theme_thumbnail:first-of-type') ) ;
		$('.theme_thumbnails').css('left', parseFloat($('.theme_thumbnails').css('left').replace('px','')) - 120 + 'px' );
		$('.theme_thumbnails').animate({'left': parseFloat($('.theme_thumbnails').css('left').replace('px','')) + 120 + 'px' },300);

	});

	$('.arrow.right').click(function(){
		$('.theme_thumbnail:first-of-type').insertBefore( $('.theme_thumbnail:last-of-type') ) ;
		$('.theme_thumbnails').css('left', parseFloat($('.theme_thumbnails').css('left').replace('px','')) + 120 + 'px' );
		$('.theme_thumbnails').animate({'left': parseFloat($('.theme_thumbnails').css('left').replace('px','')) - 120 + 'px' },300);	
	});	
}

function pick_theme(){
	$('.theme_thumbnail.selected').removeClass('selected');
	$('#' + theme_name).addClass('selected');
	$('#theme_picker option').prop('selected','false').filter('[value="' + theme_name.replace(' ','_') + '"]').prop('selected', 'true');
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Dashboard

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/


function initialize_dashboard(){
	theme_name = window.location.href.split('?theme=')[1];

	initialize_block_count();

	initialize_html_export();

	initialize_colorpickers();

	$('.block').each(function(){
		append_block_controls(this);
	});

	initialize_blocks_and_pickers();

	initialize_drag_and_drop();		
}


function initialize_block_count(){
	block_count = new Array()

	count_blocks('image');
	count_blocks('text');
	count_blocks('list');
	count_blocks('header');
	count_blocks('spreadsheet');
	count_blocks('video');
}

function count_blocks(content_type){
    block_count[content_type] = $('.block.' + content_type).length;
}


function initialize_blocks_and_pickers(){
	initialize_image_pickers();

	initialize_range_sliders();

	initialize_text_pickers();

	initialize_list_pickers();

	initialize_font_selector();

	initialize_spreadsheet_picker();

	append_spacers();

	initialize_block_controls();

	$('.input_toggle').click(function(){
		$(this).parent().children('.input_toggle').toggleClass('selected');
		$(this).siblings('input').toggleClass('hidden');
	});

	$('#email a').click(function(){
		return false;
	});
}

function initialize_block_controls(){
	$('.block .fa-trash').click(function(){
		remove_block(this);
	});

	$('.block .fa-copy').click(function(){
		var parent_block = $(this).parents('.block');

		parent_block.clone().insertAfter(parent_block);

		initialize_block_controls();
	});

	$('.block .fa-pencil').click(function(){
		var class_list = $(this).parents('.block').attr('class').split(' ');
		var content_type = class_list[0];
		var element_count = class_list[2].replace('n','')

		switch_picker(content_type, '.' + $(this).parents('.block').attr('class').replace(/\s/g,".") );
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
	// Get target
	var target = $('.text_picker, .header_picker, .list_picker').attr('data_target');

	// Determine current styling
	if( $(target).css('font-weight') === 'bold' || $(target).css('font-weight') > 400 ){
		$('.fa-bold').addClass('selected');
	}

	if( $(target).css('font-style') === 'italic' ){
		$('.fa-italic').addClass('selected');
	}	

	if( $(target).css('text-align') === 'left' || $(target).css('text-align') === undefined ){
		$('.fa-align-left').addClass('selected');
	} else if( $(target).css('text-align') === 'center' ){
		$('.fa-align-center').addClass('selected');
	} else if( $(target).css('text-align') === 'right' ){
		$('.fa-align-right').addClass('selected');
	} else if( $(target).css('text-align') === 'justify' ){
		$('.fa-align-justify').addClass('selected');
	}

	// Set click events for alignment
	$('.alignment i').click(function(){
		$(this).parent().children('.alignment i').removeClass('selected');

		var classes = $(this).attr('class').split(/\s+/);
		var finalClass = classes[classes.length - 1].split('-');
		var alignment = finalClass[finalClass.length - 1];

		$(this).addClass('selected');		

		$('#added_CSS').append('#email ' + target + ', #email ' + target + ' *{text-align:' + alignment + '}');
	});

	// Set click events for font weight
	$('.fa-bold').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#added_CSS').append('#email ' + target + ', #email ' + target + ' *{font-weight:bold}');			
		}	else{
			$('#added_CSS').append('#email ' + target + ', #email ' + target + ' *{font-weight:normal}');						
		}
	});

	// Set click events for font style
	$('.fa-italic').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#added_CSS').append('#email ' + target + ', #email ' + target + ' *{font-style:italic}');			
		}	else{
			$('#added_CSS').append('#email ' + target + ', #email ' + target + ' *{font-style:normal}');						
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
		csv_as_table( this, $('.spreadsheet_picker').attr('data-target') );
	});

	$('.spreadsheet_picker input[type=text]').keyup(function(){
		// Need to reformat spreadsheet php script to accept external URL
	});
}


function csv_as_table(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $.ajax({
			     type: "GET",
			     url: 'utilities/csv_as_table.php',
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
	     url: 'utilities/return_html.php',
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


	var spacer_column = '<td class="email_column style1 spacer hidden_x_y"><div width="10"></div></td>';

	$('.email_column').after(spacer_column);

	$('.email_row tr').each(function(){
		$(this).children('.email_column:first').before(spacer_column);
	}); 

	var spacer_row = '<table class="email_row style1 spacer hidden_x_y"><tr><td class="email_column style1"><div width="600"></td></tr></table>'

	$('.email_row').after(spacer_row); 

	$('.email_row:first-of-type').before(spacer_row);	
}


/************************************************************************************************************************
	Drop
/***********************************************************************************************************************/


function ajax_block(target, content_type){
	block_count[content_type] ++;
	var new_block = '.' + content_type + '.block.n' + block_count[content_type];

    $.ajax({
	    type: "GET",
	    url: 'email/universal/blocks/ajax_block.php',
	    data: {
	    	include_number : block_count[content_type],
	    	include_type : content_type
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
	$(target).append('<span class="background"></span><span class="controls"><i class="fa fa-pencil">&nbsp;&nbsp;Edit</i><i class="fa fa-copy">&nbsp;&nbsp;Clone</i><i class="fa fa-trash">&nbsp;&nbsp;Delete</i></span>');
}


function switch_picker(content_type, new_block){
		$.ajax({
		type: "GET",
		url: 'dashboard/' + content_type + '_picker.php',
		data: {
			include_data : [new_block]
		},
		success: function(data) {
			if( $('#current_picker').length === 0 ){
				$('#content_menu fieldset').append('<div id="current_picker" class="subsection"></div>');
			}

		    $('#current_picker').html(data);

		    initialize_blocks_and_pickers();
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

