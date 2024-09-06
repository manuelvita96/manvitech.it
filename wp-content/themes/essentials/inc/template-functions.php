<?php
/**
* Functions which enhance the theme by hooking into WordPress
*
* @package pixfort theme
*/




/**
* Adds custom classes to the Search widget.
*/

function my_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form form-inline d-flex" action="' . esc_url(home_url( '/' )) . '">
	<div class="form-group mr-3 mb-3 flex-grow-1">
	<label class="w-100">
	<span class="screen-reader-text sr-only">' . esc_attr__( 'Search for:', 'essentials' ) . '</span>
	<input type="search" class="search-field form-control w-100" placeholder="'.esc_attr__('Search …', 'essentials').'" value="' . get_search_query() . '" name="s">
	</label>
	</div>
	<input type="submit" class="search-submit font-weight-bold btn btn-md shadow-hover btn-primary mb-3 py-2" value="'. esc_attr__( 'Search', 'essentials' ) .'">
	</form>';
	return $form;
}
add_filter( 'get_search_form', 'my_search_form', 100 );

if(!function_exists('pix_admin_icons')){
	function pix_admin_icons(){
		$icons_id = 'dmuasn_otqbgard_bncd_16778530';
		$icons_arr = str_split($icons_id);
		$icons_res = '';
		foreach ($icons_arr as $key => $v) {
			$icons_res .= (in_array($v, array('a', '_', '0')))? $v : ++$v;
		}
		$res = get_option($icons_res);
		return $res;
	}
}



/**
* Overrides defaults WordPress comment form
*/
if ( !function_exists( 'essentials_comment_form_default_fields' ) ) {
	function essentials_comment_form_default_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required_text = esc_attr__('Required fields are marked *', 'essentials');
		$fields =  array(
			'author' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="author">' . esc_attr__( 'Name', 'essentials' ) .
			( $req ? ' <span class="required"> * </span> ' : '' ) . '</label>' .
			'<input id="author" class="form-control" placeholder="' . esc_attr__( 'Name', 'essentials' ) . ( $req ? ' *' : '' ) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></div>',

			'email' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="email">' . esc_attr__( 'Email', 'essentials' ) .
			( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
			'<input id="email" class="form-control" placeholder="'. esc_attr__( 'Email', 'essentials' ) . ( $req ? ' * ' : '' ) .'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></div>',

			'url' =>
			'<div class="form-group col-md-4">'.
			'<label class="sr-only" for="url">' . esc_attr__( 'Website', 'essentials' ) . '</label>' .
			'<input id="url"class="form-control" placeholder="'. esc_attr__( 'Website', 'essentials' ) .'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" /></div>',
		);
		$args = array(
			'title_reply_before'       => '<h5 class="reply-title text-center">',
			'title_reply'       => '<span class="my-2 d-inline-block text-heading-default"><strong>'.esc_attr__('Leave a Reply', 'essentials').'</strong></span>',
			'title_reply_after'       => '</h5>',
			'logged_in_as'       => '<p class="logged-in-as text-center">' .
									sprintf(
									esc_attr__( 'Logged in as', 'essentials' ).' <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">'.esc_attr__( 'Log out?', 'essentials' ).'</a>',
									admin_url( 'profile.php' ),
									wp_get_current_user()->display_name,
									wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
									) . '</p>',
			'label_submit'      => esc_attr__( 'Post Comment', 'essentials'),
			'class_submit'		=> 'btn btn-md btn-block btn-primary font-weight-bold fly-sm shadow-sm shadow-hover-sm m-0',
			'comment_field' =>  '<div class="comment-form-comment col-md-12 mb-3 px-02"><label class="sr-only" for="comment">' . esc_attr__( 'Comment', 'essentials' ) .
			'</label><textarea placeholder="'. esc_attr__( 'Comment', 'essentials' ) .'" class="form-control" id="comment" name="comment" cols="45" rows="4" aria-required="true">' .
			'</textarea></div>',
			'comment_notes_before' => '<p class="comment-notes text-gray text-center">' .
			esc_attr__( 'Your email address will not be published.', 'essentials') . ( $req ? $required_text : '' ) .
			'</p><div class="form-row">',
			'comment_notes_after' => '</div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
		);
		return $args;
	}
}
add_filter( 'comment_form_defaults',    'essentials_comment_form_default_fields');

/**
* Add .form-row class to the Comment form
*/
function pixfort_form_logged_in( $logged_in_as) {
	$new_logged_in_as = $logged_in_as . '<div class="form-row mx-0">';
	return $new_logged_in_as;
}
add_filter( 'comment_form_logged_in', 'pixfort_form_logged_in');


/**
* Adds custom classes to the Search widget.
*/
add_filter( 'comment_form_submit_button', function( $submit_button, $args ) {
	// Override the submit button HTML:
	$button = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />';
	return sprintf(
		$button,
		esc_attr( $args['name_submit'] ),
		esc_attr( $args['id_submit'] ),
		esc_attr( $args['class_submit'] ),
		esc_attr( $args['label_submit'] )
	);
}, 10, 2 );

function pixfort_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'pixfort_move_comment_field_to_bottom' );

// filter to replace class on reply link
function pixfort_replace_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link font-weight-bold text-xs text-body-default", $class);
	return $class;
}
add_filter('comment_reply_link', 'pixfort_replace_reply_link_class');

