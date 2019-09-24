/* Ekiline for WordPress Theme, Copyright 2018 Uri Lazcano. Ekiline is distributed under the terms of the GNU GPL. http://ekiline.com */

jQuery(document).ready(function($){
	
	// El preload
    setTimeout(function(){
        $('#pageLoad').fadeOut(500);
    }, 600);			          
    
    // Ajuste en dropdown de widgets dentro de navbar
	$('.widget.navbar-btn.dropdown .dropdown-menu').on('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		$('.carousel-control-prev').click(function() {
		  $( $( this ).parent() ).carousel('prev');
		});
		
		$('.carousel-control-next').click(function() {
		  $( $( this ).parent() ).carousel('next');
		});
	});
   
    // Ajuste en dropdown de widgets dentro de navbar
	$( '.external-toggle .nav-link' ).attr('data-toggle', 'collapse' );	 
  
		
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	En caso de optimizar la carga de estilos
	 *  Parsear la variable de estilos y crear cada css en el head.
	 *  Revisar esto: http://larryullman.com/forums/index.php?/topic/3558-jquery-ajax-how-to-use-json-to-create-new-html-elements/
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/		
	
	// variable php
	if ( allCss != null ){
		
		var obj = allCss;	
		
		//console.log(allCss);
		
		// crear un estilo por cada ruta extríada.
		
		$.each( obj, function( key, value ) {
			
				 //alert( key + ": " + value );
				 //update 2018
				 //alert( key + ": " + value.style );
		
			var $head = $("head");
			var $wpcss = $head.find("style[id='ekiline-inline']"); 
			var $cssinline = $head.find("style:last");
			var $ultimocss = $head.find("link[rel='stylesheet']:last");
			// var linkCss = "<link id='"+ value.id +"' rel='stylesheet' href='"+ value.src +"' type='text/css' media='"+ value.media +"'>";
			var linkCss = $('<link/>',{'rel':'stylesheet','id':value.id,'href':value.src,'type':'text/css','media':value.media});
		
		  // En caso de de encontrar una etiqueta de estilo ó link ó nada inserta el otro estilo css, 
		
			if ($wpcss.length){ 
					$wpcss.before(linkCss); 
				} else if ($cssinline.length){ 
					$cssinline.before(linkCss); 
				} else if ($ultimocss.length){ 
					$ultimocss.before(linkCss); 
				} else { 
					$head.append(linkCss); 
				}		
			
		});			
		
	}
	
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Sidebars ocultar mostrar 
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/			

	if ( $( 'body.toggle-sidebars' ).length ) {		        
		
	    // Sidebar izquierdo mostrar ocultar
		$("#show-sidebar-left").on('click',function(e) {
	    	e.preventDefault();
	        $(".toggle-sidebars").toggleClass("active-sidebar-left");
		});     
	
	    // Sidebar derecho mostrar ocultar
		$("#show-sidebar-right").on('click',function(e) {
			e.preventDefault();
			$(".toggle-sidebars").toggleClass("active-sidebar-right");
		});         
	}
		
	/* animar el boton del menu.
	$('.navbar-toggler').on('click', function () {
		$(this).toggleClass('active');
	});*/
	
	//19 ago menú con modal
	$('#site-navigation-modal .navbar-toggler').on('click',function(){
		$(this).removeClass('collapsed');
	});
    $('#navModal').on('hidden.bs.modal', function(){
    	$('#site-navigation-modal .navbar-toggler').addClass('collapsed');
    });             
	
	
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Dependiendo el contenido, añadir css para crear sticky footer 
	 * 
	 * 	html{position:relative;height:auto;min-height:100%;}
	 *	body{margin-bottom:60px;}
	 *	.site-footer{position:absolute;bottom:0;width:100%;height:60px;}
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/			
	
	if ( !$('body').hasClass('head-cover') ){
		
		var sticky = $( 'footer.site-footer > .container' ).height() + 50 ;
		//console.log(sticky);

		if( sticky <= '200' ){
			$('html').css({ 'position':'relative','height':'auto','min-height':'100%' });
			$('body').css('margin-bottom', sticky + 'px');
			$( 'footer.site-footer' ).css({'position':'absolute','bottom':'0','width':'100%','min-height': sticky + 'px' });
		}		
	} 

	
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Objetos de layout
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/	
	
            
    // Carrusel con swipe e impedir que avance automaticamente	
    $('.carousel').carousel({
    	  //interval: false,
    	  swipe: 40
    	});	  
            
