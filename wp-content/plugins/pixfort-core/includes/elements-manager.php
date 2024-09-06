<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Elements Manager.
 *
 * 
 *
 * @since 1.0.0
 */
class ElementsManager {

	public $searchOverlayState = false;

	public static $elementsCSS = '';

	private $shortcodes = [
		'alertblock'				=> 'Alert',
		'alert'						=> 'Alert',
		'pix_advanced_text'			=> 'AdvancedText',
		'pix_accordion'				=> 'Accordion',
		'pix_accordion_tab'			=> 'AccordionTab',
		'pix_runtime'				=> 'Runtime',
		'animated-heading'			=> 'AnimatedHeading',
		'pix_auto_video'			=> 'AutoVideo',
		'pix_responsive_spacer'		=> 'ResponsiveSpacer',
		'pix_feature'				=> 'Feature',
		'pix_promo_box'				=> 'PromoBox',
		'pix_card_wide'				=> 'CardWide',
		'chart'						=> 'Chart',
		'circles'					=> 'Circles',
		'clients'					=> 'Clients',
		'clients_slider'			=> 'ClientsSlider',
		'pix_comparison_table'		=> 'ComparisonTable',
		'pix_content_stack'			=> 'ContentStack',
		'pix_countdown'				=> 'Countdown',
		'pix_cta'					=> 'Cta',
		'pix_event'					=> 'Event',
		'pix_3d_box'				=> '3dbox',
		'fancy_box'					=> 'FancyBox',
		'pix_fancy_mockup'			=> 'FancyMockup',
		'pix_faq'					=> 'Faq',
		'pix_gallery'				=> 'Gallery',
		'pix_highlight_box'			=> 'HighlightBox',
		'pix_img_carousel'			=> 'ImgCarousel',
		'pix_img_box'				=> 'ImgBox',
		'pix_img_slider'			=> 'ImgSlider',
		'pix_levels'				=> 'Levels',
		'pix_map'					=> 'Map',
		'pix_marquee'				=> 'Marquee',
		'pix_numbers'				=> 'Numbers',
		'pix_photo_box'				=> 'PhotoBox',
		'pix_photo_stack'			=> 'PhotoStack',
		'pix_products_carousel'		=> 'ProductsCarousel',
		'pix_progress_bars'			=> 'ProgressBars',
		'pix_shop_category'			=> 'ShopCategory',
		'pix_slider'				=> 'Slider',
		'pix_tabs'					=> 'Tabs',
		// 'pix_h_text_tabs'		=> 'TabsHText', Elementor Only
		// 'pix_v_text_tabs'		=> 'TabsVText', Elementor Only
		'pix_team_member'			=> 'TeamMember',
		'pix_team_member_circle'	=> 'TeamMemberCircle',
		'pix_testimonial'			=> 'Testimonial',
		'pix_testimonial_masonry'	=> 'TestimonialMasonry',
		'testimonials_slider'		=> 'TestimonialsSlider',
		'pix_review'				=> 'Review',
		'pix_reviews_slider'		=> 'ReviewsSlider',
		'pix_text'					=> 'Text',
		'pix_video'					=> 'Video',
		'pix_video_popup'			=> 'VideoPopup',
		'pix_video_slider'			=> 'VideoSlider',
		'pix_story'					=> 'Story',
		'pix-social-icons'			=> 'SocialIcons',
		'pix_pricing'				=> 'Pricing',
		'pix_pricing_group'			=> 'PricingGroup',
		'pix_feature_list'			=> 'FeatureList',
		'content_box'				=> 'ContentBox',
		'pix_content_tab'			=> 'ContentTab',
		'content_tabs'				=> 'ContentTabs',
		'pix_vertical_tabs'			=> 'ContentTabs',
		'pix_card'					=> 'Card',
		'pix_dividers'				=> 'Dividers',
		'pix_img'					=> 'Img',
		'pix_button'				=> 'Button',
		'pix-button'				=> 'Button',
		'pix_blog_slider'			=> 'BlogSlider',
		'pix_icon'					=> 'Icon',
		'pix_highlighted_text'		=> 'HighlightedText',
		'pix_portfolio_slider'		=> 'PortfolioSlider',
		'pix_portfolio'				=> 'Portfolio',
		'pix_badge'					=> 'Badge',
		'pix_search'				=> 'Search',
		'heading'					=> 'Heading',
		'sliding-text'				=> 'SlidingText',
		'pix_blog'					=> 'Blog',
	];

	public function __construct() {
		$this->initShortcodes();
		add_action( 'wp_footer', [ $this, 'pixfortFooter' ], 19 );
		add_action( 'wp_footer', [ $this, 'pixfortCookies' ], 20 );
	}

	public function initShortcodes() {
		foreach ($this->shortcodes as $shortcode => $functionName) {
			add_shortcode($shortcode, [$this, 'handleShortcode']);
		}
		include_once('elements/extras/misc.php');
	}

	public function renderElement($name, $attr, $content = null) {
		if (file_exists(PIXFORT_PLUGIN_DIR . 'includes/elements/' . $name . '.php')) {
			include_once('elements/' . $name . '.php');
			$class = 'Pix'. $name;
			if (class_exists($class)) {
				$shortcode = new $class();
				return $shortcode->render($attr, $content);
			}
		}
		return '';
	}

	public function handleShortcode($attr, $content = null, $shortcode = '') {
		if (!isset($this->shortcodes[$shortcode])) {
			return ''; // Shortcode not found
		}
		$name = $this->shortcodes[$shortcode];
		include_once('elements/' . $name . '.php');
		$class = 'Pix'. $name;
		if (class_exists($class)) {
			$shortcode = new $class();
			return $shortcode->render($attr, $content);
		}
		return '';
	}

	public function enableSearchOverlay(){
        $this->searchOverlayState = true;
    }

	public static function pixAddInlineStyle($css){
		self::$elementsCSS .= $css;
	}

	public function pixfortFooter(){
		if(!empty(self::$elementsCSS)){
			wp_register_style('pixfort-elements-handle', false);
			wp_enqueue_style('pixfort-elements-handle');
			wp_add_inline_style('pixfort-elements-handle', $this::$elementsCSS);
		}
		if (!empty(pix_plugin_get_option('pic-custom-css'))) {
			wp_register_style('pix-custom-css', false);
			wp_enqueue_style('pix-custom-css');
			wp_add_inline_style('pix-custom-css', pix_plugin_get_option('pic-custom-css'));
		}
	}

	public function pixfortCookies() {
		$options = get_option('pix_options');
		if (!empty($options['pix-enable-cookies'])) {
			include_once('elements/extras/cookies.php');
		}
	}

}