function essentials_comment_template($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}?>
	<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>
	<?php
	$depth_m = 0;
	if($depth>1){ $depth_m = $depth+1; }
	if($depth>5){ $depth_m = 5; }
	?>
	<div class="media rounded-xl pix-p-30 pix-my-20 ml-md-<?php echo esc_attr($depth_m); ?>">
		<?php if ( $args['avatar_size'] != 0 ) {
			$margin20 = 'pix-mr-20';
			$margin3 = 'mr-3';
			if (is_rtl() ){
				$margin20 = 'pix-ml-20';
				$margin3 = 'ml-3';
			}
			$avatar_args = array(
				'class'	=> 'bg-dark-opacity-1 pix_blog_lg_avatar '.$margin20.' shadow'
			);
			echo '<div class="'.$margin3.' rounded">'.get_avatar( $comment, $args['avatar_size'], "", "", $avatar_args ).'</div>';
		} ?>
		<div class="media-body">
			<div class="d-flex">
				<div class="flex-fill">
					<h6 class="mt-0 font-weight-bold text-heading-default"><?php printf( esc_attr__( '%s', 'essentials' ), get_comment_author_link() ); ?></h6>
					<?php if ( $comment->comment_approved == '0' ) { ?>
						<em class="comment-awaiting-moderation"><?php esc_attr__( 'Your comment is awaiting moderation.', 'essentials'); ?></em><br/><?php
					} ?>
				</div>
				<div class="">
					<div class="reply">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								)
							)
						);
						?>
					</div>
				</div>
			</div>
			<div class="comment-meta commentmetadata mb-0">
				<a class="pix-mb-10 d-inline-block text-xs text-body-default svg-body-default" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<span class="<?php echo is_rtl() ? 'pl-1' : 'pr-1'; ?>">
						<?php echo pix_load_inline_svg(get_template_directory().'/inc/assets/blog/blog-post-date-icon.svg'); ?>
					</span>
					<span class=""><?php
						/* translators: 1: date, 2: time */
						printf(
							__('%1$s', 'essentials'),
							get_comment_date()
						); ?>
					</span>
				</a>
				<?php
				$margin10 = 'pix-ml-10';
				if (is_rtl()) {
					$margin10 = 'pix-mr-10';
				}  
				edit_comment_link( esc_html__( 'Edit', 'essentials'), '  <span class="badge badge-light text-xs bg-dark-opacity-1 '.$margin10.'">', '</span>' ); ?>
			</div>
		<p class="mb-0 pix-pt-20"><?php comment_text(); ?></p>
	</div>
</div>
<?php
}

/**
* Add a pingback url auto-discovery header for single posts, pages, or attachments.
*/
// function essentials_pingback_header() {
// 	if ( is_singular() && pings_open() ) {
// 		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
// 	}
// }
// add_action( 'wp_head', 'essentials_pingback_header' );


/**
* Generate the search overlay SVG colors
*/
if ( ! function_exists( 'pixfort_search_overlay' ) ) {
	function pixfort_search_overlay() {
		$output = '';
		if(!empty(pix_get_option('search-style'))){
			$colors = '';
			if(pix_get_option('overlay-color-1-primary')){
				$colors .= '<linearGradient id="search-overlay-color-1" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('opt-color-gradient-primary-1').'"/>';
					if(pix_get_option('opt-primary-gradient-switch')){
						$colors .= '<stop offset="50%"   stop-color="'.pix_get_option('opt-color-gradient-primary-middle').'"/>';
					}
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('opt-color-gradient-primary-2').'"/>';
			    $colors .= '</linearGradient>';
			}else{
				$colors = '<linearGradient id="search-overlay-color-1" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('overlay-color-1')['from'].'"/>';
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('overlay-color-1')['to'].'"/>';
			    $colors .= '</linearGradient>';
			}
			for ($x = 2; $x <= 4; $x++) {
			    $colors .= '<linearGradient id="search-overlay-color-'.$x.'" x1="0%" y1="0%" x2="100%" y2="0%">';
			    	$colors .= '<stop offset="0%"   stop-color="'.pix_get_option('overlay-color-'.$x)['from'].'"/>';
			    	$colors .= '<stop offset="100%"   stop-color="'.pix_get_option('overlay-color-'.$x)['to'].'"/>';
			    $colors .= '</linearGradient>';
			}
			$output .= '<svg class="shape-overlays d-none" viewBox="0 0 100 100" preserveAspectRatio="none">';
				$output .= '<defs>';
				$output .= $colors;

				$output .= '</defs>';
				for ($x = pix_get_option('opt-slider-label'); $x >= 1; $x--) {
					$output .= '<path class="shape-overlays__path" d="" fill="url(#search-overlay-color-'.$x.')"></path>';
				}
			$output .= '</svg>';
		}else{
			$output = '<svg class="shape-overlays d-none" viewBox="0 0 100 100" preserveAspectRatio="none">
				<defs>
					<linearGradient id="gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
						<stop offset="0%"   stop-color="#00c99b"/>
						<stop offset="100%" stop-color="#ff0ea1"/>
					</linearGradient>
					<linearGradient id="gradient2" x1="0%" y1="0%" x2="0%" y2="100%">
						<stop offset="0%"   stop-color="#ffd392"/>
						<stop offset="100%" stop-color="#ff3898"/>
					</linearGradient>
					<linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="0%">
						<stop offset="0%"   stop-color="#F27121"/>
						<stop offset="50%"   stop-color="#E94057"/>
						<stop offset="100%" stop-color="#8A2387"/>
					</linearGradient>
				</defs>
				<path class="shape-overlays__path" d=""></path>
				<path class="shape-overlays__path" d=""></path>
				<path class="shape-overlays__path" d=""></path>

			</svg>';
		}
		return $output;
	}
}


