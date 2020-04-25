<?php
/**
 * @package Yelp-Fusion-Reviews
 */
/*
 * Plugin Name: Yelp Fusion Reviews 
 * Plugin URI: github directory
 * Description: Creating a plugin to interact with Yelp Fusion API to gather yelp's information on your business.
 * Version: 1.0.0
 * Author: Paul "lilpkstud" Kwon
 * Author URI: http://paulskwon.com
 * License: GPLv2 or later
 * Text Domain: hi
 */

/*
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
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die('Hrmmm...you should not be viewing this file');

class YelpFusionReviewsPlugin{
    
    function __construct(){
        add_action('init', array($this, 'custom_post_type'));
    }
    function activate(){
        //Generate a Customer Post Type
        $this->custom_post_type();
        //Flush rewrite-rules
        flush_rewrite_rules();
    }

    function deactivate(){
        //flush reswrite rules
        echo "Deactivate";
    }

    function uninstall(){
        // delete Customer Post Type
    }

    function custom_post_type(){
        register_post_type('book', [
            'public' => true, 
            'label' => 'Books',
            //'capability_type' => 'post'
        ]);
    }

}

if(class_exists('YelpFusionReviewsPlugin')){
    $user = new YelpFusionReviewsPlugin();
}

//Activate Plugin
register_activation_hook(__FILE__, array($user, 'activate'));

//Deactive Plugin
register_deactivation_hook(__FILE__, array($user, 'deactivate'));

//Unistall Plugin
register_uninstall_hook(__FILE__, array($user, 'uninstall'));