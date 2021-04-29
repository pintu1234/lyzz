<?php
/**
 * Popular Posts Widget
 *
 * @package Blog_Way
 */

if ( ! class_exists( 'Blog_Way_Popular_Posts_Widget' ) ) :

	/**
	 * Popular posts widget class.
	 *
	 * @since 1.0.0
	 */
	class Blog_Way_Popular_Posts_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'popular-posts widget_popular_posts',
				'description' => esc_html__( 'Widget to display popular posts with thumbnail and date.', 'blog-way' ),
    		);

			parent::__construct( 'blog-way-popular-posts', esc_html__( 'Blog Way: Popular Posts', 'blog-way' ), $opts );
	    }


	    function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
            
            $post_number    = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 6;

	        echo $args['before_widget']; ?>

	        <div class="popular-news-section">
                
                <?php 
                if ( ! empty( $title ) ) {
                    echo $args['before_title'] . esc_html( $title ). $args['after_title'];
                }?>

                <div class="popular-posts-side">

                    <?php

                    $popular_args = array(
                                        'posts_per_page'        => absint( $post_number ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                        'post_status'           => 'publish', 
                                        'orderby'               => 'comment_count', 
                                        'order'                 => 'desc',
                                    );

                    $popular_posts = new WP_Query( $popular_args );

                    if ( $popular_posts->have_posts() ) :


                        while ( $popular_posts->have_posts() ) :

                            $popular_posts->the_post(); ?>

                            <div class="news-item">
                                <?php if ( has_post_thumbnail() ) :  ?>
                                    <div class="news-thumb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>   
                                    </div><!-- .news-thumb --> 
                                <?php endif; ?>

                                <div class="news-text-wrap">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                     <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                </div><!-- .news-text-wrap -->
                            </div><!-- .news-item -->

                            <?php

                        endwhile; 

                        wp_reset_postdata(); ?>

                    <?php endif; ?>

                </div>

	        <?php
	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;
            $instance['title']           = sanitize_text_field( $new_instance['title'] );
            $instance['post_number']     = absint( $new_instance['post_number'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
                'title'         => esc_html__( 'Popular Posts', 'blog-way' ),
                'post_number'   => 5,
	        ) );
	        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blog-way' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_number') ); ?>">
                    <?php esc_html_e('Number of Posts:', 'blog-way'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_number') ); ?>" type="number" value="<?php echo absint( $instance['post_number'] ); ?>" />
            </p>
           
	        <?php
	    }

	}

endif;