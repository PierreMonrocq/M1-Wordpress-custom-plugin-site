
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
							<p class="evenement-info">Le <?php the_date() ?> <?php echo get_comments_number() > 0 ? " - " : ''; comments_number('')?></p>
							<h4><?php echo wp_trim_words( the_title(), 9, '...' ) ?></h4>
							<div class="ar-author">Par <?php the_author() ?></div>
							
							
						</div>
					</div>
					</a>