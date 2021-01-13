<?php

class ReunionPage{

    const GROUP = 'reunion_options';

    public static function register(){
        add_action('admin_menu',[self::class,'addMenu']);
        //add_action('admin_init',[self::class, 'registerSettings']);
    }

    // public static function registerSettings(){
    //     register_setting(self::GROUP, 'reunion_org');
    //     add_settings_section('reunion_options_section','Paramètres', function(){
    //         echo "Gerer ici les paramètres liés aux reunions";
    //     },self::GROUP);

    // }

    public static function addMenu(){
        add_menu_page("Gestion des reunions", 'Reunion',"manage_options", self::GROUP, [self::class, 'render'], 
    'dashicons-megaphone',3);

    }

    public static function render(){
        ?>
        <h1>Gestion des reunions</h1>
        <form action="options.php" method="post">
            <?php 
                //settings_fields(self::GROUP);
             //do_settings_section(self::GROUP);
             submit_button() ?>
        </form>
        <?php
    }
}

?>