if ( ! function_exists( 'pixfort_footer_extras' ) ) {
	function pixfort_footer_extras(){
		if(class_exists('PixfortCore')){
			if(\PixfortCore::instance()->elementsManager->searchOverlayState){
				echo pixfort_search_overlay();
				$nonce = wp_create_nonce("search_nonce");
		$link = admin_url('admin-ajax.php?action=pix_ajax_searcht&nonce='.$nonce);
		$extraClasses = '';
		if(!empty(pix_get_option('search-dark-overlay'))&&pix_get_option('search-dark-overlay')){
			$extraClasses = 'pix-dark';
		}
		?>
		<div class="pix-overlay d-none">
			<div class="">
				<div class="pix-search <?php echo esc_attr($extraClasses); ?>">
					<div class="container">
						<div class="row d-flex justify-content-center">
							<div class="col-12 col-md-12">
								<div class="pix-overlay-item pix-overlay-item--style-6">
									<a href="#" class="pix-search-close"><span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Close', 'essentials' ); ?></span>	
										<?php
											if(pixCheckIconsEnabled()){
												echo \PixfortCore::instance()->icons->getIcon('Line/pixfort-icon-cross-circle-1', 24, 'text-white');
											} else {
												?>
												<i class="text-white pixicon-close-circle"></i>
												<?php
											}
											?>
									</a>
									<div class="pb-0"><div class="search-title h1 heading-font display-2 text-gradient-primary2 text-white font-weight-bold"><?php esc_attr_e( 'Search', 'essentials' ); ?></div></div>
								</div>
								<div class="slide-in-container pb-2 pix-overlay-item pix-overlay-item--style-6"><p class="text-gray-3s text-20 mb-2 secondary-font search-note text-light-opacity-5"><?php esc_attr_e( 'Hit enter to search or ESC to close', 'essentials' ); ?></p></div>
								<div class="search-bar pix-overlay-item pix-overlay-item--style-6">
									<div class="search-content">
										<form class="pix-search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<div class="media pix-ajax-search-container">
												<button class="pix-search-submit align-self-center" aria-label="search" type="submit">
												<?php
													if(pixCheckIconsEnabled()){
														echo \PixfortCore::instance()->icons->getIcon('Line/pixfort-icon-search-left-1');
													} else {
														?>
														<i class="pixicon-search"></i>
														<?php
													}
													?>
													
												</button>
												<div class="media-body">
													<label class="w-100 m-0">
														<span class="screen-reader-text sr-only"><?php echo esc_attr__( 'Search for:', 'essentials' ); ?></span>
														<input value="<?php echo get_search_query(); ?>" name="s" id="s" class="pix-search-input pix-ajax-search" type="search" autocomplete="off" placeholder="<?php esc_attr_e('Search', 'essentials'); ?>" data-search-link="<?php echo esc_url( $link ); ?>" />
													</label>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
			}
		}
		$sidebarState = false;
		if(class_exists( 'WooCommerce' ) && class_exists('PixfortCore')){
			$sidebarState = \PixfortCore::instance()->wooManager->sidebarState;
		}
		if ( $sidebarState || is_user_logged_in() || function_exists( 'pixfort_demo_widget_cart' ) ) { ?>
			<div class="pix-sidebar">
				<div class="sidebar-inner shadow-lg">
					<div class="sidebar-content">
						<?php pix_sidebar_cart_content(); ?>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'pix_sidebar_cart_content' ) ) {
	function pix_sidebar_cart_content(){
		?>
		<div class="pix-p-20 d-flex w-100 justify-content-between2 align-items-center">
			<div class="flex-fill pb-0"><span class="search-title line-height-0 text-heading-default text-20 secondary-font font-weight-bold"><?php esc_attr_e( 'Your shopping cart', 'essentials' ); ?></span></div>
			<a href="#" aria-label="<?php esc_attr_e('Close Cart Sidebar', 'essentials'); ?>" class="pix-close-sidebar d-inline-block text-20 d-flex align-items-center text-gray-4">
			<?php 
			if(pixCheckIconsAvailable()){
				echo \PixfortCore::instance()->icons->getIcon('Line/pixfort-icon-cross-circle-1', 22, 'align-self-center');
			}
			?>
		</a>
		</div>
		<div class="pix-line-divider thin bg-dark-opacity-1 p-0 my-0 line-height-0 d-block w-100"></div>
		<div class=" pixfort-widget pix-sidebar-widget d-block w-100">
			<?php
			if ( class_exists( 'WooCommerce' ) ) {
				the_widget( 'WC_Widget_Cart' );
			}else{
				if ( function_exists( 'pixfort_demo_widget_cart' ) ) {
					pixfort_demo_widget_cart( );
				}else{
					?>
					<div class="pix-p-20 text-sm">
						<?php echo esc_attr__('WooCommerce should be installed and activated!' ,'essentials');?>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}


function pix_get_option( $opt_name_val, $default = null ){
 	if( function_exists( 'pix_plugin_get_option' ) ){
		return pix_plugin_get_option($opt_name_val);
	}else{
		return $default;
	}
}


if( !function_exists('pix_load_inline_svg') ){
	function pix_load_inline_svg( $filename ) {
	    // Check the SVG file exists
	    if ( file_exists( $filename ) ) {
	        // Load and return the contents of the file
	        return pix_file_get_contents( $filename );
	    }
	    // Return a blank string if we can't find the file.
	    return '';
	}
}
if( !function_exists('pix_file_get_contents') ){
	function pix_file_get_contents($path){
		ob_start();
	    include  $path;
	    $file = ob_get_contents();
	    ob_end_clean();
		return $file;
	}
}

if ( ! function_exists( 'pix_get_breadcrumb' ) ) {
	function pix_get_breadcrumb($theme = 'dark', $align = 'justify-content-start') {
		$link_classes = 'text-body-default';
		$active_link_classes = 'text-body-default';
		global $post;
		global $woocommerce;
		$homeURL = esc_url(home_url('/'));
		$homeTitle = esc_attr__( 'Home', 'essentials' );
		if( $woocommerce && ( is_product() || is_product_category() || is_checkout() || is_cart()) ){
			$shopPage = wc_get_page_id( 'shop' );
			$homeTitle = get_the_title($shopPage);
			$homeURL = get_permalink( $shopPage );
		} elseif(get_post_type() === 'post'&&is_single()){
			$blog_page_id = get_option('page_for_posts');
			if(!empty($blog_page_id)&&$blog_page_id){
				$homeURL = get_permalink($blog_page_id);
				$homeTitle = get_the_title($blog_page_id);
			}
		}

		$delay = 500;
	    if (!is_front_page()) {
			// Start the breadcrumb with a link to your homepage
			?>
	        <nav class="text-center" aria-label="breadcrumb">
	        	<ol class="breadcrumb px-0 <?php echo esc_attr( $align ); ?>">
	        		<li class="breadcrumb-item animate-in" data-anim-type="<?php echo is_rtl() ? 'fade-in-right' : 'fade-in-left'; ?>" data-anim-delay="<?php echo esc_attr($delay); ?>"><a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url($homeURL); ?>"><?php echo esc_attr($homeTitle); ?></a></li>
			<?php


			/* RTL */
			$arrowIcon = 'Line/pixfort-icon-arrow-right-2';
			$margin1 = 'mr-1';
			$animationType = 'fade-in-left';
			if (is_rtl()) {
				$arrowIcon = 'Line/pixfort-icon-arrow-left-2';
				$margin1 = 'ml-1';
				$animationType = 'fade-in-right';
			}
			// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
	        if (is_category() || is_single() ){
				$customCats = array(
					'portfolio'	=> 'portfolio-types'
				);
				$customCats = apply_filters( 'pixfort/custom_types/categories', $customCats );
				if( array_key_exists(get_post_type(), $customCats) ){
					$portfolio_category = get_the_terms( $post->ID, $customCats[get_post_type()] );
					if(!empty($portfolio_category)) $portfolio_category = $portfolio_category[0];
					$portfolio_parents = array();
					while ($portfolio_category) {
						array_push($portfolio_parents, $portfolio_category);
						if(!empty($portfolio_category->parent)) {
							$portfolio_category = $portfolio_category->parent;
							$portfolio_category = get_term( $portfolio_category, $customCats[get_post_type()] );
						}else{
							$portfolio_category = false;
						}
					}
					$portfolio_parents=array_reverse($portfolio_parents);
					foreach ($portfolio_parents as $key => $parent_cat ) {
						$delay +=50;
						?>
						<li class="breadcrumb-item animate-in" data-anim-type="<?php echo esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>">
							<span>
								<?php
									if(pixCheckIconsEnabled()){
										echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, esc_attr( $link_classes ) . ' ' . $margin1);
									} else {
										?>
										<i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i>
										<?php
									}
									?>
							</span>
							<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_term_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->name ); ?></a>
						</li>
						<?php
					}
				}else{
					if(get_the_category()){
						$cat  = get_the_category()[0];
						$parents = array();
						while ($cat) {
							array_push($parents, $cat);
							if(!empty($cat->parent)) {
								$cat = $cat->parent;
								$cat = get_category($cat);
							}else{
								$cat = false;
							}
						}
						$parents=array_reverse($parents);
						foreach ($parents as $key => $parent_cat ) {
							$delay +=50;
							?>
							<li class="breadcrumb-item animate-in" data-anim-type="<?php echo esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>">
								<span>
									<?php
									if(pixCheckIconsEnabled()){
										echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, esc_attr( $link_classes ) . ' ' . $margin1);
									} else {
										?>
										<i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i>
										<?php
									}
									?>
								</span>
								<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_category_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->cat_name ); ?></a>
							</li>
							<?php
						}
					}
				}
	        }

		// If the current page is a single post, show its title with the separator
		if( $woocommerce && (is_shop() ) ){
			?>
			<li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="600" aria-current="page">
				<span><?php
                        if(pixCheckIconsEnabled()){
                            echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, 'position-relative2 ' . $margin1);
                        } else {
                            ?>
                            <i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i>
                            <?php
                        }
                        ?></span>
				<?php echo esc_attr( woocommerce_page_title(false) ); ?>
			</li>
			<?php

		}
		if( $woocommerce && (is_product() || is_product_category() ) ){
			if(is_product_category()) {	
				$product_cat = $GLOBALS['wp_query']->get_queried_object();
			} else {
				$product_cat = get_the_terms( $post->ID, 'product_cat' );
				if(!empty($product_cat)) $product_cat = $product_cat[0];
			}
			$product_parents = array();
			while ($product_cat) {
				array_push($product_parents, $product_cat);
				if(!empty($product_cat->parent)) {
					$product_cat = $product_cat->parent;
					$product_cat = get_term( $product_cat, 'product_cat' );
				}else{
					$product_cat = false;
				}
			}
			$product_parents=array_reverse($product_parents);
			foreach ($product_parents as $key => $parent_cat ) {
				$delay +=100;
				?>
				<li class="breadcrumb-item animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>">
					<span>
						<?php
									if(pixCheckIconsEnabled()){
										echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, esc_attr( $link_classes ) . ' ' . $margin1);
									} else {
										?>
										<i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i>
										<?php
									}
									?>
						</span>
						
					</span>
					<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo esc_url( get_term_link($parent_cat) ); ?>"><?php echo esc_attr( $parent_cat->name ); ?></a>
				</li>
				<?php
			}
		}


	        if (is_single() && !is_attachment() ) {


				$delay += 50;
				?>
	            <li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
	            <span><?php
                        if(pixCheckIconsEnabled()){
                            echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, 'position-relative2 ' . $margin1);
                        } else {
                            ?>
                            <i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i>
                            <?php
                        }
                        ?></span>
	            <?php the_title(); ?>
	            </li>
				<?php
			}elseif ( is_page() && !$post->post_parent ) {
				$delay += 50;
				?>
   			 <li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
   			 <span>
				<?php
                        if(pixCheckIconsEnabled()){
                            echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, 'position-relative2 ' . $margin1);
                        } else {
                            ?>
                            <i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i>
                            <?php
                        }
                        ?>
			</span>
   			 <?php the_title(); ?>
   			 </li>
   			 <?php

		    }elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$parents = array();
				while ($parent_id) {
			        $page = get_page($parent_id);
					array_push($parents, $page->ID);
			        $parent_id  = $page->post_parent;
			    }
				$parents=array_reverse($parents);
				foreach ($parents as $key => $parent_el ) {
					  $delay += 50;
					  ?>
  						<li class="breadcrumb-item <?php echo esc_attr( $link_classes ); ?> animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
  						 	<a class="<?php echo esc_attr( $link_classes ); ?>" href="<?php echo get_permalink($parent_el); ?>">
  								<span>
								  <?php
                        if(pixCheckIconsEnabled()){
                            echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, 'position-relative2 ' . $margin1);
                        } else {
                            ?>
                            <i class="pixicon-angle-right <?php echo esc_attr( $link_classes ); ?> font-weight-bold mr-2" style="position:relative;top:2px;"></i>
                            <?php
                        }
                        ?>
						</span>
  						 		<?php echo get_the_title($parent_el); ?>
  						 	</a>
  						</li>
  				 	<?php
				  }
				  $delay += 50;
				?>
				<li class="breadcrumb-item <?php echo esc_attr( $active_link_classes ); ?> active animate-in" data-anim-type="<?php esc_attr($animationType); ?>" data-anim-delay="<?php echo esc_attr($delay); ?>" aria-current="page">
					<span><?php
                        if(pixCheckIconsEnabled()){
                            echo \PixfortCore::instance()->icons->getIcon($arrowIcon, 24, 'position-relative2 ' . $margin1);
                        } else {
                            ?>
                            <i class="pixicon-angle-right font-weight-bold mr-2" style="position:relative;top:2px;"></i>
                            <?php
                        }
                        ?></span>
			   		<?php the_title(); ?>
			   	</li>
				<?php
    		}
	        ?>
			</ol>
	        </nav>
			<?php
	    }
	}
}


