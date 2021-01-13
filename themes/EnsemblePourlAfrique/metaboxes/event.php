<?php

class EventMetabox{

    const META_KEY_date = 'theme_event_date';
    const NONCE = '_theme_article_event_nonce';

    public static function register(){
        add_action('add_meta_boxes', [self::class,'add'],10,2);
        add_action('save_post',[self::class,'save']);
        add_action('admin_enqueue_scripts', [self::class,'registerScripts']);
    }

    public static function registerScripts(){
        wp_register_script('flatpickr',get_template_directory_uri().'/scripts/flatpickr.js',[],false,true);
        wp_register_style('flatpickr',get_template_directory_uri().'/css/flatpickr.min.css',[],false);
        wp_enqueue_script('admin_date_theme',get_template_directory_uri().'/scripts/date_admin.js',['flatpickr'],false,true);
        wp_enqueue_style('flatpickr');
    }


    public static function add($postType,$post){
        if($postType === 'event' && current_user_can('publish_post', $post)){
            add_meta_box(self::META_KEY_date,'Organisation de l\'événement', [self::class, 'render'],'event');
        }
    }

    public static function save($post){
        if(array_key_exists(self::META_KEY_date,$_POST) &&
         current_user_can('publish_post', $post) &&
         wp_verify_nonce($_POST[self::NONCE], self::NONCE)){
            if($_POST[self::META_KEY_date] === '0'){
                delete_post_meta($post, self::META_KEY_date);
            }else{
                update_post_meta($post, self::META_KEY_date, $_POST[self::META_KEY_date]);
            }
        }
    }

    public static function render($post){
        $value = get_post_meta($post->ID, self::META_KEY_date,true);
        wp_nonce_field(self::NONCE,self::NONCE);
    ?>  
        <p>Date de l'événement:</p>
        <input type="text" name="<?=self::META_KEY_date?>" value="<?= $value ?>" class="datepicker">
        <p>Horaire:</p>
        <input class="flatpickr flatpickr-input heurepicker" type="text" placeholder="Selectionner un horaire..">
        <p>Lieu:</p>
        <input type="text" placeholder="Lieu du rendez-vous">
    <?php
    }
}