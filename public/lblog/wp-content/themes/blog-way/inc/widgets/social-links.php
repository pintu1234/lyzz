<?php
/**
 * Social Links Widget
 *
 * @package Blog_Way
 */

if ( ! class_exists( 'Blog_Way_Social_Widget' ) ) :

    /**
     * Social widget class.
     *
     * @since 1.0.0
     */
    class Blog_Way_Social_Widget extends WP_Widget {

        /**
        * Constructor.
        *
        * @since 1.0.0
        */
        function __construct() {
            $opts = array(
                'classname'   => 'blog_way_widget_social',
                'description' => esc_html__( 'Social Link Widget', 'blog-way' ),
            );
            parent::__construct( 'blog-way-social', esc_html__( 'Blog Way: Social', 'blog-way' ), $opts );
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

            $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

            echo $args['before_widget'];

            if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            if ( has_nav_menu( 'social' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'depth'          => 1,
                    'container'      => 'div',
                    'container_class'=> 'social-menu-wrap',
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>',
                ) );
            }

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

            $instance['title'] = sanitize_text_field( $new_instance['title'] );

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

            $instance = wp_parse_args( (array) $instance, array(
                'title' => '',
            ) );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blog-way' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>

            <?php if ( ! has_nav_menu( 'social' ) ) : ?>
            <p>
                <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'blog-way' ); ?>
            </p>
            <?php endif; ?>
            <?php
        }
    }

endif;