<?php
/**
 * customizer -- custom controls
 */


// custom information control
class Info_Custom_control extends WP_Customize_Control{
	public $type = 'info';
	public function render_content(){
		?>
			<span class="customize-control-title h2"><?php echo esc_html( $this->label ); ?></span>
			<?php /*
				<p><?php echo wp_kses_post($this->description); ?></p>
			*/ ?>
			<hr/>
		<?php
	}
}

// custom separator
class Separator_Custom_control extends WP_Customize_Control{
	public $type = 'separator';
	public function render_content() { ?>
		<p><hr class="customizer-control-separator hr" /></p>
	<?php }
}
