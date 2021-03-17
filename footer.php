<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="footer">
              <div class="footer-logo">
                <a class="logo" href="">
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
						<h3 class="footer-title">Newsletter</h3>
						<p>Pour ne rien rater des dernières informations concernant EPA, abonnez-vous à notre newsletter!</p>
						<form class="form-inline">
              <div class="form-group mb-2">
                <input type="text" readonly class="form-control-plaintext input" placeholder="email@example.com">
                <button type="submit" class="btn">S'inscrire</button>
              </div>
              
            </form>
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
    
    <?php wp_footer() ?>
</body>
</html>