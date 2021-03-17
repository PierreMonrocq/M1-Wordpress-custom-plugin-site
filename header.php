<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <?php wp_head() ?>
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico"/>
</head>
<body>
<nav class="navbar navbar-expand-lg" id="main_nav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="<?= home_url() ?>">
          <img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="logo">
            Ensemble Pour l'Afrique
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-bars" style="color:#000; font-size:28px;"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <?php wp_nav_menu([
              'theme_location' => 'header',
              'container' => false,
              'menu_class' => 'navbar-nav ml-auto'
              ]);
              ?>
              <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn text-nowrap" type="button">Faire un don</button>
                  </li>
                  <?php if (!check_user_role(array('subscriber','administrator'))) {?>
                  <li class="nav-item">
                  <button class="btn-underligned text-nowrap" type="button">S'abonner</button>
                  </li>
                  <?php  } ?>
                </ul>
              
          </div>
        </div>
      </nav>