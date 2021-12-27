<?php
/* Template Name:  Template À propos */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leto
 */

get_header(); ?>

<div id="primary" class="content-area col-md-12">
	<main id="main" class="site-main">

		<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

	</main><!-- #main -->
	<div id="contenue">
		<?php $args = array( 'post_type' => 'option','posts_per_page' => 1);
								$the_query = new WP_Query( $args );?>
		<?php if ( $the_query->have_posts() ) : ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<!-- Contenue de chaque cpt : Option -->
		<section id="information">
			<h2>Nos information</h2>
			<section id="heures">
				<h3>Nos heures d'ouverture</h3>
				<ul id="semaine">
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

				$adresse = get_field('adresse');
				$telephone = get_field('telephone');

        ?>
					<li>
						<div class="jour">Lundi</div>
						<?php if ($lundi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $lundi['ouverture'] )?> à <?php echo esc_html( $lundi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $lundi['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Mardi</div>
						<?php if ($mardi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $mardi['ouverture'] )?> à <?php echo esc_html( $mardi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $mardi['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Mercredi</div>
						<?php if ($mercredi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $mercredi['ouverture'] )?> à
							<?php echo esc_html( $mercredi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $mercredi['etat_de_la_journee'] )?>
							</div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Jeudi</div>
						<?php if ($jeudi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $jeudi['ouverture'] )?> à <?php echo esc_html( $jeudi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $jeudi['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Vendredi</div>
						<?php if ($vendredi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $vendredi['ouverture'] )?> à
							<?php echo esc_html( $vendredi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $vendredi['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Samedi</div>
						<?php if ($samedi['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $samedi['ouverture'] )?> à <?php echo esc_html( $samedi['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $samedi['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<li>
						<div class="jour">Dimanche</div>
						<?php if ($dimanche['sans_heures_fixe'] == "ouvert"):?>
						<div class="heures">
							<? echo esc_html( $dimanche['ouverture'] )?> à
							<?php echo esc_html( $dimanche['fermeture'] )?>
							<?php else : ?>
							<div class="heures"><?php echo esc_html( $dimanche['etat_de_la_journee'] )?></div>
							<?php endif ;?>
					</li>
					<?php endwhile; ?>
					<?php endif; ?>
				</ul>
			</section>
			<section id="adresse">
				<h3>Notre emplacement</h3>
				<a href="<?php echo esc_html( $adresse['url_de_google_maps'] )?>"><?php echo esc_html( $adresse['adresse_1'] )?>, </br><?php echo esc_html( $adresse['ville'] )?>, <?php echo esc_html( $adresse['province'] )?>, <?php echo esc_html( $adresse['code_postal'] )?></a>			
			</section>
			<section id="telephone">
				<h3>Appelez-nous</h3>
				<a href="tel:<?php echo esc_html( $telephone['numero_sans_les'] )?>"><?php echo esc_html( $telephone['numero'] )?></a>			
			</section>
		</section>
		<?php endwhile;?>
		<?php else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
		<!-- Fin de la boucle -->
		<?php wp_reset_query(); ?>
		<section id="contactus">

			<h2>Écrivez-nous!</h2>
			<aside><?php echo do_shortcode('[contact-form-7 id="327" title="Formulaire de contact(À propos)"]'); ?>
			</aside>
		</section>
	</div>
</div><!-- #primary -->


<?php
get_footer();