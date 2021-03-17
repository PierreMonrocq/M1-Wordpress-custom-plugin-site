<div class="comments">
<?php 
    $count = absint(get_comments_number());
?>

<?php if($count > 0): ?>
<h2><?= $count ?> Commentaire<?= $count > 1 ? 's' : '' ?></h2>
<?php else: ?>
<h2>Laisser un commentaire</h2>
<?php endif ?>
<?php if(comments_open()): ?>
<?php comment_form(
	array(
        'title_reply' => '',
		'must_log_in'			=> '<p class="must-log-in">'.  sprintf( esc_html__( '%1$sEnregistrez-vous%2$s pour poster un commentaire.', 'epa' ), '<a href="'. wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) .'">', '</a>' ) .'</p>',
		'logged_in_as'			=> '<p class="logged-in-as">'. esc_html__( 'Connecté(e) en tant que ', 'epa' ) .' <a href="'. admin_url( 'profile.php' ) .'">'. $user_identity .'</a>, <a href="' . wp_logout_url( get_permalink() ) .'" class="logout" title="'. esc_html__( 'Se déconnecter de ce compte', 'epa' ) .'">'. esc_html__( 'déconnexion', 'epa' ) .'</a></p>',
		'comment_notes_before'	=> false,
		'comment_notes_after'	=> false,
		'comment_field'			=> '<div class="comment-textarea"><textarea name="comment" id="comment" cols="39" rows="4" tabindex="100" class="textarea-comment" placeholder="'. esc_html__( 'Votre commentaire ici...', 'epa' ) .'"></textarea></div>',
		'class_submit'				=> 'btn',
		'label_submit'			=> esc_html__( 'Poster un commentaire', 'epa' ),
			
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'url' => ''
				
			) //fields array
		) //apply_filters
	)//comment form args array
); //comments form function brackets
?>
<?php endif ?>
<div class="container list-comment">
    <?php wp_list_comments()?>
    <?php paginate_comments_links() ?>
</div>

</div>