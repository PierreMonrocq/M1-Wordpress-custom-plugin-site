<?php get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $id = get_the_ID()?>
        <div class="container article">
		<span class="letter-category"><?php foreach((get_the_category()) as $category){
        echo $category->name."<br>";
        }	?> </span>
		<h1><?php the_title() ?></h1>
        <p class="evenement-info">Le <?php the_date() ?> - <?php comments_number() ?></p>

            <img class="img-article" src="<?php the_post_thumbnail_url(); ?>" alt="" style="width:70%; height:auto;">
            <div class="container text-justify">
            
                <?php the_content() ?>
                
            </div>
           
                
            <?php 
                if(comments_open() || get_comments_number()){
                    comments_template();    
                }
            ?>
        </div>


<?php endwhile;
endif; ?>

<?php get_footer() ?>