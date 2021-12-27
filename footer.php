<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leto
 */

?>

</div>
</div>
</div><!-- #content -->
<?php if ( is_front_page() ) : ?>
<section id="primary marques" class="content-area col-md-12">
	<h3>Quelques marques que nous tenons</h3>
	<div id="marque_section">
		<?php $args = array( 'post_type' => 'marque');
								$the_query = new WP_Query( $args );?>
		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<!-- Contenue de chaque cpt : Marques -->
		<a href="<?php the_field('lien_vers_la_marque'); ?>"><?php the_post_thumbnail();?></a>
		<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
		<!-- Fin de la boucle -->
		<?php wp_reset_query(); ?>
	</div>
</section>
<?php endif;?>
<?php do_action( 'leto_before_footer' ); ?>
<footer id="social_nav">
<h5><?php bloginfo( 'name' ); ?></h5>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
<ul class="site-header-social">
	<!-- Debut de la boucle medias sociaux-->
	<?php $args = array( 'post_type' => 'medias_sociaux');
								$the_query = new WP_Query( $args );?>
	<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<!-- Contenue de chaque cpt : Medias sociaux -->
	<li><a href="<?php the_field('lien_vers_le_media'); ?>"><?php the_post_thumbnail();?></a></li>
	<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
	<!-- Fin de la boucle -->
	<?php wp_reset_query(); ?>
</ul>
</footer>
<div id="sub">
	<h4>Inscrivez-vous à notre infolettre</h4>
	<aside><?php echo do_shortcode('[contact-form-7 id="193" title="MailChimp form"]'); ?></aside>
</div>

</div><!-- #page -->

<?php do_action( 'leto_after_page' ); ?>

<?php wp_footer(); ?>

</body>

</html>