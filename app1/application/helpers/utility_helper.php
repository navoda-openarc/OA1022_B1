<?php

    function assets_url(){
        return base_url() . 'assets/';
    }

    function css_url(){
        //return assets_url() . 'css/';
        return base_url() . 'assets/css/';
    }

    function images_url(){
        return assets_url() . 'images/';
    }

?>