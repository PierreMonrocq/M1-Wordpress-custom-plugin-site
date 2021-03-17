<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
the_post();
get_header();
?>
<div class="breadcrumb-info">
<div class="pi-inner" style="background-image: url(' <?php echo get_template_directory_uri() ?>/img/africa.jpg');">>
		<div class="container">
			<div class="bread">
			<h1><?php wp_title(''); ?></h1>
			<div class="site-breadcrumb">
				<a href="<?= home_url() ?>">Accueil</a> <i class="fa fa-angle-right"></i>
				<span><?php wp_title(''); ?></span>
			</div>
			</div>
		</div>
	</div>
</div>

		<main id="main" class="site-content">
			<div class="container content-block">
				<h1>Se connecter</h1>
			<?php
				wp_login_form( array('redirect' => home_url(),'label_username'=>"Adresse email") );
					
			?>
			<a class="connect" href="<?= home_url() . "/register"?>">Pas de compte ? s'inscrire</a>
			</div>
		</main><!-- #main -->

<?php
get_footer();
