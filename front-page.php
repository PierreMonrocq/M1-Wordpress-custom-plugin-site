<?php get_header()?>

<header class="text-white" style="background-image: url(' <?php echo get_template_directory_uri() ?>/img/africa.jpg);'"></div>>
        <div class="container text-center">
            <p class="lead">Une seule ambition</p>
            <h1>Agir ensemble pour l'Afrique</h1>
            <?php if(!is_user_logged_in()){ ?>
            <a href="<?= home_url() ?>/register" class="btn" type="button">Nous rejoindre</a>
            <?php } ?>
        </div>
      </header>
    <section class="services">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="service">
						<h4>Connaissances<i class="fa fa-book"></i></h4>
						<p>La connaissance c'est le pouvoir d'agir. <br> Par le partage de connaissances en tout genre sur le sujet, nous souhaitons permettre à d'autres personnes de nous aider dans notre démarche!</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="service">
						<h4>Fraternité<i class="fa fa-heart"></i></h4>
						<p>Aider son prochain est au coeur de notre association. <br> Et plus que jamais en ces temps difficiles, nous devons nous serrer les coudes. </p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="service">
						<h4>Hébergement<i class="fa fa-home"></i></h4>
						<p>Nous trouvons des hébergements à tout étudiant africain dans le besoin.<br>N'ayez pas peur de demander, nos portes sont toujours ouvertes !</p>
					</div>
				</div>
			</div>
		</div>
    </section>
    <?php if (!check_user_role(array('subscriber','administrator'))) {?>
    <section class="association-section">
		<div class="container">
			<div class="row">
				<div class="container">
          <h3>Devenez un membre de l'association dès maintenant</h3>
          <div class="association-submit">
            <a href="#" class="btn-underligned text-nowrap">S'abonner</a>
          </div>
				</div>
			</div>
		</div>
	</section>
  <?php  } ?>
    <section class="lettre-section">
		<div class="section-title">
			<span>Un mot de la présidente</span>
			<h2>Lettre d'information</h2>
		</div>
		<div class="lettre-form">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-md-offset-6">
						<div class="lettre-content">
            <?php $args = array(
                    'post_type' =>'lettre',
                    'posts_per_page' => 1
                ); 
                
                $recent_posts = wp_get_recent_posts($args)[0];
              ?>
							<h2><?= $recent_posts['post_title']?></h2>
							<ul class="lettre-info">
                                <li>Le<span> <?= get_the_date('',$recent_posts['ID']) .' à '. get_the_time('',$recent_posts['ID'])?></span></li>
								<li>Par <span><?= get_the_author_meta( 'nicename', $recent_posts['post_author'] );?></span></li>
							</ul>
              <div><?php echo wp_trim_words( $recent_posts['post_content'], 100, '...' )?></div>
                            <a href="<?= $recent_posts['guid']?>" class="more">Lire la suite, laisser un commentaire <i class="fa fa-angle-double-right"></i></a>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="lettre-bg bg" style="background-image: url(' <?= get_the_post_thumbnail_url( $recent_posts["ID"])?>');"></div>
                    </div>
				</div>
			</div>
		</div>
    </section>
    <section class="evenement-section">
        <div class="section-title">
			    <span>S'impliquer dans l'association</span>
			    <h2>événements à venir</h2>
        </div>
        <div class="container">
        <div class="row">
        <div class="evenement-list">
          <div class="evenement-item">
            <div class="row">
              <div class="col-md-8">
                <div class="evenement-content">
                  <div class="evenement-header">
                    <div class="evenement-date">
                      <h2>21</h2>
                        avr
                    </div>
                    <h3>Assemblée générale de l'association </h3>
                    <div class="evenement-infos">
                      <div class="evenement-info"><i class="fa fa-calendar-plus-o"></i> Mercredi 21 Avril à 15h00</div>
                      <div class="evenement-info"><i class="fa fa-map-marker"></i> 10 Avenue Paul Appell, 75014 Paris</div>
                    </div>
                  </div>
                  <p>L'ordre du jour est l'actuelle crise sanitaire mondiale, et plus particulièrement ses effets sur le continent africain. Nous parlerons des solutions possibles pour l'association dans le but de pouvoir aider à notre échelle (notamment pour les étudiants africains bloqués sans ou avec peu de ressources).</p>
                  <a href="#" class="more">En savoir plus <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="evenement-bg bg" style="background-image: url(' <?php echo get_template_directory_uri() ?>/img/4.jpg);'">></div>
              </div>
            </div>
          </div>
          <div class="evenement-item">
            <div class="row">
              <div class="col-md-4">
                <div class="evenement-bg bg" style="background-image: url(' <?php echo get_template_directory_uri() ?>/img/1.jpg);'">></div>
              </div>
              <div class="col-md-8">
                <div class="evenement-content">
                  <div class="evenement-header">
                    <div class="evenement-date">
                      <h2>8</h2>
                        mai
                    </div>
                    <h3>Présentation de volontariat au Ghana</h3>
                    <div class="evenement-infos">
                      <div class="evenement-info"><i class="fa fa-calendar-plus-o"></i> Lundi 8 Mai à 17h00 </div>
                      <div class="evenement-info"><i class="fa fa-map-marker"></i> 10 Avenue Paul Appell, 75014 Paris</div>
                    </div>
                  </div>
                  <p>Cette session sera l'occasion de vous présenter notre prochaine mission au Ghana, mission pour laquelle nous recherchons des bénévoles. Au cours de cette séance nous répondrons à toutes les questions concernant la mission (incluant les conditions du bénévolat), et seront aussi fournis des formulaires d'inscription pour le bénévolat. </p>
                  <a href="#" class="more">En savoir plus <i class="fa fa-angle-double-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="btn" type="button">Plus d'événements</button>
      </div>
    </div>
    </section>
    <section class="newsletter-section">
		<div class="container">
			<div class="row">
				<div class="question-form col-sm-12 col-md-7">
          <h4>Abonnez-vous à notre newsletter pour ne rien manquer</h4>
          <div class="association-submit-resize">
          <form class="newsletter-form">
						<input type="email" placeholder="Entrez votre email">
            <button class="send-btn">être informé</button>
          </form>
          </div>
				</div>
				<div class="email-form col-sm-8 col-md-5 col-sm-offset-2 col-md-offset-0">
        <form class="newsletter-form">
						<input type="email" placeholder="Entrez votre email">
            <button class="send-btn">être informé</button>
          </form>
         
				</div>
			</div>
		</div>
	</section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="footer">
              <div class="footer-logo">
              <a class="logo" href="#">
                <img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="logo">
                Ensemble Pour l'Afrique
            </a>
              </div>
              <p>Cette association a pour but la rencontre de personnes d'horizons et de pays différents mais partageant la même espérance pour l'Afrique et pour le monde.</p>
              <ul class="footer-contact">
                <li><i class="fa fa-map-marker"></i> 10 Avenue Paul Appell, 75014 Paris</li>
                <li><i class="fa fa-envelope"></i> <a href="contact@epa.org">contact@epa.org</a></li>
                <li><i class="fa fa-phone"></i> 0515616165</li>
              </ul>
              <p class="rais">Raison sociale : « Ensemble pour l’Afrique pour une humanité nouvelle», association française de droit privé, à but non lucratif, déclarée à la Préfecture de Police de Paris le 27/04/2005 et publiée au Journal Officiel de la République le 04/06/2005.
              </p>
              <p class="rais">Identification INSEE : N° de SIRET 484 104237 00017, Code APE  913E</p>
              <p class="rais">Elle relève du secteur de l'Economie sociale et solidaire.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="footer">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.917317132186!2d2.325890215902036!3d48.821639011247385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671af2c2a3c3b%3A0x8493a47e268d0ca6!2s10%20Avenue%20Paul%20Appell%2C%2075014%20Paris!5e0!3m2!1sfr!2sfr!4v1584828035306!5m2!1sfr!2sfr" width="100%" height="350" frameborder="0" style="border: 3px solid #abc32f; background-color:#e2e2e2;" allowfullscreen="1" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
        </div>
  
        <div class="row footer-bottom">
          <div class="col-md-12">
            <?php wp_nav_menu([
              'theme_location' => 'footer',
              'container' => false,
              'menu_class' => 'footer-nav'
              ]);
              ?>
          </div>
        </div>
      </div>
    </footer>
</body>
<?php wp_footer(); ?>
</html>