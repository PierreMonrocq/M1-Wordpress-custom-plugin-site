<?php get_header();?>

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
		<div class="article-section">
		<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="entry">
						<?php the_content(); ?>
					</div><!-- entry -->
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
		</div>
    	</main>

<?php get_footer() ?>

