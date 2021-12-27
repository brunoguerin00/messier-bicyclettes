<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<?php $header_type = get_theme_mod( 'header_type', 'header-type-2' ); ?>

<body <?php body_class(); ?>>

	<?php do_action( 'leto_before_page' ); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'leto' ); ?></a>

		<?php do_action( 'leto_before_header' ); ?>

		<header id="masthead" class="site-header">
			<div class="header-floating-trigger">

				<div class="header-navigation header-floating">
					<?php $args = array( 'post_type' => 'option','posts_per_page' => 1);
								$the_query = new WP_Query( $args );?>
					<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php if( have_rows('heures_douverture') ): ?>
					<?php while( have_rows('heures_douverture') ): the_row(); 

				// Get sub field values.
				$lundi = get_sub_field('lundi');
				$mardi = get_sub_field('mardi');
				$mercredi = get_sub_field('mercredi');
				$jeudi = get_sub_field('jeudi');
				$vendredi = get_sub_field('vendredi');
				$samedi = get_sub_field('samedi');
				$dimanche = get_sub_field('dimanche');

				$openstate = get_field('statue_douverture');
				$adresse = get_field('adresse');
				$telephone = get_field('telephone');
				$email = get_field('email_principale');

				$couleurOuverture = "";
				$texteOuverture = "";
				//Variable pour les information du moment
				//Set le timezone
				date_default_timezone_set("America/New_York");
				//HEURE
				$heure = date("H");
				//MINUTE
				$min = date("i");
				//JOUR DE LA SEMAINE
				$weekday = date("l");
				
				//Tranforme les chaines de texte en nombres
				settype($heure,"int");
				settype($min,"int");

        ?>
					<?php endwhile; ?>
					<?php endif; ?>
					
					<header id="informationFixed">
						<div class="infoHead">
							<a href="<?php echo esc_html( $adresse['url_de_google_maps'] )?>"><img
									src="<?php  echo(get_stylesheet_directory_uri())  ?>/img/location.png"
									alt="Icon pour la l'emplacement"><?php echo esc_html( $adresse['adresse_1'] )?>,
								<?php echo esc_html( $adresse['ville'] )?>,
								<?php echo esc_html( $adresse['province'] )?>,
								<?php echo esc_html( $adresse['code_postal'] )?></a>></div>
						<div class="infoHead">
							<a href="tel:<?php echo esc_html( $telephone['numero_sans_les'] )?>"><img
									src="<?php  echo(get_stylesheet_directory_uri())  ?>/img/tel-logo.png"
									alt="Icon pour le numero de telephone"><?php echo esc_html( $telephone['numero'] )?></a>
						</div>
						<div class="infoHead">
							<a href="mailto:<?php echo esc_html( $email )?>"><img
									src="<?php  echo(get_stylesheet_directory_uri())  ?>/img/emailIcon.svg"
									alt="Icon pour le courriel"><?php echo esc_html( $email )?></a>
						</div>
						<?php 
					function openStatus($jour, $openstate, $heure ,$min){
						$open = explode("h", $jour['ouverture']);
						$close = explode("h", $jour['fermeture']);
						//Separer les arrays en variables
						$openh = $open[0];
						$openm = $open[1];
						$closeh = $close[0];
						$closem = $close[1];

						//Tranforme les chaines de texte en nombres
						settype($openh,"int");
						settype($openm,"int");
						settype($closeh,"int");
						settype($closem,"int");
						if( $jour['sans_heures_fixe'] == "ouvert" && (($heure == $openh && $min >= $openm) || $heure > $openh) && (($heure == $closeh && $min < $closem) || $heure < $closeh)){
							if(($heure == $closeh - 1 && $min >= $closem ) || ($heure == $closeh && $min < $closem )){
								//Bientot ferme
								$couleurOuverture = $openstate["couleur_proche_fermeture"];
								$texteOuverture = $openstate["texte_proche_fermeture"];
								echo "<div id='openStatus'><span style='background-color:{$couleurOuverture}'></span><p>{$texteOuverture}</p></div>";
								
							}else{
								//Ouvert
								$couleurOuverture = $openstate["couleur_ouvert"];
								$texteOuverture = $openstate["texte_ouvert"];
								echo "<div id='openStatus'><span style='background-color:{$couleurOuverture}'></span><p>{$texteOuverture}</p></div>";
							};
						}else{
							//Ferme
							$couleurOuverture = $openstate["couleur_ferme"];
							$texteOuverture = $jour['etat_de_la_journee'];
							echo "<div id='openStatus'><span style='background-color:{$couleurOuverture}'></span><p>{$texteOuverture}</p></div>";
						};
				};
				switch ($weekday) {
					case 'Monday':
						# code...
						openStatus($lundi, $openstate, $heure, $min);
						break;
					case 'Tuesday':
						# code...
						openStatus($mardi, $openstate, $heure, $min);
						break;
					case 'Wednesday':
						# code...
						openStatus($mercredi, $openstate, $heure, $min);
						break;
					case 'Thursday':
						# code...
						openStatus($jeudi, $openstate, $heure, $min);
						break;
					case 'Friday':
						# code...
						openStatus($vendredi, $openstate, $heure, $min);
						break;
					case 'Saturday':
						# code...
						openStatus($samedi, $openstate, $heure, $min);
						break;
					case 'Sunday':
						# code...
						openStatus($dimanche, $openstate, $heure, $min);
						break;
					default:
						# code...
						break;
				};
				
				?>
					</header>
					<?php endwhile;?>
					<?php else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
					<!-- Fin de la boucle -->
					<?php wp_reset_query(); ?>
					<div class="container-full">
						<div class="site-header__content">
							<?php do_action( 'leto_inside_header' ); ?>
							<ul class="site-header-social">
								<!-- Debut de la boucle medias sociaux-->
								<?php $args = array( 'post_type' => 'medias_sociaux');
								$the_query = new WP_Query( $args );?>
								<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<!-- Contenue de chaque cpt : Medias sociaux -->
								<li><a
										href="<?php the_field('lien_vers_le_media'); ?>"><?php the_post_thumbnail();?></a>
								</li>

								<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
								<!-- Fin de la boucle -->
								<?php wp_reset_query(); ?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</header><!-- #masthead -->

		<?php do_action( 'leto_after_header' ); ?>

		<?php $container = leto_container_type(); ?>
		<div id="content" class="site-content">
			<?php do_action( 'leto_before_container' ); ?>
			<div class="<?php echo esc_attr( $container ); ?> clearfix">
				<div class="row">