<?php
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
		<div class="article-section">
			<div class="container">
				<div class="row second-container row-cols-1 row-cols-sm-2 row-cols-md-3">
					<?php
					$custom_query = new WP_Query( 
						array(
							'post_type' => array('lettre', 'event', 'post','articles'),
							'posts_per_page' => 12
						) 
					);
					
					if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post();
					?>
					
					<div class="col-sm-6 col-md-4 card-sp">
					<a class="card-click" href="<?php the_permalink() ?>">
					<div class="ar-item">
						<div class="ar-thumb bg" style="background-image: url(' <?php if (has_post_thumbnail()){
							echo get_the_post_thumbnail_url();
						}else{
							echo get_template_directory_uri() . "/img/placeholder.png);";
						}
						
						?>');"></div>
						<div class="ar-content">
							<?php 
							$categories = get_the_category();
								if(! empty( $categories )) {
									foreach ( $categories as $category ) :?>
										<p href="#" class="letter-category"><?php echo $category->name;?></p> 
									<?php
								   endforeach;
								}
								$post_type = get_post_type(); 
								if ($post_type == 'lettre') {
									?>
									<p href="#" class="letter-category"><?php echo "Lettre d'information"?></p> 
								<?php
								} 
								
								?>
							
							<p class="evenement-info">Le <?= get_the_date() ?> <?php echo get_comments_number() > 0 ? " - " : ''; comments_number('')?></p>
							<h4><?php echo wp_trim_words( the_title(), 9, '...' ) ?></h4>
							<div class="ar-author">Par <?php the_author() ?></div>
							
							
						</div>
					</div>
					</a>
				</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
    	</main>


<?php
get_footer();
