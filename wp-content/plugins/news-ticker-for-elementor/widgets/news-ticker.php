<?php
namespace WB_NT\NEWS_TICKER;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
/**
 * Elementor News Ticker Slider Widget.
*/

class WB_NT_WIDGET extends \Elementor\Widget_Base
{

	/**
	 * Retrieve the widget name.
	 */
	public function get_name() {
		return 'wb-news-ticker';
	}

	/**
	 * Retrieve the widget title.
	 */
	public function get_title() {
		return esc_html( 'News Ticker', 'news-ticker-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 */
	public function get_icon() {
		return 'fa fa-columns';
	}

	/**
	 * Retrieve the widget category.
	 */
	public function get_categories() {
		return [ 'web-builder-element' ];
	}

	/**
	 * Retrieve the widget category.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'style_configuration',
			[
				'label' => esc_html( 'Configurtion', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'template_style',
			[
				'label' => esc_html__( 'Template Style', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Template from Here', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description' => __('There is a <strong><a href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Typography Template</a></strong> on the <a href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Pro</a> Version. <a style="font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>'),
				'default' => 'default',
				'options' => [
					'default'  => esc_html__( 'Default', 'news-ticker-for-elementor' ),
				],
			]
		);


		$this->add_control(
			'default_template_scrollspeed',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'heading_configuration',
			[
				'label' => esc_html( 'Heading Configurtion', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ticker_label', [
				'label' => esc_html__( 'Ticker Label', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '' , 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Ticker Label', 'news-ticker-for-elementor' ),
			]
		);

		$this->add_control(
			'ticker_label_hide',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_configuration',
			[
				'label' => esc_html( 'Content', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$post_type_lists = [
			'none' => 'None',
			'post' => 'Posts',
			'page' => 'Pages'
		];

		$post_ticker_repeater_fields = [
			[
				'name' => 'ticker_post_type_selection',
				'label' => esc_html__( 'Select Post Type', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => $post_type_lists,
				'description' => __('You can select <strong><a href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Custom Post Types</a></strong> on the <a href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Pro</a> Version. <a style="font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>'),
			],
			[
				'name' => 'ticker_post_limit',
				'label' => esc_html__( 'Limit', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__( '' , 'news-ticker-for-elementor' ),
				'min' => -1,
				'default' => -1,
				'placeholder' => esc_html__( 'Limit', 'news-ticker-for-elementor' ),
			],
						[
				'name' => 'ticker_post_link_target',
				'label' => esc_html__( 'Open Link in New Tab', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'news-ticker-for-elementor' ),
				'label_off' => esc_html__( 'No', 'news-ticker-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			],
			[
				'name' => 'default_template_scrollspeed',	
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		];

		$this->add_control(
			'post_type_ticker',
			[
				'label' => esc_html__( 'Select From Posts', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $post_ticker_repeater_fields,
				'title_field' => '{{{ ticker_post_type_selection }}}',
			]
		);

		$custom_ticker_repeater_fields = [
			[
				'name' => 'ticker_custom_content',
				'label' => esc_html__( 'Custom Ticker Content', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( '' , 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Enter Text here', 'news-ticker-for-elementor' ),
				'description' => esc_html__( 'Custom Content to Show as News Ticker', 'news-ticker-for-elementor' ),
			],
			[
				'name' => 'ticker_custom_content_link',
				'label' => esc_html__( 'Link', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'news-ticker-for-elementor' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		];

		$this->add_control(
			'ticker_custom_content_list',
			[
				'label' => esc_html__( 'Custom Ticker Content List', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $custom_ticker_repeater_fields,
				'title_field' => '{{{ ticker_custom_content }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html( 'Heading Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Heading Color', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbnt-el-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'label_typography',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'label_bg_section',
			[
				'label' => esc_html( 'Heading Background Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'label_background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .wbnt-el-label',
			]
		);

		$this->add_control(
			'backround_gradient',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'control_style_section',
			[
				'label' => esc_html( 'Control Buttons Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'control_btn_color',
			[
				'label' => __( 'Color', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbel-nt-controls .bn-arrow::after' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .bn-play::after' => 'border-left-color: {{VALUE}}',
					'{{WRAPPER}} .wbel-nt-controls .bn-pause::after,{{WRAPPER}} .wbel-nt-controls .bn-pause::before' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'control_btn_border_color',
			[
				'label' => __( 'Border Color', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbel-nt-controls button' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'control_btn_bg',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .wbel-nt-controls,{{WRAPPER}} .wbel-nt-controls button',
			]
		);

		$this->add_control(
			'show_label',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => esc_html( 'Content Section Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_text_color',
			[
				'label' => __( 'Text Color', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wbnt-el-container ul li, {{WRAPPER}} .wbnt-el-container ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .wb-breaking-news-ticker-wrapper',
			]
		);

		$this->add_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_bg_section',
			[
				'label' => esc_html( 'Content Background Style', 'news-ticker-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'content_background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .wbnt-news-ticker-list',
			]
		);

		$this->add_control(
			'content_background_gradient',
			[
				'label' => esc_html__( 'Need More Options:', 'news-ticker-for-elementor' ),
				'placeholder' => esc_html__( 'Choose Scroll Speed in Seconds. Must be a number', 'news-ticker-for-elementor' ),
				'type' => \Elementor\Controls_Manager::BUTTON,
				'separator' => 'before',
				'label_block' => true,
				'button_type' => 'danger',
				'text' => __( '<a style="color: #fff; font-size: 12px; padding: 0 10px" href="https://web-lodge.com/product/news-ticker-for-elementor/" target="_blank" >Buy Pro</a>', 'plugin-domain' ),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Widget
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$element_id = 'wb_news_ticker'.$this->get_id();
		$ticker_label = __('Latest News', 'news-ticker-for-elementor');


		$template_style = $settings['template_style'];

		echo '<div data-template-style="'.esc_attr($template_style).'" class="wbel-nt-wrapper">';
		if( $template_style === 'default' ){
			require( WB_NT_PATH . 'templates/default.php' );
		}
		echo "</div>";

	}


}
