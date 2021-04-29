<?php
/**
 * Template part for displaying pagination.
 *
 * @link https://codex.wordpress.org/Function_Reference/the_posts_pagination
 *
 * @package Blog_Way
 */

the_posts_pagination( 
	array(
		'mid_size' 	=> 2,
		'prev_text' => __( '&laquo; Previous', 'blog-way' ),
		'next_text' => __( 'Next &raquo;', 'blog-way' ),
	) 
);