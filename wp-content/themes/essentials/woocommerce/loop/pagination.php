<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination pix-pagination d-sm-flex justify-content-center align-items-center" aria-label="<?php esc_attr_e( 'Product Pagination', 'essentials' ); ?>">
	<?php
		$prevIcon = '<i class="pixicon-angle-left align-self-center"></i>';
		$nextIcon = '<i class="pixicon-angle-right align-self-center"></i>';
		if(pixCheckIconsAvailable()){
			$prevIcon = \PixfortCore::instance()->icons->getIcon('Line/pixfort-icon-arrow-left-2', 24, 'align-self-center');
			$nextIcon = \PixfortCore::instance()->icons->getIcon('Line/pixfort-icon-arrow-right-2', 24, 'align-self-center');
		} 
		echo paginate_links(
		apply_filters(
			'woocommerce_pagination_args',
			array( // WPCS: XSS ok.
				'base'      => $base,
				'format'    => $format,
				'add_args'  => false,
				'current'   => max( 1, $current ),
				'total'     => $total,
				'prev_text'    => '<span class="d-sm-flex justify-content-center align-items-center">'.$prevIcon.'</span>',
                'next_text'    => '<span class="d-sm-flex justify-content-center align-items-center">'.$nextIcon.'</span>',
				'type'      => 'plain',
				'end_size'  => 3,
				'mid_size'  => 3,
			)
		)
	);
	?>
</nav>