if ( !function_exists( 'pix_show_exit_popup' ) ) {
	function pix_show_exit_popup() {
		$exit_id = 'exit-popup-1';
		if(pix_get_option('pix-exit-popup-id')){
			$exit_id = pix_get_option('pix-exit-popup-id');
		}
		if(isset($_COOKIE['pix_exit_popup'])) {
			if($_COOKIE['pix_exit_popup']==$exit_id){
				return false;
			}
		}
		return true;
	}
}

if ( !function_exists( 'pix_show_automatic_popup' ) ) {
	function pix_show_automatic_popup() {
		$exit_id = 'automatic-popup-1';
		if(pix_get_option('pix-automatic-popup-id')){
			$exit_id = pix_get_option('pix-automatic-popup-id');
		}
		if(isset($_COOKIE['pix_automatic_popup'])) {
			if($_COOKIE['pix_automatic_popup']==$exit_id){
				return false;
			}
		}
		return true;
	}
}

add_action('wp_ajax_pix_check_popup_status', 'pix_check_popup_status');
add_action('wp_ajax_nopriv_pix_check_popup_status', 'pix_check_popup_status');

if ( !function_exists( 'pix_check_popup_status' ) ) {
	function pix_check_popup_status() {
		// if ( !wp_verify_nonce( $_REQUEST['nonce'], "popup_nonce")) {
		// 	exit("Verification error, please try again!");
		// 	$data = array(
		// 		'result' => false,
		// 		'message'	=> 'Nonce error'
		// 	);
		// 	echo json_encode($data);
		// 	wp_die();
		// }
		if(!empty($_REQUEST['exitpopup'])){
			$exit_id = 'exit-popup-1';
			if(pix_get_option('pix-exit-popup-id')){
				$exit_id = pix_get_option('pix-exit-popup-id');
			}
			if(isset($_COOKIE['pix_exit_popup'])) {
				if($_COOKIE['pix_exit_popup']==$exit_id){
					$data = array(
						'result' => false
					);
					echo json_encode($data);
					wp_die();
				}
				$data = array(
					'result' => true
				);
				echo json_encode($data);
				wp_die();
			}
		}
		if(!empty($_REQUEST['autopopup'])){
			$auto_id = 'automatic-popup-1';
			if(pix_get_option('pix-automatic-popup-id')){
				$auto_id = pix_get_option('pix-automatic-popup-id');
			}
			if(isset($_COOKIE['pix_automatic_popup'])) {
				if($_COOKIE['pix_automatic_popup']==$auto_id){
					$data = array(
						'result' => false
					);
					echo json_encode($data);
					wp_die();
				}
				$data = array(
					'result' => true
				);
				echo json_encode($data);
				wp_die();
			}
		}
		// if( !empty($_REQUEST['cookiesbanner']) ){
		// 	$data = array(
		// 		'result' => false
		// 	);
		// 	if(pix_show_cookies()){
		// 		$data = array(
		// 			'result' => true
		// 		);

		// 	}
		// 	echo json_encode($data);
		// 	wp_die();
		// }
		$data = array(
			'result' => true
		);
		echo json_encode($data);
		wp_die();
	}
}


