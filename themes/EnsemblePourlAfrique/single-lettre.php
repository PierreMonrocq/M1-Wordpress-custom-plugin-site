<?php get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $id = get_the_ID()?>
        <div class="container article">
		<span class="letter-category">Lettre d'information</span>
		<h1><?php the_title() ?></h1>
        <p class="evenement-info">Le <?php the_date() ?> - <?php comments_number() ?></p>

            <img class="img-article" src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:70%; height:auto;">
            <div class="container text-justify article-text">
            
                <?php the_content() ?>
                <p class="signature">— <?php the_author() ?></p>
                
            </div>
           
                
            <?php 
                if(comments_open() || get_comments_number()){
                    comments_template();    
                }
            ?>

        <section class="article-section">
            <div class="section-title">
                <span>Lire plus</span>
                <h2>Articles relatifs</h2>
                </div>
                <div class="row">
                 <?php $args = array(
                    'post_type' =>'lettre',
                    'posts_per_page' => 3,
                ); 
                
                $recent_posts = wp_get_recent_posts($args);
                foreach ( $recent_posts as $recent ) :
                    if($recent["ID"] != $id){
                        $url = $recent['guid'];
                    ?>
                    <div class="col-sm-4 mx-auto">
                        
					<a class="card-click" href="<?= $url  ?>">
					<div class="ar-item">
						<div class="ar-thumb bg" style="background-image: url(' <?php if (has_post_thumbnail($recent['ID'])){
							echo get_the_post_thumbnail_url($recent['ID']);
						}else{
							echo get_template_directory_uri() . "/img/placeholder.png);";
						}
						
						?>');"></div>
						<div class="ar-content">
							<?php 
							$categories = get_the_category($recent['ID']);
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
                            <p class="evenement-info">Le <?= get_the_date('',$recent['ID']) ?>
							<h4><?php echo wp_trim_words( $recent['post_title'], 9, '...' ) ?></h4>
							<div class="ar-author">Par <?= get_the_author_meta( 'nicename', $recent['post_author']);  ?></div>
							
							
						</div>
					</div>
					</a>
                    </div>
                <?php
                    }
                endforeach;
                ?>
            </div>
        </div>


<?php endwhile;
endif; ?>

<?php get_footer() ?>