/** 11 de octubre B4: 
 *  Ya no sirve fixed como tal, se reemplaza por sticky en elementos que así sea necesario.   
 * 	En el caso de Ekiline, se calcula la altura del header y se añade la clase fixed-top.
 *  31-03-18, adoptar fixed https://www.codeply.com/go/i8xuvOmVw3/bootstrap-4-fixed-nav-and-sidebar-layout;
 **/
            
    if ( $('#masthead').length ) {	    	
	    
		$(window).on('scroll', function (event) {
			
		    var scrollValue = $(window).scrollTop();
		    var headHeight = $('#masthead').height();
		    
		    if (scrollValue > headHeight) {
		        $('.navbar.navbar-sticky').addClass('fixed-top');
		    } else{
		        $('.navbar.navbar-sticky').removeClass('fixed-top');
		    }		    
		    
		});
    } else {
    	
		$(window).on('scroll', function (event) {
			
		    var scrollValue = $(window).scrollTop();
		    var menuHeight = $('.navbar').height();
		    
		    if (scrollValue > menuHeight) {
		        $('.navbar.navbar-sticky').addClass('fixed-top');
		    } else{
		        $('.navbar.navbar-sticky').removeClass('fixed-top');
		    }
		    
		});	    	    
    }

	/**
	 * 	Delay en el background.
	 *  https://stackoverflow.com/questions/39637176/js-css-dynamic-background-image-moving
	 */	

	// Handle the window scroll event
	$(window).scroll(function () {
	    // Store the distance scrolled
	    var scrolled = $(window).scrollTop() + 1;
	
	    // Set the scroll speed
	    var scrollSpeed = 0.2;
	    
	    // Update the background position
	    $('.bg-responsive-delay').css('background-position', '0' + -(scrolled * scrollSpeed) + 'px');
	});


    
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Tooltips y popovers
	 *	Nota: Añadir variables para mostrar contenidos enriquecidos con HTML. 
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/		
        
    // Tooltips, inicializar
    $('.tooltip-default').tooltip();
    
    //PopOvers, inicializar
    $('.popover-default').popover();
             
	    //PopOvers con contenido HTML:
	    $('.popover-rich').popover({
	        container: 'body',
	        html: true,
	        content: function () {
	            var clone = $( $(this).attr('href') ).clone(true).removeClass('hide');
	            return clone;
	            //console.log(clone);
	        }
		   	}).click(function(e) {
		        e.preventDefault();
	    });
	    
	    //PopOvers, ocultar el contenido HTML, esto depende del attr=Href, para que surta efecto.
		$('.popover-rich').each(function(){
			//extraigo el enlace del contenido
		    var popHtml = $(this).attr('href');
			//Creo un envoltorio
			var popWrap = $('<div/>', { "class" : "collapse" });
			//Envuelvo
		    $( popHtml ).wrap( popWrap );
		});    

    
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Agregar clases en items del core de wordpress
	 *	Widgets que no requieren ser sobreescritos (overide)
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/		
			
	$( '.widget_rss ul' ).addClass( 'list-group' );		
	$( '.widget_rss ul li' ).addClass( 'list-group-item' );		
	//$( '#calendar_wrap, .calendar_wrap' ).addClass( 'table-responsive');
	$( 'table#wp-calendar' ).addClass( 'table responsive table-sm table-striped');
	$( '.widget_text select, .widget_archive select, .widget_categories select' ).addClass( 'form-control');
	$( '.widget_recent_comments ul' ).addClass('list-group');
	$( '.widget_recent_comments ul li' ).addClass( 'list-group-item');		
	$( '.widget_recent_comments ul li' ).addClass( 'list-group-item');		
	$( '.nav-links' ).addClass( 'pager');		
	$( '.nav-links .nav-next' ).addClass( 'next');		
	$( '.nav-links .nav-previous' ).addClass( 'previous');		
	$( '.caption-button > a' ).addClass( 'btn btn-secondary');		
	
	// Videos embedados responsivos
    if ( $('.embed-responsive').length ) {	
         $('.embed-responsive').find('iframe').addClass('embed-responsive-item'); 
    }	
	
	
	
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Carrusel multiple 
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/			
						
	$('.carousel-multiple .carousel-item').each(function(){
	    
	    var cThumb = $(this).children();
	                                                 
	    // Busca la clase que corresponda para determinar una variable de conteo y también que añada una clase al contenedor
	      
	    if ( cThumb.hasClass( 'col-sm-6' ) ){
	    	
	    		$('.carousel-multiple').addClass('x2');
	    		var slot = 0;

	        } else if ( cThumb.hasClass( 'col-sm-4' ) ){
	        	
	        	$('.carousel-multiple').addClass('x3');           	
        		var slot = 2/2;
	
	        } else if ( cThumb.hasClass( 'col-sm-3' ) ){
	
	        	$('.carousel-multiple').addClass('x4');                
	        	var slot = 2;
	
	        } else if ( cThumb.hasClass( 'col-sm-2' ) ){
	
	        	$('.carousel-multiple').addClass('x6');                
	        	var slot = 2+2;
	
	        }
	
	    // por cada objeto cuenta el priemro y clonalo para hacer el recorrido
	    // ejercicio original: http://www.bootply.com/4eSuqiPRo2
	    var next = $(this).next();
	      
	    if (!next.length) {
	    	next = $(this).siblings(':first');
	    }
	      
	    next.children(':first-child').clone().appendTo( $(this) );    
	      
	    // aquí meto mi variable 'slot'.
	    for (var i=0;i<slot;i++) { 
	          
	    	next=next.next();
	        if (!next.length) {
	            next = $(this).siblings(':first');
	        }
	        
	        next.children(':first-child').clone().appendTo( $(this) );
	      }			
	}); 
	


	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Plugin para extender el uso de modals, por tipo.
	 *  Mejorado 2018. B4
	 *  NOTA: debe cargar después del carrusel mejorado.
	 *  tip: Ejecutar un modal después de cargar
 	 *  $('#perfil_doctor').modal('show');
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/		

	var ekilinemodals = {
		
		multipleModals: function ( linkClass ) {
			
			//Abr 28 2017 añadir un atributo a los links, para ejecutar los modals.
	        $( linkClass ).each(function(){
	        	
	          $(this).attr('data-toggle','modal');

		        //Marz 2018 preparar el contenido por boton.			
		          
			    // Extraigo el src
				    var gSrc = $(this).attr('href');		    
								
					if ( $(this).hasClass('modal-inline') ){
					    // crea nuevo id
					    var newId = gSrc.replace( '#','' );
					    var newCss = '.'+newId;
						//Envuelvo
						var inlineWrap = $('<div/>', { "class" : "collapse" });
					    $( newCss ).wrap( inlineWrap );	 
				    	// encuentra el contenido oculto y reemplaza el id por clase.
				    	$( gSrc ).removeAttr('id').addClass( newId + ' p-2' );
						
					} else if ( $(this).hasClass('modal-image') ){
		
					    // agrego dato
					    $(this).attr('data-src', gSrc );	 			    
					    // modifico el src, convertir en #id, basado en la último parte de la url.	    
					    var urlLast = gSrc.substring(gSrc.lastIndexOf("/") + 1, gSrc.length);	    
					    // limpio caracteres
					    var setId = urlLast.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
					    // reemplazar el src
					    $(this).attr('href', '#'+setId );								
						
					} else if ( $(this).hasClass('modal-iframe') ){
		
						// agrego dato
					    $(this).attr('data-src', gSrc );	 			    		
					    // solo se limpiarán los caracteres
					    var setId = gSrc.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
					    // reemplazar el src
					    $(this).attr('href', '#'+setId );				
						
					} 		          
	          
	        });	//botones listos.
	        
	
	        $( linkClass ).on('click',function(){
	
				// declaro el nombre del modal que se va abrir
				var dataHref = $(this).attr('href') || null;
		        
					// si hay href="#nombreIndicador" establecer una nueva variable
					if ( dataHref != null ){
						// quitar el hashtag a #contenido para generar un id="" nuevo en el modal.			
						var hrefToid = dataHref.substr(1);
					}			        
				
				// por el tipo de clase CSS determino el recurso a utilizar
				var dataSrc = $(this).attr('data-src') || null;
				
		        // si hay titulo en el boton genero un modal con titulo 
				var attrTittle = $(this).attr('title') || null;		
		
				// Declaro mis espacios para insertar el tipo de elemento
		
		            var contenidoModal = ''; // acorde al tipo de contenido este campo se Agrega. 
		            
					var modalHtmlBody = $('<div/>',{ 'class':'modal-body', 'html': contenidoModal });						
					var modalHtmlContent = $('<div/>',{ 'class':'modal-content', 'html': modalHtmlBody });
					var modalHtmlDialog = $('<div/>',{ 'class':'modal-dialog modal-lg modal-dialog-centered', 'html': modalHtmlContent });						
					var modalHtmlWindow = $('<div/>',{'class':'modal window-'+ linkClass.substr(7) +' fade zoom', 'id': hrefToid, 'html': modalHtmlDialog });
					var modalHtml = modalHtmlWindow;
			
					var modalTitleX = $('<span/>',{'html':'&times;'});
					var modalTitleClose = $('<button/>',{'class':'close', 'type': 'button', 'data-dismiss': 'modal', 'html': modalTitleX });
					var modalFull = $('<button/>', { 'type':'button', 'class':'resize', 'html': $('<i/>', { 'class':'fas fa-expand'}) });				
					var modalTitleHeader = $('<div/>',{'class':'modal-header', 'html':[ modalFull, modalTitleClose ] });
					var modalTitle = modalTitleHeader;
			
					var modalFooterClose = $('<button/>',{'class':'btn btn-secondary', 'type': 'button', 'data-dismiss': 'modal', 'html':'Cerrar' });							
					var modalFooterFooter = $('<div/>',{'class':'modal-footer', 'html': modalFooterClose });							

					var modalFooter = modalFooterFooter;				
		
		    	// Precarga la ventana que contendra la informacion
			        $( 'body' ).append(modalHtml);
			        
			    	// Precarga el espacio del titulo
			        $('#' + hrefToid + ' .modal-content').prepend( modalTitle );	        	
		
			    	// Precarga el espacio del footer
			        $('#' + hrefToid + ' .modal-content').append( modalFooter );	        	
			        
			    	// Si hay titulo, Agrega un H4 en el espacio del titulo
			        if ( attrTittle != null ){
			            $('#' + hrefToid + ' .modal-content .modal-header').prepend( $('<h4/>', { 'class':'modal-title','html': attrTittle }) );	        	
			        }
			        
			        
		    	// Si el link tiene alguna de las clases, Agrega el contenido	        
			            	
					if ( linkClass == '.modal-iframe' ){
						
			            contenidoModal = $('<iframe/>', { 'frameborder':'0', 'scrolling':'yes', 'allowtransparency': 'true', 'src': dataSrc, 'width':'100%', 'height': '100%' });
		
			            $('#' + hrefToid + ' .modal-content .modal-body').html( contenidoModal );
		
					} else if ( linkClass == '.modal-image' ){

				        contenidoModal = $('<img/>', { 'class':'img-fluid', 'src': dataSrc });
		
			            $('#' + hrefToid + ' .modal-content .modal-body').html( contenidoModal );
		
					} else if ( linkClass == '.modal-inline' ){
						
					    contenidoModal = dataHref.replace( '#','.' );
						contenidoModal = $( contenidoModal ).clone();
						
			            $('#' + hrefToid + ' .modal-content .modal-body').html( contenidoModal );
		
					}  
		
					// Personalizo la medidas de las ventanas modal depende de si existe width, height en el boton.
					 
				    $( '#'+hrefToid ).on('show.bs.modal', function () {
				           
				         $(this).find('.modal-content').css({
				                  'padding':'0'
				          }); 
				           
				         $(this).find('.modal-body').css({
				                  'padding':'0'
				         });
				         
			         //Abr 27, después de añadir la clase auxiliar, le pedimos que ajuste las medidas del iframe. 
				         $('.window-iframe').find('.modal-body').css({
			                  // modal body hereda la altura de la ventana 
			                   'height': 100 * $(window).height() / 100 * 0.75
				         });
				         
				        // // feb2018 update: boton para cambiar la ventana de tamaño.
			        	$( '.resize' ).click(function(){
		        			$('.modal-open').toggleClass('modal-full');
			        	});

				    }); 	
		
				// Borrar ventana
				  	$( '#'+hrefToid ).on('hidden.bs.modal', function(){
				    	$(this).remove();
		        		$('body').removeClass('modal-full');
					});				
	
	
			});         
	                
		}				

	};
        
      // invocar los 2 tipos de modalbox que existen
	ekilinemodals.multipleModals( '.modal-iframe' );
	ekilinemodals.multipleModals( '.modal-image' );
	ekilinemodals.multipleModals( '.modal-inline' );

	
	
	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	ModalBox para galeria de imagenes
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/				
	
	$('.modal-gallery').each(function() {
	    // necesito diferenciar el objeto en cada caso
	    var getId = $(this).attr('id');
	    var rename = '#'+ getId + '.modal-gallery';
	    //console.log( rename );
        //Jun 5 ajuste cuando sea un carrusel
	    var isCarousel = $(this).hasClass( 'carousel' );
				
	    // agrega parametros de bootstrap
	    $( rename + ' a:not(.carousel-control-prev,.carousel-control-next)' ).attr({"data-toggle" : "modal","data-target" : "#galleryModal" });    
	        
	    $( rename + ' a:not(.carousel-control-prev,.carousel-control-next)' ).on('click',function(){
	        
	        var gallery = $( rename ).html();
	        	                
	        // var modalgallery = '';
	        // modalgallery += '<div class="modal fade zoom" role="dialog" id="galleryModal"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-body">';	                            
	        // modalgallery += '<div id="carousel-modal" class="carousel slide carousel-fade" data-ride="carousel" style="display:none;"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button><button type="button" class="resize"><i class="fas fa-expand"></i></button><ol class="carousel-indicators"></ol><div class="carousel-inner" role="listbox">'+ gallery +'</div><a class="carousel-control-prev" href="#carousel-modal" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-modal" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></a></div>';
	        // modalgallery += '</div></div></div></div>';
	        
	        //elementos centrales
			var mgClose = $('<button/>', { 'type':'button', 'class':'close', 'data-dismiss':'modal', 'html': $('<span/>', { 'aria-hidden':'true', 'html': '&times;' }) });				
			var fullSize = $('<button/>', { 'type':'button', 'class':'resize', 'html': $('<i/>', { 'class':'fas fa-expand'}) });				
			var mgLi = $('<ol/>', { 'class':'carousel-indicators' });
			var mgGal = $('<div/>', { 'class':'carousel-inner', 'role':'listbox', 'html': gallery });
	        //controles
			var pico = $('<span/>', { 'class':'carousel-control-prev-icon', 'aria-hidden':'true' });
			var pdes = $('<span/>', { 'class':'sr-only', 'aria-hidden':'true', 'html': 'Previous' });								
			var nico = $('<span/>', { 'class':'carousel-control-next-icon', 'aria-hidden':'true' });
			var ndes = $('<span/>', { 'class':'sr-only', 'aria-hidden':'true', 'html': 'Next' });
			var mgPre = $('<a/>', { 'class':'carousel-control-prev', 'href':'#carousel-modal', 'role':'button', 'data-slide':'prev'}).append( pico , pdes );
			var mgNex = $('<a/>', { 'class':'carousel-control-next', 'href':'#carousel-modal', 'role':'button', 'data-slide':'next'}).append( nico , ndes );      					
	        //el conjunto de carrusel
	        
	        var mgAll = $('<div/>',{ 'id':'carousel-modal', 'class':'carousel slide carousel-fade', 'data-ride':'carousel', 'style':'display:none;'}).append( mgClose , fullSize , mgLi , mgGal, mgPre, mgNex );
	        	        
        	var modalgallery = $('<div/>', { 'class':'modal window-gallery fade zoom', 'id': 'galleryModal', 'role':'dialog', 'html': $('<div/>', { 'class':'modal-dialog modal-lg modal-dialog-centered','html': $('<div/>', { 'class':'modal-content','html': $('<div/>', { 'class':'modal-body','html': mgAll }) }) }) });
	        
	        $( modalgallery ).modal('show');
	        	        	         
	        // saber a que elemento le dio click     
	        // var nc = $(this).index( rename + ' a' ); 	        
	        // feb2018 update: al crear un boton de enlaces debo identificar el objeto padre para tener un conteo efectivo.
	        var nc = $(this).closest( '.gallery-item' ).index();
	        // console.log(nc);
	        //Jun 5 ajuste cuando sea un carrusel
	        if (isCarousel){ nc = '0'; };
         	
	        // Ejecuta las variables para activarse
	        $('body').on('shown.bs.modal', function(){
	        		        		        		        	
		        // // feb2018 update: boton para cambiar la ventana de tamaño.
	        	$( '.resize' ).click(function(){
        			$('.modal-open').toggleClass('modal-full');
	        	});

	            $('.carousel').carousel({ swipe: 100 });	
	            // Oculto el preformato de la operación y luego la presento L591 : style="display:none;    	    
	            $('.carousel').css('display','block');	    	    
	                      
	            // busco cada item y limpio las clases reemplazandola por item.
	            $(this).find('#galleryModal .carousel-item').removeClass().addClass('carousel-item');
	            
	            // busco el link original y guardo la dirección en una variable para cuando elacen la imagen pequeña, se muestre la grande
		            $(this).find('#galleryModal figure a img').each(function(){
		            	//console.log(this);
			            var url = $(this).parent('a').attr('href');
			            //console.log(url);
			            // Enero, transformamos todas las imagenes en responsivas
			            //var img = '<img class="img-fluid" src="'+url+'" />';
			            var img = $('<img/>', { 'class':'img-fluid', 'src': url });
			            // console.log(img);
			            $(this).replaceWith(img);
		            });
		        
		        // Busco el renglon de texto y le añado la clase carousel-caption
	            //$(this).find('#galleryModal .carousel-item .gallery-caption').addClass('carousel-caption'); 
	            $(this).find('#galleryModal .gallery-caption').addClass('carousel-caption'); 
	            
	            
	            // busco elmentos que no necesito y los elimino
	            $(this).find('#galleryModal .w-100,#galleryModal .caption-button').remove();
	            $(this).find('#galleryModal figure').removeClass().addClass('text-center carousel-item');

	    	        //Jun 5 ajuste cuando sea un carrusel
	            	if (isCarousel){
	            		$(this).find('#carousel-modal .carousel-inner > div figure img').unwrap().unwrap().unwrap();// esto se hace cada que un envoltorio anida el objeto
		            	$(this).find('#galleryModal .carousel-inner > .carousel-control-prev').remove();
		            	$(this).find('#galleryModal .carousel-inner > .carousel-control-next').remove();
		            	$(this).find('#galleryModal .carousel-inner > .carousel-inner').unwrap();
		            	$(this).find('#galleryModal .carousel-item > img').nextAll('img').remove();
		            	$(this).find('#galleryModal .carousel-item > figcaption').nextAll('figcaption').remove();
	            	}
	
	            // busca los slides para hacer un índice.
	            var slides = $('body').find('#galleryModal').find('.carousel-item');
	            //console.log(slides);
	                        
	            // saca el total de elmentos que existen.
	            var ns = slides.length;
	            //console.log('hay ' + ns);
	            
	            // limpio los contadores del carrusel (se queda un registro)
	            $(this).find('#galleryModal .carousel-indicators li').remove();            
	            // creo el loop de contadores            
	            for (var i=0; i<ns; i++) {
	                // console.log('intento ' + i);
	                //$(this).find('#galleryModal .carousel-indicators').append('<li data-target="#carousel-modal" data-slide-to="'+i+'"></li>');
	                $(this).find('#galleryModal .carousel-indicators').append( $('<li/>', { 'data-target':'#carousel-modal', 'data-slide-to': i }) );	                
	            }            
	            
	            // al primer slide activalo
	            //slides.first().addClass('active');
	            // al primer indicador activalo
	            //$(this).find('#galleryModal .carousel-indicators li').first().addClass('active');
	            
	            // de acuerdo al elmento que dio clic, habilitalo.
	            $( slides.eq( nc ) ).addClass('active');
	            $(this).find('#galleryModal .carousel-indicators li').eq( nc ).addClass('active');
	                     
	        }); // fin de activacion
	        
	        // Borrar registro del modal
	        $('body').on('hidden.bs.modal', function(){
		        // feb2018 update: boton para cambiar la ventana de tamaño.
        		$( this ).removeClass('modal-full');
	          	$( '#galleryModal.modal, .modal-backdrop' ).remove();		          	          
	        }); 
	        	 
	   });  
		
	}); // fin modal-gallery function
	

	/** * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
	 * 
	 *	Utilidades: 
	 *  a) compartir vía redes sociales.
	 *  b) scroll suave al subir
	 * 
	 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * **/				
	    $('.shortcode-socialsharemenu .nav-link').click(function(e) {
	        e.preventDefault();
	        window.open( $(this).attr('href'), 'ShareContent', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	        return false;
	    });

		$('.goTop').click(function() {
		  $('html, body').animate({ 
		  	scrollTop:0 }, 'slow');		
		});
	    

			
}); 			