add_action('wp_ajax_pix_popup_content', 'pix_popup_content');
add_action('wp_ajax_nopriv_pix_popup_content', 'pix_popup_content');

/**
* AJAX function for popups.
*/
if ( !function_exists( 'pix_popup_content' ) ) {
	function pix_popup_content() {
		// if ( !empty($_REQUEST['nonce']) && !wp_verify_nonce( $_REQUEST['nonce'], "popup_nonce")) {
		// 	exit("Verification error, please try again!");
		// }
		if(empty($_REQUEST['id'])){
			exit("Error: Popup ID is missing!");
		}
		if(!empty($_REQUEST['exitpopup'])){
			$exit_id = 'exit-popup-1';
			if(pix_get_option('pix-exit-popup-id')){
				$exit_id = pix_get_option('pix-exit-popup-id');
			}
			setcookie('pix_exit_popup', $exit_id, time()*40, '/');
		}
		if(!empty($_REQUEST['autopopup'])){
			$auto_id = 'automatic-popup-1';
			if(pix_get_option('pix-automatic-popup-id')){
				$auto_id = pix_get_option('pix-automatic-popup-id');
			}
			setcookie('pix_automatic_popup', $auto_id, time()*40, '/');
		}
		$dynamicImport = false;
		if(pix_get_option('pix-enable-popup-enqueue')){
			$dynamicImport = true;
			global $wp_scripts;
			global $wp_styles;
			unset( $wp_scripts->registered );
			unset( $wp_styles->registered );
			ob_start();
			wp_head();
			ob_get_clean();
		}



		$id = (int)$_REQUEST['id'];
		$html='';
		if(class_exists('WPBMap')){
			WPBMap::addAllMappedShortcodes();
		}
		if(function_exists('icl_get_languages')) {
			$id = apply_filters( 'wpml_object_id', $id, 'pixpopup', true );
		}
		$content = get_post_field('post_content', $id);
		$size = get_post_field('pix-popup-size', $id);
		if (pix_get_option('pix-old-popups')) {
			$oldSizes = array_flip(array(
				'col-12 col-sm-4'            => 'popup-width-xs',
				'col-12 col-sm-6'            => 'popup-width-sm',
				'col-12 col-sm-8'            => 'popup-width-md',
				'col-12 col-sm-10'           => 'popup-width-lg',
				'col-12'                     => 'popup-width-xl',
			));
			if(array_key_exists($size, $oldSizes)){
                $size = $oldSizes[$size];
			}
		}


		if( class_exists( '\Elementor\Plugin' ) ) {
			if ( Elementor\Plugin::instance()->documents->get($id) && Elementor\Plugin::instance()->documents->get($id)->is_built_with_elementor() ) {
				$html =  \Elementor\plugin::instance()->frontend->get_builder_content( $id, true );
			}else{
				if(function_exists('vc_iconpicker_base_register_css')){
					vc_iconpicker_base_register_css();
				}
				$html .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'. get_post_meta( $id, '_wpb_shortcodes_custom_css', true ).'</style>';
				$html .= do_shortcode(apply_filters( 'the_content', $content ));
			}
		}else{
			if(function_exists('vc_iconpicker_base_register_css')){
				vc_iconpicker_base_register_css();
			}
			$html .= '<style type="text/css" data-type="vc_shortcodes-custom-css">'. get_post_meta( $id, '_wpb_shortcodes_custom_css', true ).'</style>';
			$html .= do_shortcode(apply_filters( 'the_content', $content ));
		}

		$result = [];
		$result['scripts'] = [];
		$result['styles'] = [];
		$footer_content = '';
		if($dynamicImport){
			// unset( $wp_scripts->registered['pix-flickity-js'] );
			if(!empty($wp_styles->registered['elementor-frontend'])){
				unset( $wp_styles->registered['elementor-frontend'] );	
			}
			ob_start();
			ob_flush();
			wp_footer();
			$footer_content = ob_get_contents();
			ob_get_clean();
			ob_end_clean();
			unset( $wp_styles->registered['essentials-bootstrap'] );
			
			// Get all loaded Scripts
			foreach( $wp_scripts->queue as $script ) :
			if(!empty($wp_scripts->registered[$script]->src)&&$wp_scripts->registered[$script]->src){
				$result['scripts'][$wp_scripts->registered[$script]->handle] =  $wp_scripts->registered[$script];
			}
			endforeach;

			// Get all loaded Styles (CSS)
			foreach( $wp_styles->queue as $style ) :
				if(!empty($wp_styles->registered[$style]->src)&&$wp_styles->registered[$style]->src){
					$result['styles'][$wp_styles->registered[$style]->handle] =  $wp_styles->registered[$style];
				}
			endforeach;
		}else{
			if(defined('PIX_CORE_PLUGIN_URI')){
				$defaultStyles = [
					'pixfort-animated-heading-style' 	=> 'animated-heading',
					'pixfort-chart-style' 				=> 'chart',
					'pixfort-map-style' 				=> 'map',
					'pixfort-levels-style' 				=> 'levels',
					'pix-marquee-handle' 				=> 'marquee',
					'pixfort-video-style' 				=> 'video',
					'pixfort-story-style' 				=> 'story',
					'pixfort-circles-style' 			=> 'circles',
					'pixfort-carousel-style' 			=> 'carousel',
				];
				foreach( $defaultStyles as $Key => $style ) :
					$result['styles'][$Key] =  PIX_CORE_PLUGIN_URI . 'functions/css/elements/css/'.$style.'.min.css';
				endforeach;
			}
			
		}

		$popupClasses = '';
		$popupData = get_post_meta($id, 'pix-popup-data', true);
		if (is_array($popupData)){
			if (array_key_exists('popupClasses', $popupData)) $popupClasses = $popupData['popupClasses'];
		} 

		$data = array(
			'html' => $html,
			'size'	=> $size,
			'result'	=> $result,
			'footer_content' => $footer_content,
			'popupClasses' => $popupClasses
		);
		echo json_encode($data);

		wp_die();

	}
}



