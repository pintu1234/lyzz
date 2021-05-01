<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blog_Way
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( !is_single() && has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) { ?>
		<div class="entry-img">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-way-common'); ?></a>
       </div>
       <?php
    } 
	?>
	<div class="detail-wrap">
		<header class="entry-header">
			<?php

			$cat_meta = blog_way_get_option( 'category_meta' );

			if ( ( 'post' === get_post_type() ) && ( 1 === absint( $cat_meta ) ) ) {

				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'blog-way' ) );

				if ( $categories_list && blog_way_categorized_blog() ) {
					printf( '<span class="cat-links">%s</span>', $categories_list ); // WPCS: XSS OK.
				}

			}

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 

			$author_meta 	= blog_way_get_option( 'author_meta' );
			$date_meta 		= blog_way_get_option( 'date_meta' ); 

			if( 1 === absint( $author_meta ) || 1 === absint( $date_meta ) ){ ?>

				<div class="author-date">
					<?php if( 1 === absint( $author_meta ) ){ ?>
						<span class="author vcard"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
					<?php } ?>

					<?php if( 1 === absint( $author_meta ) && 1 === absint( $date_meta ) ){ ?>
						<span class="separator"><?php echo esc_html__( ' / ', 'blog-way' ); ?></span>
					<?php } ?>

					<?php if( 1 === absint( $date_meta ) ){ ?>
						<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
					<?php } ?>
				</div><!-- .author-date -->

			<?php } ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				
				if( is_single() ){

					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blog-way' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-way' ),
						'after'  => '</div>',
					) );

				} else{

					the_excerpt();
					
				}
				
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
