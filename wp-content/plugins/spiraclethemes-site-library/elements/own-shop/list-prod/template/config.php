<?php


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
Use Elementor\Controls_Stack;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Own_Shop_ListProd extends Widget_Base {

	public function get_name() {
		return 'own-shop-elementor-listprod';
	} 

	public function get_title() {
		return __( 'List All | Featured | New | Popular', 'spiraclethemes-site-library' );
	}

	public function get_icon() {
		return 'eicon-products';
	}

	public function get_categories() {
		return [ 'sslb-elementor' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'bootstrap' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_list_prod',
			[
				'label' => esc_html__( 'List Products', 'spiraclethemes-site-library' ),
			]
		);

		$this->add_control(
			'prod_options',
			[
				'label' => __( 'Choose product options', 'spiraclethemes-site-library' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'all' => esc_html__('All', 'spiraclethemes-site-library'),
					'featured' => esc_html__('Featured', 'spiraclethemes-site-library'),
					'new' => esc_html__('New', 'spiraclethemes-site-library'),
					'popular' => esc_html__('Popular', 'spiraclethemes-site-library'),
					
				],
				'multiple' => true
			]
		);

		$this->add_control(
			'prod_count',
			[
				'label' => esc_html__( 'Number of products', 'spiraclethemes-site-library' ),
				'type' => Controls_Manager::TEXT,
				'default' => '8',
			]
		);

		$this->add_control(
			'prod_columns_count',
			[
				'label' => esc_html__( 'Number of columns', 'spiraclethemes-site-library' ),
				'type' => Controls_Manager::TEXT,
				'default' => '4',
			]
		);

		$this->add_control(
			'prod_display_tabs',
			[
				'label' => __( 'Show tabs?', 'spiraclethemes-site-library' ),
				'description' => __( 'Note: If you see empty products, change atleast one setting to see products in preview mode', 'spiraclethemes-site-library' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'true' => __( 'Show', 'spiraclethemes-site-library' ),
					'false' => __( 'Hide', 'spiraclethemes-site-library' ),
				],
				'default' => 'true',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_prod_tabs',
			[
				'label' => __( 'Tabs', 'spiraclethemes-site-library' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_tabs_typography',
				'label' => __( 'Product tabs typography', 'spiraclethemes-site-library' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .list-products-section .nav-tabs >li >a',
				'fields_options' => [
		            'typography' => ['default' => 'yes'],
		            'font_size' => ['default' => ['size' => 20]],
		            'font_weight' => ['default' => 500],
		        ],
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_prod_settings',
			[
				'label' => __( 'Product', 'spiraclethemes-site-library' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_product_title_typography',
				'label' => __( 'Name typography', 'spiraclethemes-site-library' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .list-products-section li.product .woocommerce-loop-product__title',
				'fields_options' => [
		            'typography' => ['default' => 'yes'],
		            'font_size' => ['default' => ['size' => 18]],
		            'font_weight' => ['default' => 400],
		        ],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_product_price_typography',
				'label' => __( 'Price typography', 'spiraclethemes-site-library' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .list-products-section ul.products li.product .price',
				'fields_options' => [
		            'typography' => ['default' => 'yes'],
		            'font_size' => ['default' => ['size' => 18]],
		            'font_weight' => ['default' => 400],
		        ],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'section_product_saved_typography',
				'label' => __( 'Saved typography', 'spiraclethemes-site-library' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .list-products-section ul.products li.product p.saved-sale',
				'fields_options' => [
		            'typography' => ['default' => 'yes'],
		            'font_size' => ['default' => ['size' => 13]],
		            'font_weight' => ['default' => 400],
		        ],
			]
		);
		
		$this->end_controls_section();



		$this->start_controls_section(
			'section_prod_layout',
			[
				'label' => __( 'Layout', 'spiraclethemes-site-library' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'section_product_space',
			[
				'label' => __( 'Product Row Spacing', 'spiraclethemes-site-library' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .list-products-section ul.products li.product' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->end_controls_section();
		
	}

	protected function render() {
		require SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/list-prod/template/view.php';
	}
}