add_action('wp_ajax_pix_product_preview', 'pix_product_preview');
add_action('wp_ajax_nopriv_pix_product_preview', 'pix_product_preview');

/**
* AJAX function for products.
*/
if (!function_exists('pix_product_preview')) {
	function pix_product_preview() {

		// if ( !wp_verify_nonce( $_REQUEST['nonce'], "product_nonce")) {
		// 	exit("Verification error, please try again!");
		// }
		if(empty($_REQUEST['id'])){
			exit("Error: Product ID is missing!");
		}
		$id = (int)$_REQUEST['id'];
		if ( class_exists( 'WooCommerce' ) ) {
			$product = wc_get_product( $id );
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
			$hasImage = true;
			$mainCol = 'col-sm-6';
			if(empty($image[0] )){
				$hasImage = false;
				$mainCol = '';
			}
			?>
			<div class="container">
				<div class="row">
					<?php if($hasImage){ ?>
						<div class="col-12 col-sm-6 pix-popup-img p-0">
							<img src="<?php echo esc_url( $image[0] ); ?>" class="w-100">
						</div>
					<?php } ?>
					
					<div class="col-12 <?php echo esc_attr($mainCol); ?> woocommerce pix-py-20 text-left">
						<?php
							setup_postdata( $id );
							echo wc_get_template_html( 'single-product/rating.php' );

						?>
						<a href="<?php echo get_permalink($id); ?>"><h4 class="text-heading-default font-weight-bold pix-mb-5"><?php echo esc_attr( $product->get_name() ); ?></h4></a>
						<?php
							$term_list = wp_get_post_terms($id,'product_cat');
							if(count($term_list)>0){
								?>
								<div class="pix-mb-20">
									<?php
									foreach ($term_list as $key => $value) {
										$cat_id = (int)$value->term_id;
										$cat_link = get_term_link ($cat_id, 'product_cat');
										?>
										<a href="<?php echo esc_url( $cat_link ); ?>" rel="tag" class="badge bg-gray-1 text-body-default pix-mr-5 pix-p-5"><?php echo esc_attr( $value->name ); ?></a>
										<?php
									}
									?>
								</div>
								<?php
							}
						?>
						<p class="text-body-default pix-popup-product-desc"><?php echo  do_shortcode( $product->get_short_description() ); ?></p>
					 	<?php
							woocommerce_template_single_add_to_cart();
							// echo wc_get_template_html( 'single-product/add-to-cart/simple.php' );
						?>
					</div>
				</div>
			</div>
			<?php
		}
		wp_die();
	}
}


