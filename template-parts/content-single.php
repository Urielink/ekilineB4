<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ekiline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

        <?php miniDate();?>

        <?php if ( !has_post_thumbnail() ) {
            // si no tiene imagen destacada solo pon el titulo
            the_title( '<h1 class="entry-title text-center">', '</h1>' ); 
        }?>
        
        <?php //***ELIMINAR?? the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php // ekiline_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content row">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ekiline' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer row">
		<?php ekiline_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
