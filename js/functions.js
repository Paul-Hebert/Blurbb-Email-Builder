/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Run on page load

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/

$(function(){
	initialize_dashboard();

	$('.icon_toggle').click(function(){
		modal( $(this).attr('data-heading'), $(this).children('.toggled_text').html() );
	});

	$('.input_toggle').click(function(){
		$(this).parent().children('.input_toggle').toggleClass('selected');
		$(this).siblings('input').toggleClass('hidden');
	});

	$('#theme_selection_button').click(function(){
		window.location = 'dashboard/?theme=' + $('#theme_picker').val();
	});
});


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Initialize Dashboard

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/

function initialize_dashboard(){
	theme_name = window.location.href.split('?theme=')[1];

	initialize_modular_sections();

	initialize_submit_button();

	initialize_theme_picker();

	initialize_colorpickers();

	initialize_image_pickers();

	initialize_range_sliders();

	initialize_text_inputs();

	initialize_font_selector();

	initialize_csv_reader();

	initialize_drag_and_drop();
}

/************************************************************************************************************************
	Dashboard Sections
/***********************************************************************************************************************/

function initialize_modular_sections(){
	$('#dashboard .fa-close, #dashboard h3').click(function(){
		$(this).parent().children('.fa-close').toggleClass('rotated');
		$(this).parent().children('h3').toggleClass('open');		
		$(this).siblings('fieldset').toggleClass('hidden_y');
	});
}


function initialize_submit_button(){
	$('#invoice_form').submit(function(){
		submit_invoice();
		return false;
	});

	$('#export_HTML').click(function(){
		export_HTML();
		return false;
	});

	$('#preview_HTML').click(function(){
		preview_HTML();
		return false;
	});
}


function initialize_theme_picker(){
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
		$('.theme_thumbnails').animate({'left': parseFloat($('.theme_thumbnails').css('left').replace('px','')) - 120 + 'px' },300);	});	
}


function pick_theme(){
	$('.theme_thumbnail.selected').removeClass('selected');
		$('#' + theme_name).addClass('selected')
		$('#theme_picker option').prop('selected','false').filter('[value="' + theme_name.replace(' ','_') + '"]').prop('selected', 'true');

		var old_spreadsheet = $('#csv_holder').html();

		if ( $('#logo_input').val() !== "" ){
			var logo_src = $('#logo').attr('src');
		} else{
			var logo_src = null;
		}

        $.ajax({
		     type: "GET",
		     url: '../../includes/themes/' + theme_name + '/index.php',
	  		 data: { 
	  		 	heading1: $('.heading1').html(), 
	  		 	message1: $('.message1').html(), 
	  		 	heading2: $('.heading2').html(), 
	  		 	message2: $('.message2').html(),
	  		 	business_name: $('.business_name').html(),
	  		 	website_url: $('.website_url').html(),
	  		 	logo: logo_src
	  		 },
  		     success: function(data) {
  		     		$('#email').css({'display':'none','opacity':'0'});
  		     		setTimeout(function(){
			            $('#email').html(data);
			            $('#csv_holder').html(old_spreadsheet);
			            $('#email').css('display','block');

			            setTimeout(function(){
	  		     			$('#email').animate({'opacity':'1'},300);
	  		     		},300);
  		     		},300);
		     }
		});

		$('#theme_CSS').attr('href','../../includes/themes/' + theme_name + '/css/style.css');
}


function initialize_colorpickers(){
    $('head').append('<style id="addedCSS" type="text/css"></style>');

	$('.colorpicker-wrapper').ColorPicker({
		flat: true,
		onChange: function (hsb, hex, rgb) {
			var css_targets = $(this).parent().parent().attr('data-target').split('-');

			$('#addedCSS').append('#email ' + css_targets[0] + '{' + css_targets[1] + ': #' + hex + ';}');
		}
	});

	$('.colorpicker').addClass('hidden_y');


	$('.color-swatch').each(function(){
		if ( $(this).attr('data-color') != 'picker' ){
			$(this).css('background',$(this).attr('data-color')).click( function(){
				var css_targets = $(this).parent().attr('data-target').split('-');
				
				$('#addedCSS').append('#email ' + css_targets[0] + '{' + css_targets[1] + ':' + $(this).attr('data-color') + '}');
				
				if(! $(this).siblings('p').children('.colorpicker').hasClass('hidden_y') ){
					$(this).siblings('p').children('.colorpicker').addClass('hidden_y')
				}

				$(this).siblings('.selected').removeClass('selected');
				$(this).addClass('selected');
			});
		} else{
			$(this).click(function(){
				$(this).siblings('p').children('.colorpicker').toggleClass('hidden_y');
				$(this).siblings('.selected').removeClass('selected');
				$(this).addClass('selected');
			})
		}
	});
}