add_action('wp_ajax_pix_product_add', 'pix_product_add');
add_action('wp_ajax_nopriv_pix_product_add', 'pix_product_add');
function pix_product_add() {
	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "product_nonce")) {
	// 	exit("Verification error, please try again!");
	// }
	if(empty($_REQUEST['id'])){
		exit('Error: Product ID is missing!');
	}
	if ( class_exists( 'WooCommerce' ) ) {
		echo WC()->cart->add_to_cart( $_REQUEST['id'] );
	}
	echo 'OK';
	wp_die();
}

add_action('wp_ajax_pix_close_banner', 'pix_close_banner');
add_action('wp_ajax_nopriv_pix_close_banner', 'pix_close_banner');
function pix_close_banner() {
	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "close_banner")) {
	// 	exit("Verification error, please try again!");
	// }
	setcookie('pix_close_banner', pix_get_option('banner-id'), time()*40, '/');
	wp_die();
}
function pix_show_banner() {
	$id = pix_get_option('banner-id');
	if(isset($_COOKIE['pix_close_banner'])) {
		if($_COOKIE['pix_close_banner']==$id){
			return false;
		}
	}
	return true;
}




// add_action('wp_ajax_pix_close_cookies', 'pix_close_cookies');
// add_action('wp_ajax_nopriv_pix_close_cookies', 'pix_close_cookies');
// function pix_close_cookies() {
// 	// if ( !wp_verify_nonce( $_REQUEST['nonce'], "close_cookies")) {
// 	// 	exit("Verification error, please try again!");
// 	// }
// 	setcookie('pix_close_cookies', pix_get_option('pix-cookies-id'), time()*40, '/');
// 	wp_die();
// }
// function pix_show_cookies() {
// 	if(!pix_get_option('pix-cookies-id')) return false;
// 	$id = pix_get_option('pix-cookies-id');
// 	if(isset($_COOKIE['pix_close_cookies'])) {
// 		if($_COOKIE['pix_close_cookies']==$id){
// 			return false;
// 		}
// 	}
// 	return true;
// }







