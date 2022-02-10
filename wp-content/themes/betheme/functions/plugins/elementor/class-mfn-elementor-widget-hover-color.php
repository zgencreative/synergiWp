<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Mfn_Elementor_Widget_Hover_Color extends \Elementor\Widget_Base {

	/**
	 * Widget base constructor
	 */

	public function __construct( $data = [], $args = null ) {

		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );

		parent::__construct( $data, $args );
	}

	/**
	 * WPML compatibility
	 */

	public function wpml_widgets_to_translate_filter( $widgets ) {

	  $widgets[ $this->get_name() ] = [
			'conditions' => [
				'widgetType' => $this->get_name(),
			],
			'fields' => [
			  [
					'field' => 'content',
					'type' => $this->get_title() .'<br />'. __( 'Content', 'mfn-opts' ),
					'editor_type' => 'VISUAL'
			  ],
			  [
					'field' => 'link',
					'type' => $this->get_title() .'<br />'. __( 'Link', 'mfn-opts' ),
					'editor_type' => 'LINE'
			  ],
			],
	  ];

	  return $widgets;
	}

	/**
	 * Get widget name
	 */

	public function get_name() {
		return 'mfn_hover_color';
	}

	/**
	 * Get widget title
	 */

	public function get_title() {
		return __( 'Be • Hover color', 'mfn-opts' );
	}

	/**
	 * Get widget icon
	 */

	public function get_icon() {
		return 'fas fa-tint';
	}

	/**
	 * Get widget categories
	 */

	public function get_categories() {
		return [ 'mfn_builder' ];
	}

	/**
	 * Register widget controls
	 */

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'mfn-opts' ),
			]
		);

		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>Lorem ipsum dolor sit amet,<br/>consectetur adipiscing elit.<p>',
			]
		);

    $this->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'mfn-opts' ),
        'description' => __('Use value with <b>px</b> or <b>%</b>. Example: <b>20px</b> or <b>20px 10px 20px 10px</b> or <b>20px 1%</b>', 'mfn-opts'),
				'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '40px 30px 25px',
			]
		);

		$this->end_controls_section();

    $this->start_controls_section(
			'background_section',
			[
				'label' => __( 'Background', 'mfn-opts' ),
			]
		);

    $this->add_control(
			'background',
			[
				'label' => __( 'Color', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0898ec',
			]
		);

    $this->add_control(
			'background_hover',
			[
				'label' => __( 'Hover color', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#057CC2',
			]
		);

    $this->end_controls_section();

    $this->start_controls_section(
			'border_section',
			[
				'label' => __( 'Border', 'mfn-opts' ),
			]
		);

    $this->add_control(
			'border',
			[
				'label' => __( 'Color', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

    $this->add_control(
			'border_hover',
			[
				'label' => __( 'Hover color', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

    $this->add_control(
			'border_width',
			[
				'label' => __( 'Width', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => '2',
			]
		);

    $this->add_control(
			'border_radius',
			[
				'label' => __( 'Radius', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => '0',
			]
		);

    $this->end_controls_section();

		$this->start_controls_section(
			'link_section',
			[
				'label' => __( 'Link', 'mfn-opts' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'target',
			[
				'label' => __( 'Target', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'	=> array(
					0 => __('_self', 'mfn-opts'),
					1 => __('_blank', 'mfn-opts'),
				),
				'default' => 0,
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend
	 */

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo sc_hover_color( $settings, $settings['content'] );

	}

}
