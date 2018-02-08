<?php

// This file is based on wp-includes/js/tinymce/langs/wp-langs.php

if ( ! defined( 'ABSPATH' ) )
    exit;

if ( ! class_exists( '_WP_Editors' ) )
    require( ABSPATH . WPINC . '/class-wp-editor.php' );

function ekiline_tinymce_translation() {
    $strings = array(
    //adminShowgrid.js
        'showgrid' => __('Show grid', 'ekiline'),
    //adminItemBg.js
        'addbackground' => __('Add background', 'ekiline'),
        'choosebgcolor' => __('Choose a background color or set an image', 'ekiline'),
        'image' => __('Image', 'ekiline'),
        'choosebgimg' => __('Choose background image', 'ekiline'),
        'choose' => __('Choose', 'ekiline'),
        'bgstyle' => __('Background style', 'ekiline'),
        'pattern' => __('Pattern', 'ekiline'),
        'simple' => __('Simple', 'ekiline'),
        'responsive' => __('Responsive', 'ekiline'),
        'fixed' => __('Fixed', 'ekiline'),
        'parallax' => __('Parallax', 'ekiline'),
    //adminSubgrid.js
        'addcols' => __('Add columns', 'ekiline'),
        'col' => __('Column', 'ekiline'),
        'colspec' => __('Each column is inserted by proportion', 'ekiline'),
        'insertgmap' => __('Insert Google map','ekiline'),
        'pastegmap' => __('Paste link generated by google maps','ekiline'),
        'changeheight' => __('Replace height map','ekiline'),
    //adminTabs.js
        'addtabs' => __('Insert Tabs','ekiline'),
        'tabdesc' => __('Number the necessary tabs','ekiline'),
        'tabtitle' => __('Title this tab','ekiline'),
        'tabcont' => __('Add any content with format, text, images, video or galleries','ekiline'),
    //adminToggle.js
        'addtoggle' => __('Toggle item','ekiline'),
        'togdesc' => __('Insert a single toggle item o multiple accordion items','ekiline'),
        'togset' => __('Set number','ekiline'),
        'togtitle' => __('Title this toggle item','ekiline'),
        'togcont' => __('Add any content with format, text, images, video or galleries','ekiline'),
    //adminPops.js
        'addtooltips' => __('Tooltips','ekiline'),
        'ttiptitlex' => __('Create a tooltip or popover','ekiline'),
        'ttipdesc' => __('By default you set a tooltip adding only title and position. If you fill all fields tooltip transforms to popover.','ekiline'),
        'tttitle' => __('Set title to item','ekiline'),
        'ttdesc' => __('Set description to item','ekiline'),
        'ttplace' => __('Add your content','ekiline'),
        'ttcheck' => __('Allow HTML content','ekiline'),
        'ttpos' => __('Set position to show pop item','ekiline'),
        'top' => __('top','ekiline'),
        'right' => __('right','ekiline'),
        'bottom' => __('bottom','ekiline'),
        'left' => __('left','ekiline'),
    //adminShare.js
        'share' => __('Social tools','ekiline'),
        'sharelabel' => __('Social links and more','ekiline'),
        'sharetext' => __('Choose a shortcode to enhance your page','ekiline'),
        'socialnet' => __('Your social links nav','ekiline'),
        'socialshare' => __('Share nav for visitors','ekiline'),
        'loginform' => __('Insert a login form','ekiline'),
    //adminShare.js
        'modcat' => __('Entries module','ekiline'),
        'modcatdesc' => __('Choose category and format for show entries','ekiline'),
        'default' => __('Default','ekiline'),
        'block' => __('Block','ekiline'),
        'carousel' => __('Carousel','ekiline'),
        'amount' => __('Set the amount of posts','ekiline'),
    //adminFields.js
        'helpterms' => __('Custom fields','ekiline'),
        'helpdesc' => __('Choose and copy the value that you need','ekiline'),
        'ctitle' => __('Replace meta title','ekiline'),
        'cmdes' => __('Replace meta description','ekiline'),
        'ccss' => __('Add css style','ekiline'),
        'cjs' => __('Add js script','ekiline'),
        'addcfname' => __('Set custom field with:','ekiline'),
    //adminModal.js
        'addmodal' => __('Modal box','ekiline'),
        'modaltitle' => __('Create a modalbox with custom content','ekiline'),
        'modaldesc' => __('Assign modal on selected item, set title and edit content','ekiline'),
        'mbxtitle' => __('Set title to modal window','ekiline'),
        'mbxdesc' => __('Add modal content','ekiline'),
    	// '' => __('','ekiline')
    );
    $locale = _WP_Editors::$mce_locale;
    $translated = 'tinyMCE.addI18n("' . $locale . '.ekiline_tinymce", ' . json_encode( $strings ) . ");\n";

     return $translated;
}

$strings = ekiline_tinymce_translation();