<?php
/**
 * The template for displaying front-pages
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
<h1>Messier Bicyclettes</h1>
<div id="primary" class="content-area col-md-12">
	<?php $args = array( 'post_type' => 'slideshow');
								$the_query = new WP_Query( $args );?>
		<?php if ( $the_query->have_posts() ) : ?>
			<!-- Contenant de chaque cpt : Diapo -->
			<section id="diaporama">
				<a class="boutonSlider" onclick="myFunction2()"><</a>
				<div id="conteneurDiapo">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<!-- Contenue de chaque cpt : Diapo -->
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<article class="diapositive" style="background-image: url('<?php echo $image[0]; ?>')">
					<?php elseif(the_field('couleur_de_background')) :?>
					<article class="diapositive" style="background-color: <?php the_field('couleur_de_background')?>">
					<?php else :?>
					<article class="diapositive" style="background-color: #000000">
					<?php endif; ?>
					
					<h3 style="color: <?php the_field('couleur_texte')?> !important"><?php the_title(); ?></h3>
						<?php the_content();?>
						<?php if ( get_field('lien_du_bouton') ) : ?>
							<a href="<?php the_field('lien_du_bouton')?>" class="bouton"><?php the_field('texte_du_bouton')?></a> 
						<?php endif; ?>
					</article>
				<?php endwhile;?>
		</div>
		<a class="boutonSlider" onclick="myFunction()">></a>
		</section>
		<?php endif; ?>
<script>
	const list = document.querySelector("div#conteneurDiapo");
	var numbChild = list.childElementCount;
	
	if (numbChild == "1") {
		console.log("numbChild")
		document.querySelector("div#conteneurDiapo .diapositive").classList.add("solitaire");
		document.querySelector("a.boutonSlider:nth-child(3)").classList.add("solitaire");
		document.querySelector("a.boutonSlider").classList.add("solitaire");
	}else{
		var timer = setTimeout(() => myFunction(), 5000);
	}
		function myFunction() {
			clearTimeout(timer);
			const list = document.querySelector("div#conteneurDiapo");
			list.appendChild(list.firstElementChild);
			timer = setTimeout(() => myFunction(), 5000);
		}
		function myFunction2() {
			clearTimeout(timer);
			const lastItem = document.querySelector("div#conteneurDiapo").lastChild;
			const list = document.querySelector("div#conteneurDiapo");
			list.insertBefore(lastItem, list.childNodes[0]);
			timer = setTimeout(() => myFunction(), 5000);
		}
</script>
		<!-- Fin de la boucle -->
		<?php wp_reset_query(); ?>
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
	<?php $args = array( 'post_type' => 'services');
								$the_query = new WP_Query( $args );?>
		<?php if ( $the_query->have_posts() ) : ?>
			<section id="service">
			<h2>Services offerts</h2>
			<div id="container_service">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<!-- Contenue de chaque cpt : Rando -->
		<div class="service-div">
		<a href="<?php the_field('lien_du_cta'); ?>" class="services_img"><?php the_post_thumbnail(); ?></a>
		<h3><?php the_title(); ?></h3>
		<p><?php the_field('description_du_service'); ?></p>
		<a href="<?php the_field('lien_du_cta'); ?>" class="bouton"><?php the_field('contenue_du_cta');?></a>
		</div>
		<?php endwhile;?>
		</div>
		</section>
		<?php else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
		<!-- Fin de la boucle -->
		<?php wp_reset_query(); ?>
	<?php $args = array( 'post_type' => 'rando');
								$the_query = new WP_Query( $args );?>
		<?php if ( $the_query->have_posts() ) : ?>
			<section id="rando" style="background-image: url('<?php  echo(get_stylesheet_directory_uri())  ?>/img/banniere_presentation-des-rando-blured.jpg') ">
			<h2>Viens rouler avec nous!</h2>
			<div id="container_rando">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<!-- Contenue de chaque cpt : Rando -->
		<div class="rando-div">
		<h3><?php the_field('description_de_la_randon'); ?></h3>
		<a href="<?php the_permalink(); ?>"><img src="<?php the_field('logo_de_la_rando'); ?>" alt="Logo de <?php the_title()?>"></a>
		</div>
		<?php endwhile;?>
		</div>
		</section>
		<?php else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
		<!-- Fin de la boucle -->
		<?php wp_reset_query(); ?>
	
</div><!-- #primary -->

<?php
get_footer();