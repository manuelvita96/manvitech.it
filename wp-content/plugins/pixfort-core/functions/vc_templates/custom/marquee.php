<?php


function pix_templates_marquee(){
    $templates = array();

    // minimal

    $data = array();
    $data['name'] = 'Marquee Home Minimal';
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/marquee/minimal-home-marquee.webp';
    $data['custom_class'] = 'custom_template_for_vc_custom_template all marquee content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1649194669291{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row_content_no_spaces" pix_particles_check=""][vc_column][pix_marquee items="%5B%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22A%20New%20Revolution%20is%20Here!%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/02/marquee-1.jpg%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/03/marquee-image-2.png%22%2C%22image_size%22%3A%2280px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Essentials%20Theme%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/02/marquee-2.jpg%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/03/marquee-image-1.png%22%2C%22image_size%22%3A%2260px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%5D" content_color="heading-default" content_size="custom" speed="25" content_custom_size="80px" items_padding="2vw"][pix_marquee items="%5B%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Follow%20us%20on%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22icon%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2021/11/marquee.jpg%22%2C%22pix_duo_icon%22%3A%22direction-2%22%2C%22icon%22%3A%22pixicon-facebook3%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22item_type%22%3A%22icon%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2021/11/marquee.jpg%22%2C%22pix_duo_icon%22%3A%22bitcoin%22%2C%22icon%22%3A%22pixicon-twitter%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22item_type%22%3A%22icon%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2021/11/marquee.jpg%22%2C%22pix_duo_icon%22%3A%22rss%22%2C%22icon%22%3A%22pixicon-instagram2%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%2C%22link%22%3A%22%23%22%7D%5D" content_color="gradient-primary" content_size="custom" reversed="pix-reversed" pause_on_hover="pix-pause-hover" pix_gray_effect="pix-gray-effect" pix_colored_hover="pix-colored-hover" speed="20" content_custom_size="80px" items_padding="2vw"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = 'Marquee Features page Minimal';
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/marquee/minimal-features-marquee.webp';
    $data['custom_class'] = 'custom_template_for_vc_custom_template all marquee content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" responsive_css="{``pix_res_sm_pt``:``40``,``pix_res_sm_pb``:``20``,``pix_res_md_pt``:``80``,``pix_res_md_pb``:``40``}" css=".vc_custom_1649195862187{padding-top: 60px !important;padding-bottom: 60px !important;}" el_id="pix_section_features"][vc_row full_width="stretch_row_content_no_spaces" pix_particles_check="" responsive_css="{``pix_res_sm_pt``:``0``,``pix_res_sm_pb``:``0``}" css=".vc_custom_1647977158993{padding-top: 20px !important;padding-bottom: 20px !important;}"][vc_column][pix_marquee items="%5B%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22A%20New%20Revolution%20is%20Here!%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/02/marquee-1.jpg%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22%E2%80%A2%20%E2%80%A2%20%E2%80%A2%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Essentials%20Theme%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22text_image%22%3A%22https://essentials.pixfort.com/minimal/wp-content/uploads/sites/53/2022/02/marquee-2.jpg%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22%E2%80%A2%20%E2%80%A2%20%E2%80%A2%20%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%5D" content_color="gray-2" content_size="custom" speed="25" content_custom_size="100px" items_padding="2vw"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    // digital agency

    $data = array();
    $data['name'] = 'Marquee Home Digital Agency';
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/marquee/digital-agency-home-marquee.webp';
    $data['custom_class'] = 'custom_template_for_vc_custom_template all marquee content clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" b_flip_h="true" pix_overlay_over="true" responsive_css="{``pix_res_sm_pb``:``0``,``pix_res_md_pb``:``0``}" css=".vc_custom_1650047836399{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_row full_width="stretch_row_content_no_spaces" pix_particles_check="" pix_overlay_color="custom-gradient" pix_overlay_over="true" pix_custom_gradient="linear-gradient(to right, rgb(255,255,255) 0%, rgba(255,255,255,0) 20%, rgba(255,255,255,0) 80%, rgb(255,255,255) 100%)"][vc_column][pix_marquee items="%5B%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/atom-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/sketch-logo-colorful.png%22%2C%22image_size%22%3A%22150px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/wp-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/woocommerce-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/do-logo.png%22%2C%22image_size%22%3A%22180px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/html-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Join%20us%20today%20%3E%20%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2020/02/software-image-1.png%22%2C%22image_size%22%3A%22150px%22%2C%22rounded_img%22%3A%22%22%2C%22style%22%3A%22%22%2C%22hover_effect%22%3A%22%22%2C%22add_hover_effect%22%3A%22%22%2C%22link%22%3A%22%23%22%7D%5D" content_color="primary" content_size="h6" pause_on_hover="pix-pause-hover" pix_gray_effect="pix-gray-effect" pix_colored_hover="pix-colored-hover" speed="30"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = 'Marquee Features Digital Agency';
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/marquee/digital-agency-features-marquee.webp';
    $data['custom_class'] = 'custom_template_for_vc_custom_template all marquee content clients';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" b_flip_h="true" responsive_css="{``pix_res_sm_pb``:``0``,``pix_res_md_pb``:``0``}" css=".vc_custom_1650828179904{padding-top: 60px !important;padding-bottom: 60px !important;background-color: #ffffff !important;}"][vc_row full_width="stretch_row" pix_particles_check=""][vc_column content_align="text-center"][pix_badge bold="font-weight-bold" secondary_font="" rounded="badge-pill" text_color="heading-default" bg_color="white" style="2" hover_effect="" add_hover_effect="" animation="fade-in-left" padding="" text="Advanced Features" css=".vc_custom_1648754300323{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}" delay="600"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="heading-default" css=".vc_custom_1645557096420{padding-top: 20px !important;}" el_id="1643078531090-3fee9bd7-13eb"]Our technologies[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="300"]We provide support for more than 15K+ Businesses.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" pix_particles_check="" css=".vc_custom_1643316751914{padding-bottom: 60px !important;}"][vc_column][pix_marquee items="%5B%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/atom-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/sketch-logo-colorful.png%22%2C%22image_size%22%3A%22150px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/wp-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/woocommerce-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/do-logo.png%22%2C%22image_size%22%3A%22180px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/01/html-logo.png%22%2C%22image_size%22%3A%2270px%22%2C%22rounded_img%22%3A%22rounded-0%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Join%20us%20today%20%3E%20%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22pix_duo_icon%22%3A%220%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2020/02/software-image-1.png%22%2C%22image_size%22%3A%22150px%22%2C%22rounded_img%22%3A%22rounded-0%22%2C%22link%22%3A%22%23%22%7D%5D" content_color="primary" content_size="h6" pause_on_hover="pix-pause-hover" pix_gray_effect="pix-gray-effect" pix_colored_hover="pix-colored-hover" speed="30"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    $data = array();
    $data['name'] = 'Marquee About Digital Agency';
    $data['weight'] = 0;
    $data['type'] = 'default_templates';
    $data['category'] = 'default_templates';
    $data['image_path'] = 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/marquee/digital-agency-about-marquee.webp';
    $data['custom_class'] = 'custom_template_for_vc_custom_template all marquee content';
    $data['content']  = <<<CONTENT
[vc_section full_width="stretch_row" pix_over_visibility="" css=".vc_custom_1645141029367{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_row full_width="stretch_row" pix_particles_check="" css=".vc_custom_1645141044739{padding-bottom: 40px !important;}"][vc_column content_align="text-center"][pix_badge bold="font-weight-bold" secondary_font="" rounded="badge-pill" text_color="heading-default" bg_color="white" style="2" hover_effect="" add_hover_effect="" animation="fade-in-left" padding="" text="Growing team" css=".vc_custom_1645560067270{padding-top: 9px !important;padding-right: 15px !important;padding-bottom: 9px !important;padding-left: 15px !important;}"][sliding-text bold="font-weight-bold" secondary_font="secondary-font" position="center" size="h3" text_color="heading-default" words_delay="50" css=".vc_custom_1645560407770{padding-top: 20px !important;}" el_id="1643078531090-3fee9bd7-13eb"]Talented & dynamic people[/sliding-text][pix_text size="text-20" content_color="body-default" position="text-center" animation="fade-in-up" delay="100"]We provide support for more than 15K+ Businesses.[/pix_text][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" pix_particles_check="" pix_overlay_color="custom-gradient" pix_overlay_over="true" pix_custom_gradient="linear-gradient(to right, rgb(255,255,255) 0%, rgba(255,255,255,0) 15%, rgba(255,255,255,0) 85%, rgb(255,255,255) 100%)"][vc_column content_align="text-center"][pix_marquee items="%5B%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Paris%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%224%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/da-about-marquee-1.jpg%22%2C%22image_size%22%3A%22500px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%221%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Digital%20%5Bpix_br%5D%20Agency%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%224%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/da-about-marquee-2.jpg%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%221%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22New%20York%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%224%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/da-about-marquee-3.jpg%22%2C%22image_size%22%3A%22500px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%221%22%7D%2C%7B%22item_type%22%3A%22text%22%2C%22text%22%3A%22Berlin%22%2C%22bold%22%3A%22font-weight-bold%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%224%22%7D%2C%7B%22item_type%22%3A%22image%22%2C%22heading_font%22%3A%22heading-font%22%2C%22image%22%3A%22https://essentials.pixfort.com/digital-agency/wp-content/uploads/sites/55/2022/02/da-about-marquee-4.jpg%22%2C%22image_size%22%3A%22300px%22%2C%22rounded_img%22%3A%22rounded-10%22%2C%22style%22%3A%223%22%2C%22hover_effect%22%3A%223%22%2C%22add_hover_effect%22%3A%221%22%7D%5D" content_color="gray-3" content_size="h3" speed="35" items_padding="2vw" css=".vc_custom_1645745118882{padding-top: 40px !important;padding-bottom: 80px !important;}"][/vc_column][/vc_row][/vc_section]
CONTENT;

    array_push($templates, $data);

    return $templates;
}




 ?>