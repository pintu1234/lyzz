<?php
/**
 * Author Profile Widget
 *
 * @package Blog_Way
 */

if ( ! class_exists( 'Blog_Way_Author_Widget' ) ) :

	/**
	* Author widget class.
	*
	* @since 1.0.0
	*/
	class Blog_Way_Author_Widget extends WP_Widget {

		/**
		* Constructor.
		*
		* @since 1.0.0
		*/
		function __construct() {
			$opts = array(
					'classname'   => 'blog_way_widget_author',
					'description' => esc_html__( 'Display Author Profile.', 'blog-way' ),
			);
			parent::__construct( 'blog-way-author', esc_html__( 'Blog Way: Author Profile', 'blog-way' ), $opts );
		}

		/**
		* Echo the widget content.
		*
		* @since 1.0.0
		*
		* @param array $args     Display arguments including before_title, after_title,
		*                        before_widget, and after_widget.
		* @param array $instance The settings for the particular instance of the widget.
		*/
		function widget( $args, $instance ) {

			$title              = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$author_page        = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

			$content_type       = !empty( $instance['content_type'] ) ? $instance['content_type'] : '';

			$excerpt_length     = !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 20;

			$read_more_text     = !empty( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';

			$author_facebook    = !empty( $instance['author_facebook'] ) ? $instance['author_facebook'] : '';

			$author_twitter     = !empty( $instance['author_twitter'] ) ? $instance['author_twitter'] : ''; 

			$author_linkedin    = !empty( $instance['author_linkedin'] ) ? $instance['author_linkedin'] : '';

			$author_instagram   = !empty( $instance['author_instagram'] ) ? $instance['author_instagram'] : '';

			$author_pinterest   = !empty( $instance['author_pinterest'] ) ? $instance['author_pinterest'] : '';

			$author_youtube     = !empty( $instance['author_youtube'] ) ? $instance['author_youtube'] : '';

			echo $args['before_widget']; ?>

			<div class="author-profile">

					<?php 

					if ( $title ) {
						echo $args['before_title'] . $title . $args['after_title'];
					} ?>
					
					<div class="profile-wrapper social-menu-wrap">

						<?php if ( $author_page ) { 

							$author_args = array(
											'posts_per_page' => 1,
											'page_id'        => absint( $author_page ),
											'post_type'      => 'page',
											'post_status'    => 'publish',
										);

							$author_query = new WP_Query( $author_args ); 

							if( $author_query->have_posts()){

								while( $author_query->have_posts()){

									$author_query->the_post(); ?>

									<?php 
									if ( has_post_thumbnail() ) { ?>
										<div class="profile-img">
											<?php the_post_thumbnail('thumbnail'); ?>
										</div>
										<?php
									} ?>

									<div class="profile-info">
										<h2><?php the_title(); ?></h2>
										<?php 

										if( 'excerpt' == $content_type ){

											if( !empty( $excerpt_length ) ){

												$content = blog_way_get_the_excerpt( absint( $excerpt_length ) );
												
												echo $content ? wpautop( wp_kses_post( $content ) ) : '';

											}

											if( !empty( $read_more_text ) ){ ?>

												<p><a href="<?php the_permalink(); ?>" class="btn-continue"><?php echo esc_html( $read_more_text ); ?><span class="arrow-continue">&rarr;</span></a></p>

												<?php 
											}

										}else{

											the_content();

										} ?>
									</div>

									<?php

								}

								wp_reset_postdata();

							} ?>
							
						<?php } ?>

						<?php if( $author_facebook || $author_twitter || $author_linkedin || $author_instagram || $author_pinterest || $author_youtube ){ ?>
								<ul id="social-profiles" class="menu">
									<?php if( $author_facebook ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_facebook ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'facebook', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>

									<?php if( $author_twitter ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_twitter ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'twitter', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>

									<?php if( $author_linkedin ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'linkedin', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>

									<?php if( $author_instagram ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_instagram ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'instagram', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>

									<?php if( $author_pinterest ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_pinterest ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'pinterest', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>

									<?php if( $author_youtube ){ ?>
										<li>
											<a href="<?php echo esc_url( $author_youtube ); ?>" target="_blank"><span class="screen-reader-text"><?php esc_html_e( 'youtube', 'blog-way' ); ?></span></a>
										</li>
									<?php } ?>
									
								</ul>

						<?php } ?>

					</div><!-- .profile-wrapper -->

			</div><!-- .author-profile -->

			<?php 

			echo $args['after_widget'];

		}

		/**
		* Update widget instance.
		*
		* @since 1.0.0
		*
		* @param array $new_instance New settings for this instance as input by the user via
		*                            {@see WP_Widget::form()}.
		* @param array $old_instance Old settings for this instance.
		* @return array Settings to save or bool false to cancel saving.
		*/
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title']              = sanitize_text_field( $new_instance['title'] );

			$instance['author_page']        = absint( $new_instance['author_page'] );

			$instance['content_type']       = sanitize_text_field( $new_instance['content_type'] );

			$instance['excerpt_length']     = absint( $new_instance['excerpt_length'] );

			$instance['read_more_text']     = sanitize_text_field( $new_instance['read_more_text'] );

			$instance['author_facebook']    = esc_url_raw( $new_instance['author_facebook'] );

			$instance['author_twitter']     = esc_url_raw( $new_instance['author_twitter'] );

			$instance['author_linkedin']    = esc_url_raw( $new_instance['author_linkedin'] );

			$instance['author_instagram']   = esc_url_raw( $new_instance['author_instagram'] );

			$instance['author_pinterest']   = esc_url_raw( $new_instance['author_pinterest'] );

			$instance['author_youtube']     = esc_url_raw( $new_instance['author_youtube'] );

			return $instance;
		}

		/**
		* Output the settings update form.
		*
		* @since 1.0.0
		*
		* @param array $instance Current settings.
		* @return void
		*/
		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'title'             => '',
				'author_page'       => '',
				'content_type'      => 'full',
				'excerpt_length'    => 20,
				'read_more_text'    => esc_html__( 'Read More', 'blog-way' ),
				'author_facebook'   => '',
				'author_twitter'    => '',
				'author_linkedin'   => '',
				'author_instagram'  => '',
				'author_pinterest'  => '',
				'author_youtube'    => '',
			);

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'blog-way' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'author_page' ); ?>">
					<strong><?php esc_html_e( 'Author Page:', 'blog-way' ); ?></strong>
				</label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( 'author_page' ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( 'author_page' ),
					'selected'         => $instance[ 'author_page' ],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'blog-way' ),
					)
				);
				?>
				<small>
					<?php esc_html_e('Title, Content and Featured Image of this page will be used for Author title, Bio and Profile picture.', 'blog-way'); ?>  
				</small>
			</p>

			<p>
			  <label for="<?php echo esc_attr( $this->get_field_id( 'content_type' ) ); ?>"><strong><?php _e( 'Content Type:', 'blog-way' ); ?></strong></label>
				<?php
				$this->dropdown_content_type( array(
					'id'       => $this->get_field_id( 'content_type' ),
					'name'     => $this->get_field_name( 'content_type' ),
					'selected' => esc_attr( $instance['content_type'] ),
					)
				);
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
					<?php esc_html_e('Excerpt Length:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
				<small>
					<?php esc_html_e('Works if content type equals to excerpt.', 'blog-way'); ?> 
				</small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>"><strong><?php esc_html_e( 'Read More Text:', 'blog-way' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'read_more_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'read_more_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['read_more_text'] ); ?>" />
				<small>
					<?php esc_html_e('Works if content type equals to excerpt.', 'blog-way'); ?> 
				</small>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>">
					<?php esc_html_e('Facebook:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>" type="text" value="<?php echo esc_url( $instance['author_facebook'] ); ?>" />   
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>">
					<?php esc_html_e('Twitter:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>" type="text" value="<?php echo esc_url( $instance['author_twitter'] ); ?>" />   
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>">
					<?php esc_html_e('LinkedIn:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>" type="text" value="<?php echo esc_url( $instance['author_linkedin'] ); ?>" />   
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>">
					<?php esc_html_e('Instagram:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>" type="text" value="<?php echo esc_url( $instance['author_instagram'] ); ?>" />   
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>">
					<?php esc_html_e('Pinterest:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>" type="text" value="<?php echo esc_url( $instance['author_pinterest'] ); ?>" />   
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>">
					<?php esc_html_e('Youtube:', 'blog-way'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>" type="text" value="<?php echo esc_url( $instance['author_youtube'] ); ?>" />   
			</p>

		<?php
				
		}

		function dropdown_content_type( $args ) {
			$defaults = array(
				'id'       => '',
				'class'    => 'widefat',
				'name'     => '',
				'selected' => 'full',
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = array(
				'full'    => esc_html__( 'Full', 'blog-way' ),
				'excerpt' => esc_html__( 'Excerpt', 'blog-way' ),
			);

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
		}
	}

endif;