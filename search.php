<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ekiline
 */

 // global $wp_query;

get_header(); ?>
	
		<?php dynamic_sidebar( 'content-w1' ); ?>		

		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ekiline' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<p><?php printf( esc_html__( '%s results found.', 'ekiline' ), $wp_query->found_posts ); ?></p>
			</header><!-- .entry-header -->
			
            <?php get_search_form(); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

            <?php ekiline_posts_navigation();?>
        

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		
		<?php dynamic_sidebar( 'content-w2' ); ?>		
		
<?php get_footer(); ?>