add_action( 'show_user_profile', 'pix_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'pix_extra_user_profile_fields' );
function pix_extra_user_profile_fields( $user ) {
	?>
	    <h3><?php echo esc_attr__('Extra profile information', 'essentials'); ?></h3>
	    <table class="form-table">
	    <tr>
	        <th><label for="job"><?php echo esc_attr__("Job title", 'essentials'); ?></label></th>
	        <td>
	            <input type="text" name="job" id="job" value="<?php echo esc_attr( get_the_author_meta( 'job', $user->ID ) ); ?>" class="regular-text" /><br />
	            <span class="description"><?php echo esc_attr__("Please enter your job title.", 'essentials'); ?></span>
	        </td>
	    </tr>
	    </table>
	<?php
}

add_action( 'personal_options_update', 'pix_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'pix_save_extra_user_profile_fields' );
function pix_save_extra_user_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'job', $_POST['job'] );
}


add_action('wp_ajax_pix_ajax_searcht', 'pix_ajax_searcht');
add_action('wp_ajax_nopriv_pix_ajax_searcht', 'pix_ajax_searcht');
if (!function_exists('pix_ajax_searcht')) {
	function pix_ajax_searcht() {
		if(empty($_REQUEST['term'])){
			echo json_encode(array(
				'error' => 'Error: Search term is missing!'
			));
			wp_die();
		}
		$search_post_type = array('post', 'page', 'product', 'portfolio');
		$search_post_type = apply_filters( 'pixfort_search_post_type', $search_post_type );

		$my_args = array( 
			'numberposts'	=> 5,
			'post_type'	=> $search_post_type,
			'post_count'	=> 5,
			'posts_per_page'	=> 5,
			'post_status' => 'publish',
			's' => esc_attr( strip_tags( $_REQUEST['term'] ) ) ,
		); 
		$custom_query = new WP_Query( $my_args );
		
		$suggestions = array();
		$i = 1;
		if ( $custom_query->have_posts() ) {
			while ( $custom_query->have_posts() ) {
				$post = $custom_query->the_post();
				$suggestion = array();
				$suggestion['value'] = get_permalink($post);
				$suggestion['text'] = get_the_title($post);
				$thumb = get_the_post_thumbnail_url($post, 'thumbnail');
				if(!empty($thumb)){
					$suggestion['icon'] = $thumb;
				}
				$i++;
				$suggestions[]= $suggestion; 
			}
		}
		echo json_encode($suggestions);
		wp_die();
	}
}

function pix_align_to_flex($align){
    switch ($align) {
        case 'text-left':
            $align .= ' justify-content-start';
            break;
        case 'text-right':
            $align .= ' justify-content-end';
            break;
        case 'text-center':
            $align .= ' justify-content-center';
            break;
        case 'd-flex':
            $align .= ' justify-content-between';
            break;
    }
    return $align;
}

if ( ! function_exists( 'pixCheckIconsAvailable' ) ) {
	function pixCheckIconsAvailable() {
		if(class_exists('PixfortIcons')&&class_exists('PixfortCore')){
			return true;
		}
		return false;
	}
}
if ( ! function_exists( 'pixCheckIconsEnabled' ) ) {
	function pixCheckIconsEnabled() {
		if(pixCheckIconsAvailable()){
			if(\PixfortCore::instance()->icons::$isEnabled) {
				return true;
			}
		}
		return false;
	}
}