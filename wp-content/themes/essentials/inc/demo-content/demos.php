<?php

function pixfort_demo_sites() {
    $data = array();

    $import_url = 'https://import.pixfort.com/essentials/';
    $wpb = false;
    $elementor = false;

    if (defined('WPB_VC_VERSION')) {
        $wpb = true;
    }
    if (class_exists('\Elementor\Plugin')) {
        $elementor = true;
    }

    // if (!$wpb&&!$elementor) {
    //     $wpb = true;
    //     $elementor = true;
    // }

    if ($wpb) {
        $demo = array(
            'import_file_name'          => 'Digital Agency WPBakery',
            'categories'                => array('Demos'),
            'import_file_url'           => $import_url . 'demo-content/digital-agency/digital-agency-wpbakery.xml',
            'import_widget_file_url'    => $import_url . 'demo-content/blog-widgets.wie',
            'import_redux'              => array(
                array(
                    'file_url'              => $import_url . 'demo-content/digital-agency/digital-agency-wpbakery-options.json',
                    'option_name'           => 'pix_options',
                ),
            ),
            'import_preview_image_url'  => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-digital-agency.webp',
            'preview_url'               => 'https://essentials.pixfort.com/digital-agency/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Consulting WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => $import_url . 'demo-content/consulting/consulting-wpbakery.xml',
            'import_widget_file_url'     => $import_url . 'demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/consulting/consulting-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-consulting.webp',
            'preview_url'                  => 'https://essentials.pixfort.com/consulting/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Minimal WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => $import_url . 'demo-content/minimal/minimal-wpbakery.xml',
            'import_widget_file_url'     => $import_url . 'demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/minimal/minimal-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-minimal.webp',
            'preview_url'                  => 'https://essentials.pixfort.com/minimal/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Company WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/company/company-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/company/company-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-company.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/company/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Gallery WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/gallery/gallery-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/gallery/gallery-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-gallery.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/gallery/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Modern WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/modern/modern-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/modern/modern-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-modern.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/modern/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'SEO WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/seo/seo-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/seo/seo-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-seo.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/seo/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Fast WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/fast/fast-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/fast/fast-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-fast.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/fast/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Onepage WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/onepage/onepage-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/onepage/onepage-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-onepage.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/onepage/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Finance WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/finance/finance-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/finance/finance-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-finance.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/finance/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Services WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/services/services-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/services/services-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-services.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/services/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Original WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/original/original-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/shop-blog-widgets.wie',
            'import_notice'                => esc_html__('This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/original/original-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-original.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/original/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Software WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/software/software-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/software/software-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-software.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/software/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'SaaS WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/saas/saas-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/saas/saas-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-saas.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/saas/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Startup WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/startup/startup-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/startup/startup-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-startup.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/startup/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Marketing WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/marketing/marketing-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/marketing/marketing-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-marketing.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/marketing/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Knowledge Base WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/kb/kb-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/kb/kb-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-kb.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/knowledge-base-demo/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Event WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/event/event-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/event/event-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-event.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/knowledge-base-demo/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Slides WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/slides/slides-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/slides/slides-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-slides.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/slides/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Medical WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/medical/medical-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/medical/medical-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-medical.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/medical/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Cryptocurrency WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/cryptocurrency/cryptocurrency-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/cryptocurrency/cryptocurrency-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-cryptocurrency.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/cryptocurrency/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Bold WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/bold/bold-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/bold/bold-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-bold.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/bold/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Creative WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/creative/creative-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/creative/creative-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-creative.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/creative/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Ebook WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ebook/ebook-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/ebook/ebook-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-ebook.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/ebook/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Landing WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/landing/landing-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/landing/landing-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-landing.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/landing/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Restaurant WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/restaurant/restaurant-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/shop-widgets.wie',
            'import_notice'                => esc_html__('This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/restaurant/restaurant-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-restaurant.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/restaurant/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Ecommerce WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ecommerce/ecommerce-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/ecommerce/ecommerce-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-ecommerce.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/ecommerce/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Foundation WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/foundation/foundation-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/foundation/foundation-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-foundation.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/foundation/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Construction WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/construction/construction-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/construction/construction-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-construction.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/construction/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Business WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/business/business-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/business/business-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-business.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/business/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Corporate WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/corporate/corporate-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/corporate/corporate-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-corporate.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/corporate/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Product WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/product/product-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/product/product-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-product.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/product/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Coronavirus WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/coronavirus/coronavirus-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/coronavirus/coronavirus-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-coronavirus.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/coronavirus/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Personal WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/personal/personal-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/personal/personal-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-personal.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/personal/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Influencer WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/influencer/influencer-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/influencer/influencer-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-influencer.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/influencer/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Photography WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/photography/photography-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/photography/photography-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-photography.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/photography/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'App WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/app/app-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/app/app-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-app.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/app/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Agency WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/agency/agency-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/agency/agency-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-agency.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/agency/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Beauty WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/beauty/beauty-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/beauty/beauty-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-beauty.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/beauty/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Blogger WPBakery',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/blogger/blogger-wpbakery.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/blogger/blogger-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/wpbakery/wpbakery-blogger.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/blogger/',
        );
        array_push($data, $demo);
    }










    if ($elementor) {
        $demo = array(
            'import_file_name'          => 'Digital Agency Elementor',
            'categories'                => array('Demos'),
            'import_file_url'           => $import_url . 'demo-content/digital-agency/digital-agency-elementor.xml',
            'import_widget_file_url'    => $import_url . 'demo-content/blog-widgets.wie',
            'import_notice'             => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'              => array(
                array(
                    'file_url'              => $import_url . 'demo-content/digital-agency/digital-agency-elementor-options.json',
                    'option_name'           => 'pix_options',
                ),
            ),
            'import_preview_image_url'  => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-digital-agency.webp',
            'preview_url'               => 'https://essentials.pixfort.com/digital-agency-elementor/',
        );
        array_push($data, $demo);
        $demo = array(
            'import_file_name'             => 'Consulting Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => $import_url . 'demo-content/consulting/consulting-elementor.xml',
            'import_widget_file_url'     => $import_url . 'demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/consulting/consulting-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-consulting.webp',
            'preview_url'                  => 'https://essentials.pixfort.com/consulting-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Minimal Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => $import_url . 'demo-content/minimal/minimal-elementor.xml',
            'import_widget_file_url'     => $import_url . 'demo-content/blog-widgets.wie',
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/minimal/minimal-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-minimal.webp',
            'preview_url'                  => 'https://essentials.pixfort.com/minimal-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Company Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/company/company-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/company/company-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-company.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/company-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Gallery Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/gallery/gallery-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/gallery/gallery-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-gallery.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/gallery-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Modern Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/modern/modern-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/modern/modern-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-modern.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/modern-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'SEO Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/seo/seo-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/seo/seo-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-seo.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/seo-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Fast Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/fast/fast-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/fast/fast-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-fast.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/fast-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Onepage Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/onepage/onepage-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/onepage/onepage-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-onepage.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/onepage-elementor/',
        );
        array_push($data, $demo);


        $demo = array(
            'import_file_name'             => 'Finance Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/finance/finance-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/finance/finance-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-finance.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/finance-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Original Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/original/original-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/shop-blog-widgets.wie',
            'import_notice'                => esc_html__('Note: Elementor should be installed and activated before importing this demo content. This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/original/original-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-original.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/original/homepage-original-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Services Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/services/services-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/services/services-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-services.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/services/homepage-services-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Software Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/software/software-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/software/software-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-software.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/software/homepage-software-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'SaaS Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/saas/saas-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/saas/saas-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-saas.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/saas/homepage-saas-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Startup Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/startup/startup-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/startup/startup-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-startup.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/startup/homepage-startup-elementor',
        );
        array_push($data, $demo);







        $demo = array(
            'import_file_name'             => 'Marketing Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/marketing/marketing-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/marketing/marketing-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-marketing.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/marketing/homepage-marketing-elementor',
        );
        array_push($data, $demo);





        $demo = array(
            'import_file_name'             => 'Knowledge Base Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/kb/kb-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/kb/kb-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-kb.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/knowledge-base-demo/homepage-knowledge-base-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Event Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/event/event-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/event/event-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-event.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/event/homepage-event-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Slides Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/slides/slides-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/slides/slides-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-slides.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/slides/homepage-slides-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Medical Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/medical/medical-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/medical/medical-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-medical.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/medical/homepage-medical-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Cryptocurrency Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/cryptocurrency/cryptocurrency-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/cryptocurrency/cryptocurrency-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-cryptocurrency.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/cryptocurrency/homepage-cryptocurrency-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Bold Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/bold/bold-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/bold/bold-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-bold.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/bold/homepage-bold-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Creative Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/creative/creative-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/creative/creative-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-creative.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/creative/homepage-creative-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Ebook Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ebook/ebook-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/ebook/ebook-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-ebook.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/ebook/homepage-ebook-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Landing Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/landing/landing-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/landing/landing-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-landing.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/landing/homepage-landing-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Restaurant Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/restaurant/restaurant-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/shop-widgets.wie',
            'import_notice'                => esc_html__('Note: Elementor should be installed and activated before importing this demo content. This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/restaurant/restaurant-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-restaurant.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/restaurant/homepage-restaurant-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Ecommerce Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/ecommerce/ecommerce-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Note: Elementor should be installed and activated before importing this demo content. This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/ecommerce/ecommerce-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-ecommerce.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/ecommerce/homepage-ecommerce-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Foundation Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/foundation/foundation-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/foundation/foundation-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-foundation.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/foundation/homepage-foundation-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Construction Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/construction/construction-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/construction/construction-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-construction.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/construction/homepage-construction-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Business Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/business/business-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/business/business-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-business.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/business/homepage-business-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Corporate Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/corporate/corporate-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/corporate/corporate-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-corporate.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/corporate/homepage-corporate-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Product Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/product/product-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/product/product-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-product.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/product/homepage-product-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Coronavirus Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/coronavirus/coronavirus-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/coronavirus/coronavirus-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-coronavirus.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/coronavirus/homepage-coronavirus-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Personal Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/personal/personal-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/personal/personal-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-personal.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/personal/homepage-personal-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Influencer Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/influencer/influencer-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/influencer/influencer-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-influencer.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/influencer/homepage-influencer-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Photography Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/photography/photography-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/photography/photography-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-photography.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/photography/homepage-photography-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'App Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/app/app-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/app/app-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-app.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/app/homepage-app-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Agency Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/agency/agency-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/agency/agency-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-agency.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/agency/homepage-agency-elementor/',
        );
        array_push($data, $demo);



        $demo = array(
            'import_file_name'             => 'Beauty Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/beauty/beauty-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Note: Elementor should be installed and activated before importing this demo content. This demo content includes woocommerce elements, make sure that woocommerce is installed and activated.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/beauty/beauty-elementor-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-beauty.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/beauty/homepage-beauty-elementor/',
        );
        array_push($data, $demo);




        $demo = array(
            'import_file_name'             => 'Blogger Elementor',
            'categories'                   => array('Demos'),
            'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/blogger/blogger-elementor.xml',
            'import_widget_file_url'     => 'https://import.pixfort.com/essentials/demo-content/blog-widgets.wie',
            'import_notice'                => esc_html__('Please make sure that Elementor plugin is installed and activated before importing this demo content.', 'essentials'),
            'import_redux'           => array(
                array(
                    'file_url'   => $import_url . 'demo-content/blogger/blogger-wpbakery-options.json',
                    'option_name' => 'pix_options',
                ),
            ),
            'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/demos/elementor/elementor-blogger.jpg',
            'preview_url'                  => 'https://essentials.pixfort.com/blogger/homepage-blogger-elementor/',
        );
        array_push($data, $demo);
    }
    return $data;
}
