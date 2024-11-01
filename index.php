<?php
/*
Plugin Name: Skysa Facebook Like App
Plugin URI: http://wordpress.org/extend/plugins/skysa-facebook-like-app
Description: Let a visitor share your content with friends on Facebook.
Version: 1.4
Author: Skysa
Author URI: http://www.skysa.com
*/

/*
*************************************************************
*                 This app was made using the:              *
*                       Skysa App SDK                       *
*    http://wordpress.org/extend/plugins/skysa-app-sdk/     *
*************************************************************
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) exit;

// Skysa App plugins require the skysa-req subdirectory,
// and the index file in that directory to be included.
// Here is where we make sure it is included in the project.
include_once dirname( __FILE__ ) . '/skysa-required/index.php';


// Facebook Like APP
$GLOBALS['SkysaApps']->RegisterApp(array( 
    'id' => '501c1cc99705d',
    'label' => 'Facebook Like',
	'options' => array(
		'option3' => array( // key is the field name
            'label' => 'What URL would you like shared?',
			'info' => 'Leave this blank to share the page URL. Set this to the URL of a Facebook fan page to allow people to become a fan of that page instead of a website.',
			'type' => 'text',
			'value' => '',
			'size' => '50|1'
		),
        'option2' => array(
            'label' => 'Button color scheme',
            'info' => 'Enter a URL for the an Icon Image. (You can leave this blank for none)',
			'type' => 'selectbox',
			'value' => 'light|dark',
			'size' => '40|1'
        )
	),
    'html' => '<div><iframe id="fbframe-$app_id" src="" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px; margin: 5px 3px 0 3px;" allowTransparency="true"></iframe></div>',
    'js' => "
        S.on('load',function(){
            var fblb = document.getElementById('fbframe-\$app_id');
            var fblurl = '\$app_option3';
            if(fblurl == '') fblurl = window.location.href; 
            if(fblb){
            fblb.src = '//www.facebook.com/plugins/like.php?href='+escape(fblurl)+'&layout=button_count&show_faces=true&width=90&action=like&colorscheme=\$app_option2&height=21';
            }
        });
     "
));
?>