function initialize_image_pickers(){
	$(".image_picker input[type=file]").change(function(){
	    readURL( this , $(this).parent().attr('data-target') );
	});

	$(".image_picker input[type=text]").keyup(function(){
	    $( $(this).parent().attr('data-target') ).attr('src', $(this).val()); 
	});

	$(".image_picker input[type=text]").each(function(){
		$(this).attr( 'placeholder', $( $(this).parent().attr("data-target") ).attr('src') );
	});
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


function initialize_text_inputs(){
	$('.text_input').each(function(){
		var target = $( $(this).attr('data_target') );
		$(this).attr('placeholder', target.text().trim() );
	});

	$('.text_input').keyup(function(){
		var target = $($(this).attr('data_target') );
		var target_type = target.get(0).tagName;
		var text =  $(this).val();
		text = text.replace(/\n\r?/g, '</' + target_type + '>' + '<' + target_type + '>');
		target.html( text );
	});

	$('.text_styles .fa-cog').click(function(){
		$(this).toggleClass('selected');
		$(this).siblings().toggleClass('hidden_x_y');
	});

	$('.alignment i').click(function(){
		$(this).parent().children('.alignment i').removeClass('selected');

		var classes = $(this).attr('class').split(/\s+/);
		var finalClass = classes[classes.length - 1].split('-');
		var alignment = finalClass[finalClass.length - 1];

		$(this).addClass('selected');		

		$('#addedCSS').append('#email ' + $(this).parent().parent().attr('data_target') + ', #email ' + $(this).parent().parent().attr('data_target') + ' *{text-align:' + alignment + '}');
	});

	$('.fa-bold').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#addedCSS').append('#email ' + $(this).parent().parent().attr('data_target') + ', #email ' + $(this).parent().parent().attr('data_target') + ' *{font-weight:bold}');			
		}	else{
			$('#addedCSS').append('#email ' + $(this).parent().parent().attr('data_target') + ', #email ' + $(this).parent().parent().attr('data_target') + ' *{font-weight:normal}');						
		}
	});

	$('.fa-italic').click(function(){
		$(this).toggleClass('selected');

		if( $(this).hasClass('selected') ){
			$('#addedCSS').append('#email ' + $(this).parent().parent().attr('data_target') + ', #email ' + $(this).parent().parent().attr('data_target') + ' *{font-style:italic}');			
		}	else{
			$('#addedCSS').append('#email ' + $(this).parent().parent().attr('data_target') + ', #email ' + $(this).parent().parent().attr('data_target') + ' *{font-style:normal}');						
		}	
	});
}


function initialize_font_selector(){
	$('#font option').each(function(){
		$(this).css('font-family',$(this).text());
	})

	$('#font').change(function(){
		$('#email *').css('font-family', $(this).val());
		$(this).css('font-family', $(this).val());
	});
}


function initialize_csv_reader(){
	$('#csv_input').change(function(){
		readURL2(this);
	});
}


function initialize_drag_and_drop(){
	$('.content_picker .fa').mousedown(function(e){
		var content_type = $(this).attr('data-type');

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

			$('#email .block, #email .column').each(function(){
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

			var dropped = false;

			$('#email .block').each(function(){
				if ( $(this).ismouseover() ) {
				    ajax_block(this, content_type, 'replaceWith');
				    dropped = true;
				}
			});

			if (dropped === false){
				$('#email .column').each(function(){
					if ( $(this).ismouseover() ) {
					    ajax_block(this, content_type, 'append');
					    dropped = true;
					}
				});			
			}

			$('#email .block, #email .column').removeClass('droppable');
		}).addClass('unselectable');
	})
}

function submit_invoice() {
	if ( $('#copy_me').is(":checked") ){
		var checked = 'true';
	} else{
		var checked = 'false';
	}

    var request = $.ajax({
	     type: "POST",
	     url: '../../includes/utilities/send_mail.php',
  		 data: { 
  		 	message: '<div id="email">' + $('#email').html() + '</div>', 
  		 	theme: theme_name,
  		 	addedCSS: $('#addedCSS').text(),
  		 	subject: $('#subject').val(), 
  		 	from_email: $('#from_email').val(), 
  		 	to_email: $('#to_email').val(),
  		 	copy_me: checked
  		 },
	     success: function() {
			modal('Success','<p>Your email has been sent.</p><p>If you do not receive payment make sure to follow up. It\'s possible this email was blocked by a spam filter.');			
		}
	});

	request.fail(function(jqXHR, textStatus) {
		console.log( "Request failed: " + textStatus );
	});
}


function readURL(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(target).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// Super sloppy. Needs cleaning up

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $.ajax({
			     type: "GET",
			     url: '../../includes/utilities/csv_as_table.php',
			     data: "path=" + e.target.result,
			     success: function(data) {
			          $('#csv_holder').html(data);
			     }
			});
        }

        reader.readAsDataURL(input.files[0]);
    }
}


/***********************************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	Utility Functions

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/***********************************************************************************************************************/

function preview_HTML(){
	$('body').append('<div class="modal background transparent"></div><div class="preview"><div class="desktop"></div><div class="tablet"></div><div class="mobile"></div></div>');

	$('.preview div').each(function(){
		$(this).html('<span id="email">' + $('#email').html() + '</span>');
	});

	setTimeout(function(){
		$('.modal, .preview').removeClass('transparent');
	},1);
	
	$('.modal.background').click(function(){
		$('.modal, .preview').addClass('transparent');

		setTimeout(function(){
			$('.modal, .preview').remove();
		},300);
	})
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
  		 	addedCSS: $('#addedCSS').text()
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


function ajax_block(target, content_type, action){
    $.ajax({
	     type: "GET",
	     url: 'email/' + content_type + '.php',
		     success: function(data) {
		     	handle_ajax_block(target, data, action);
	     }
	});
}

function handle_ajax_block(target, data, action){
	if (action === 'replaceWith'){
		$(target).replaceWith(target, data);
	} else{
		$(target).append(data);		
	}
}

//jQuery ismouseover  method
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


var MAP = { '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'};



function escapeHTML(s, forAttribute) {
    return s.replace(forAttribute ? /[&<>'"]/g : /[&<>]/g, function(c) {
        return MAP[c];
    });
}




