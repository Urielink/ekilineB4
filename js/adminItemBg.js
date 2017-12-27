/**
 * adminEditor.js
 *
 * Dic 15 2017, layouts o grid:
 * Casos de estudio
 * https://stackoverflow.com/questions/24695323/tinymce-listbox-onsubmit-giving-object-object-rather-than-value
 * https://stackoverflow.com/questions/23476463/wordpress-tinymce-add-a-description-to-a-popup-form
 * 
 * Oficial tinyMce.
 * https://www.tinymce.com/docs/advanced/creating-custom-dialogs/
 * https://www.tinymce.com/docs/demo/custom-toolbar-listbox/
 * 
 * Ejemplo de dialogo
 * https://jsfiddle.net/aeutaoLf/2/
 *
 */

( function ( $ ) {
    tinymce.PluginManager.add('custom_mce_button4', function(editor, url) {
    	
        editor.addButton('custom_mce_button4', {
            //icon: false,
            //text: 'B4 Cols',
            title : 'Agregar fondo',
            image: '../wp-content/themes/ekiline/img/ico-bg.png',
            onclick: function (e) {
            	
                editor.windowManager.open({
                	
                    title: 'Elige una imagen o color de fondo',
                    minWidth: 500,
                    minHeight: 100,

                    body: [
                    // item 1, el selector de color: cachamos el valor de color en un campo de texto oculto.
						{
                        	type	: 'textbox',
                        	name	: 'colorselect',
                        	id		: 'colorVal',
                    	},
				        {
				            type   : 'colorpicker',
				            name   : 'colorpicker',
				            id	:    'colorInput',	
				            //label  : 'Color',
                        	onchange : function(e) {
                        		jQuery( function($){
	                                e.preventDefault();
                            			// var txtColor = jQuery('#colorVal');
		                                // txtColor.val();	                        		                 					                        		
		                                console.log('colorpicker');
                        		});
                        		
                        	}
				            
				        },

						/** item 2, el selector de imagen
						 * explorar: https://stackoverflow.com/questions/32705935/wordpress-tinymce-window-manager-upload-button-not-adding-url-to-text-field
						 * http://archive.tinymce.com/wiki.php/API3:method.tinymce.dom.DOMUtils.setStyle
						 * https://www.tinymce.com/docs-3x/api/dom/class_tinymce.dom.Selection.html/#selection
						 * https://www.tinymce.com/docs-3x/reference/configuration/Configuration3x@selector/
						 * https://jsfiddle.net/aeutaoLf/2/
						 * ***** https://stackoverflow.com/questions/26263597/open-access-wp-media-library-from-tinymce-plugin-popup-window 
						 * https://wordpress.org/support/topic/using-media-upload-with-tinymce/ 
						 * **/

						// Item 2, cachamos el valor de la imagen (url) en un campo de texto oculto.
						{
                        	type	: 'textbox',
                        	subtype	: 'hidden',
                        	name	: 'url',
                        	id		: 'imageVal'
                    	},
                    	{
                        	type	: 'button',
                        	name	: 'image',
                        	text	: 'Imagen',
                        	onclick	: function(e) {

	                            jQuery( function($){
	
	                                var frame;
	
	                                // ADD IMAGE LINK
	                                e.preventDefault();

	                                // If the media frame already exists, reopen it.
	                                if ( frame ) {
	                                    frame.open();
	                                    return;
	                                }
	
	                                // Create a new media frame
	                                frame = wp.media({
	                                    title	: 'Seleccionar imagen de fondo',
	                                    button	: {
	                                      text	: 'Colocar'
	                                    },
	                                    multiple: false  // Set to true to allow multiple files to be selected
	                                });
	
	                                // When an image is selected in the media frame...
	                                frame.on( 'select', function() {
	
	                                    // Get media attachment details from the frame state
	                                    var attachment = frame.state().get('selection').first().toJSON();
                            			var hidden = jQuery('#imageVal');
                            			
		                                hidden.val( attachment.url );
							
	                                });
	                                // Finally, open the modal on click
	                                frame.open();
	                        });
                        
	                        return false;
	                        
	                        }
	                    }

// fin item 2			        
                	],                    	
                    onsubmit: function (e) {
                        //editor.insertContent( '<div style="min-width:100px;height:50px;background-color:' + e.data.colorpicker + ';"> color: ' + e.data.colorpicker + ' </div>' );
                        
                        //http://archive.tinymce.com/wiki.php/API3:method.tinymce.dom.DOMUtils.setAttrib
                        //tinymce.activeEditor.dom.setAttrib( tinymce.activeEditor.dom.select('div'), 'style', 'background-color:' + e.data.colorpicker );
                        
                        // obtener el elemento donde esta el cursor http://archive.tinymce.com/wiki.php/api4:class.tinymce.dom.Selection
                        //alert(tinymce.activeEditor.selection.getNode().nodeName);

                        //v1//tinymce.activeEditor.dom.setAttrib(tinymce.activeEditor.selection.getNode(), 'style', 'background-color:' + e.data.colorpicker );
                        //tinymce.activeEditor.dom.setStyle( tinymce.activeEditor.selection.getNode(), 'background-color' + e.data.colorpicker );
                        
                        //v2 > bueno: http://archive.tinymce.com/wiki.php/API3:method.tinymce.dom.DOMUtils.setStyle
                        
                        colorItem =  tinymce.activeEditor.selection.getNode();
                        
                        tinymce.activeEditor.dom.setStyle( colorItem , 'background-color', e.data.colorpicker );
                                                
                        if (e.data.url !== null && e.data.url !== ''){
	                        tinymce.activeEditor.dom.setStyle( colorItem , 'background-image', 'url("'+ e.data.url +'")' );
                        }
                        
                    }
                    
                }); //editor.windowManager.open
                
            }
        });
    });
} )( jQuery );