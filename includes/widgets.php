<?php

if(!defined('ABSPATH')) die();

class Saga_Posts_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'saga_widget',
			esc_html__( 'Saga posts widget', 'saga' ), 
			array( 'description' => esc_html__( 'Agrega posts en un Widget', 'saga' ), )
		);
	}

	public function widget( $args, $instance ) {

		$cantidad = $instance['cantidad'];

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $cantidad,
		);

		$entry = new WP_Query($args);
		while($entry->have_posts( )): $entry->the_post(  );
		?>
			<article class="card aside_card">
				<a href="<?php the_permalink();?>">
					<div class="card-image">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr($alt_text); ?>">
					</div>
					<div class="card-body">
						<h3><?php the_title(); ?></h3>
						<p><?php echo get_the_date(); ?></p>
					</div>
				</a>
			</article>
		<?php

		endwhile;
		wp_reset_postdata();
	}

    public function form( $instance ) {
		$cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_attr( 'Cuantos post quiere mostrar?' );
		?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('cantidad')); ?>">
					<?php echo esc_attr("Cuantos posts quieres mostrar?"); ?>
				</label>
				<input type="number"
				class="widefat"
				id="<?php echo esc_attr($this->get_field_id('cantidad')); ?>"
				name="<?php echo esc_attr($this->get_field_name('cantidad')); ?>"
				value='<?php echo esc_attr( $cantidad ); ?>'
				/>
			</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '';

		return $instance;
	}
} 

function Saga_theme_registrar_widget() {
    register_widget( 'Saga_Posts_Widget' );
}
add_action( 'widgets_init', 'Saga_theme_registrar_widget' );