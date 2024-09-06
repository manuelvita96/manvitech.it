<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PixfortIcons {

    /**
	 * Instance.
	 *
	 * Holds the plugin instance.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 */
	// public static $instance = null;

    public static $isEnabled = true;
    public $mappingList = false;
    public $mappingListDuo = false;
    public $solidList = false;

    function __construct() {
        $this->init();
    }

    // public static function instance() {
		// if ( is_null( self::$instance ) ) {
		// 	self::$instance = new self();
        //     self::$instance->init();
		// }

		// return self::$instance;
	// }

    public function init() {
        if (!$this->checkIsEnabled()) {
            self::$isEnabled = false;
        }
        add_action('wp_ajax_pix_icons_data', array($this, 'getIconsData'));
        add_action('wp_ajax_nopriv_pix_icons_data', array($this, 'getIconsData'));
    }

    public function getIconsData(){
        require PIX_CORE_PLUGIN_DIR . '/includes/icons/pixfort-icons-list.php';
        require dirname( __FILE__ ) . '/pixfort-icons-social-list.php';
		$svgList = [];
		$svgDuoList = [];
		$svgSolidList = [];
		foreach ($pixfortIconsList as $icon) {
            $iconName = 'pixfort-icon-'.$icon;
			$content = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/Line/' . $iconName . '.svg');
			if (!empty($content)) {
				array_push($svgList, ['name' => $iconName, 'icon' => $content]);
			}
			$content2 = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/Duotone/' . $iconName . '.svg');
			if (!empty($content2)) {
				array_push($svgDuoList, ['name' => $iconName, 'icon' => $content2]);
			}
		}
		foreach ($pixfortSocialIconsList as $icon) {
			$content = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/Solid/' . $icon . '.svg');
			if (!empty($content)) {
				array_push($svgSolidList, ['name' => $icon, 'icon' => $content]);
			}
		}
		require PIX_CORE_PLUGIN_DIR . '/includes/icons/mapping-duotone.php';
		require PIX_CORE_PLUGIN_DIR . '/includes/icons/mapping.php';
        ob_start('ob_gzhandler');
        echo json_encode([
            'LINE_ICONS' => $svgList,
            'DUO_ICONS' => $svgDuoList,
            'SOLID_ICONS' => $svgSolidList,
            'SOLID_ICONS_LIST' => $pixfortSocialIconsList,
            'MappingDuo' => $pix_icons_list,
            'MappingFonticons' => $pixfort_icons
        ]);
        ob_end_flush();
        wp_die();
    }

    public static function isEnabled(){
        return self::$isEnabled;
    }

    function checkIsEnabled(){
        $options = get_option("pix_options");
        return !(isset($options['pix-disable-pixfort-icons']) && $options['pix-disable-pixfort-icons']);
    }

    function verifyIconName($icon, $forceNew = false) {
        if(self::$isEnabled || $forceNew) {
            if(strpos($icon, '/') === false){
                if(!str_contains($icon, 'pixicon')){
                    // TODO: verify social solid icons mapping
                    if(!$this->mappingListDuo){
                        require dirname( __FILE__ ) . '/mapping-duotone.php';
                        $this->mappingListDuo = $pix_icons_list;
                    }
                    if(!empty($this->mappingListDuo[$icon])){
                        $icon = 'Duotone/'.$this->mappingListDuo[$icon];
                    }
                } else {
                    if(!$this->mappingList){
                        require dirname( __FILE__ ) . '/mapping.php';
                        $this->mappingList = $pixfort_icons;
                    }
                    if(!$this->solidList){
                        require dirname( __FILE__ ) . '/pixfort-icons-social-list.php';
                        $this->solidList = $pixfortSocialIconsList;
                    }
                    if(!empty($this->mappingList[$icon])){
                        if(in_array($this->mappingList[$icon], $this->solidList)){
                            $icon = 'Solid/'.$this->mappingList[$icon];
                        } else {
                            $icon = 'Line/'.$this->mappingList[$icon];
                        }
                    }
                }
            }
        } else {
            if(strpos($icon, '/') !== false){
                if(str_contains($icon, 'Line/')){
                    $iconID = str_replace("Line/","",$icon);
                    if(!$this->mappingList){
                        require dirname( __FILE__ ) . '/mapping.php';
                        $this->mappingList = $pixfort_icons;
                    }
                    $invertedFonticon = array_flip($this->mappingList);
                    if(!empty($invertedFonticon[$iconID])){
                        $icon = $invertedFonticon[$iconID];
                    }
                } elseif(str_contains($icon, 'Solid/')){
                    $iconID = str_replace("Solid/","",$icon);
                    if(!$this->mappingList){
                        require dirname( __FILE__ ) . '/mapping.php';
                        $this->mappingList = $pixfort_icons;
                    }
                    $invertedFonticon = array_flip($this->mappingList);
                    if(!empty($invertedFonticon[$iconID])){
                        $icon = $invertedFonticon[$iconID];
                    }
                } elseif(str_contains($icon, 'Duotone/')){
                    $iconID = str_replace("Duotone/","",$icon);
                    if(!$this->mappingListDuo){
                        require dirname( __FILE__ ) . '/mapping-duotone.php';
                        $this->mappingListDuo = $pix_icons_list;
                    }
                    $invertedDuo = array_flip($this->mappingListDuo);
                    if(!empty($invertedDuo[$iconID])){
                        $icon = $invertedDuo[$iconID];
                    }
                }
            }
        }
        return $icon;
    }

    function getIcon( $filename, $size = 24, $classes = '', $attrs = '', $forceNew = false ) {
        $size = intval($size);
        if(!empty($filename)){
            $filename = $this->verifyIconName($filename, $forceNew);
            if(strpos($filename, '/') === false){
                if(!str_contains($filename, 'pixicon')){
                    if(!$this->mappingListDuo){
                        require dirname( __FILE__ ) . '/mapping-duotone.php';
                        $this->mappingListDuo = $pix_icons_list;
                    }
                    if(!empty($this->mappingListDuo[$filename])){
                        $content = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/Duotone/'.$this->mappingListDuo[$filename].'.svg');
                        if(!empty($content)){
                            return '<svg class="pixfort-icon '.$classes.'" width="'.$size.'" height="'.$size.'" '.$attrs.' data-name="Duotone/'.$filename.'" viewBox="2 2 20 20">'.$content.'</svg>';
                        }
                    }
                }else{
                    if(!$this->mappingList){
                        require dirname( __FILE__ ) . '/mapping.php';
                        $this->mappingList = $pixfort_icons; 
                    }
                    if(!empty($this->mappingList[$filename])){
                        $content = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/Line/'.$this->mappingList[$filename].'.svg');
                        if(!empty($content)){
                            return '<svg class="pixfort-icon '.$classes.'" width="'.$size.'" height="'.$size.'" '.$attrs.' data-name="Line/'.$filename.'" viewBox="2 2 20 20">'.$content.'</svg>';
                        }
                    }
                }
            }else{
                $content = pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/includes/icons/assets/svg/'.$filename.'.svg');
                if(!empty($content)){
                    return '<svg class="pixfort-icon '.$classes.'" width="'.$size.'" height="'.$size.'" '.$attrs.' data-name="'.$filename.'" viewBox="2 2 20 20">'.$content.'</svg>';
                }
            }
        }
        return '<i class="'.$filename.' '.$classes.'"></i>';
    }

    function getFontIcon( $filename, $classes = '', $attrs = '' ) {
        $filename = $this->verifyIconName($filename);
        return '<i class="'.$filename.' '. $classes.'" '.$attrs.'></i> ';
    }    

    function verifyElementorData($data, $repeater = false, $repeaterKey = '', $typeKey = 'media_type') {
        if(self::$isEnabled) {
            if(!empty($data['settings'])){
                if($repeater) {
                    if($typeKey==='pix-comparison-table') {
                        if (!empty($data['settings'][$repeaterKey])) {
                            foreach ($data['settings'][$repeaterKey] as $key => $item) {
                                

                                    // Col 1
                                    if (isset($item['col_1_media_type']) && $item['col_1_media_type'] === 'duo_icon') {
                                        if (!empty($item['col_1_pix_duo_icon'])) {
                                            $DuoValue = $item['col_1_pix_duo_icon'];
                                            $data['settings'][$repeaterKey][$key]['col_1_icon'] = $this->verifyIconName($DuoValue);
                                            $data['settings'][$repeaterKey][$key]['col_1_media_type'] = 'icon';	
                                            $data['settings'][$repeaterKey][$key]['col_1_pix_duo_icon'] = '';
                                        }
                                    }
                                    // Col 2
                                    if (isset($item['col_2_media_type']) && $item['col_2_media_type'] === 'duo_icon') {
                                        if (!empty($item['col_2_pix_duo_icon'])) {
                                            $DuoValue = $item['col_2_pix_duo_icon'];
                                            $data['settings'][$repeaterKey][$key]['col_2_icon'] = $this->verifyIconName($DuoValue);
                                            $data['settings'][$repeaterKey][$key]['col_2_media_type'] = 'icon';	
                                            $data['settings'][$repeaterKey][$key]['col_2_pix_duo_icon'] = '';
                                        }
                                    }
                                    // Col 3
                                    if (isset($item['col_3_media_type']) && $item['col_3_media_type'] === 'duo_icon') {
                                        if (!empty($item['col_3_pix_duo_icon'])) {
                                            $DuoValue = $item['col_3_pix_duo_icon'];
                                            $data['settings'][$repeaterKey][$key]['col_3_icon'] = $this->verifyIconName($DuoValue);
                                            $data['settings'][$repeaterKey][$key]['col_3_media_type'] = 'icon';	
                                            $data['settings'][$repeaterKey][$key]['col_3_pix_duo_icon'] = '';
                                        }
                                    }
                                
                            }
                            
                        }
                    } else {
                        if (!empty($data['settings'][$repeaterKey])) {
                            foreach ($data['settings'][$repeaterKey] as $key => $item) {
                                if (!empty($item[$typeKey])) {
                                    if ($item[$typeKey] === 'duo_icon') {
                                        if (!empty($item['pix_duo_icon'])) {
                                            $DuoValue = $item['pix_duo_icon'];
                                            $data['settings'][$repeaterKey][$key]['icon'] = $this->verifyIconName($DuoValue);
                                            $data['settings'][$repeaterKey][$key][$typeKey] = 'icon';	
                                            $data['settings'][$repeaterKey][$key]['pix_duo_icon'] = '';
                                        }
                                    }
                                }
                            }
                            
                        }
                    }
                } else {
                    // if($data["widgetType"]==='pix-feature'){
                    //     print_r($data);
                    // }
                    if(!empty($data['settings']['media_type'])){
                        if($data['settings']['media_type']==='duo_icon'){
                            if(!empty($data['settings']['pix_duo_icon'])){
                                $DuoValue = $data['settings']['pix_duo_icon'];
                                $data['settings']['icon'] = $this->verifyIconName($DuoValue);
                                $data['settings']['media_type'] = 'icon';
                                $data['settings']['pix_duo_icon'] = '';
                                if(in_array($data["widgetType"], ['pix-feature', 'pix-icon'])){
                                    if(!empty($data['settings']['icon_size'])&&$data['settings']['icon_size']!==''){
                                        if(!isset($data['settings']['has_icon_bg'])||empty($data['settings']['has_icon_bg'])||$data['settings']['has_icon_bg']!=='yes'){
                                            $data['settings']['icon_size'] = (int) $data['settings']['icon_size'] * 1.8;
                                        }
                                        if($data["widgetType"] === 'pix-icon'){
                                            $data['settings']['icon_size'] = round((int) $data['settings']['icon_size'] * 0.75);
                                        }
                                        if($data["widgetType"] === 'pix-feature'){
                                            $data['settings']['icon_size'] = round((int) $data['settings']['icon_size'] * 0.85);
                                        }
                                    }
                                    
                                    if(isset($data['settings']['icon_position']) && $data['settings']['icon_position'] === 'left'){
                                        // check if padding_title contains "px" string, then get its (int) valur and add 2 to it, then save the value with 'px' at the end in padding_title
                                        if(isset($data['settings']['padding_title']) && strpos($data['settings']['padding_title'], 'px') !== false){
                                            $padding_title = (int) $data['settings']['padding_title'];
                                            if($padding_title >=3) $padding_title -= 3;
                                            $data['settings']['padding_title'] = $padding_title . 'px';
                                        }
                                    }
                                }
                            }
                        } elseif($data['settings']['media_type']==='icon'){
                            if($data["widgetType"] === 'pix-icon'){
                                if(!empty($data['settings']['icon'])){
                                    if(strpos($data['settings']['icon'], '/') === false){
                                        if(empty($data['settings']['has_icon_bg']) || $data['settings']['has_icon_bg'] === ''){
                                            $data['settings']['has_icon_bg'] = 'yes';
                                            $data['settings']['icon_bg_color'] = 'transparent';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
		} else {
            if(!empty($data['settings'])){
                if($repeater) {
                    if($typeKey==='pix-comparison-table') {
                        if (!empty($data['settings'][$repeaterKey])) {
                            foreach ($data['settings'][$repeaterKey] as $key => $item) {
                                // Col 1
                                if (!empty($item['col_1_media_type']) && $item['col_1_media_type'] === 'icon') {
                                    if (!empty($item['col_1_icon'])) {
                                        if(str_contains($item['col_1_icon'], 'Duotone/')){
                                            $data['settings'][$repeaterKey][$key]['col_1_media_type'] = 'duo_icon';
                                            $data['settings'][$repeaterKey][$key]['col_1_pix_duo_icon'] = $this->verifyIconName($item['col_1_icon']);
                                        } else {
                                            $data['settings'][$repeaterKey][$key]['col_1_icon'] = $this->verifyIconName($item['col_1_icon']);
                                        }
                                    }
                                }
                                // Col 2
                                if (!empty($item['col_2_media_type']) && $item['col_2_media_type'] === 'icon') {
                                    if (!empty($item['col_2_icon'])) {
                                        if(str_contains($item['col_2_icon'], 'Duotone/')){
                                            $data['settings'][$repeaterKey][$key]['col_2_media_type'] = 'duo_icon';
                                            $data['settings'][$repeaterKey][$key]['col_2_pix_duo_icon'] = $this->verifyIconName($item['col_2_icon']);
                                        } else {
                                            $data['settings'][$repeaterKey][$key]['col_2_icon'] = $this->verifyIconName($item['col_2_icon']);
                                        }
                                    }
                                }
                                // Col 3
                                if (!empty($item['col_3_media_type']) && $item['col_3_media_type'] === 'icon') {
                                    if (!empty($item['col_3_icon'])) {
                                        if(str_contains($item['col_3_icon'], 'Duotone/')){
                                            $data['settings'][$repeaterKey][$key]['col_3_media_type'] = 'duo_icon';
                                            $data['settings'][$repeaterKey][$key]['col_3_pix_duo_icon'] = $this->verifyIconName($item['col_3_icon']);
                                        } else {
                                            $data['settings'][$repeaterKey][$key]['col_3_icon'] = $this->verifyIconName($item['col_3_icon']);
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        if (!empty($data['settings'][$repeaterKey])) {
                            foreach ($data['settings'][$repeaterKey] as $key => $item) {
                                if (!empty($item[$typeKey])) {
                                    if ($item[$typeKey] === 'icon') {
                                        if(!empty($item['icon'])){
                                            if(str_contains($item['icon'], 'Duotone/')){
                                                $data['settings'][$repeaterKey][$key][$typeKey] = 'duo_icon';
                                                $data['settings'][$repeaterKey][$key]['pix_duo_icon'] = $this->verifyIconName($item['icon']);
                                            } else {
                                                $data['settings'][$repeaterKey][$key]['icon'] = $this->verifyIconName($item['icon']);
                                            }
                                        }
                                    }
                                }
                            }
                            
                        }
                    }
                } else {
                    if(!empty($data['settings']['media_type'])){
                        if($data['settings']['media_type']==='icon'){
                            if(!empty($data['settings']['icon'])){
                                if(str_contains($data['settings']['icon'], 'Duotone/')){
                                    $data['settings']['media_type'] = 'duo_icon';
                                    $data['settings']['pix_duo_icon'] = $this->verifyIconName($data['settings']['icon']);
                                    if(in_array($data["widgetType"], ['pix-feature', 'pix-icon'])){
                                        if(!empty($data['settings']['icon_size'])&&$data['settings']['icon_size']!==''){
                                            if(!isset($data['settings']['has_icon_bg'])||empty($data['settings']['has_icon_bg'])||$data['settings']['has_icon_bg']!=='yes'){
                                                $data['settings']['icon_size'] = (int) $data['settings']['icon_size'] / 1.8;
                                            }
                                            if($data["widgetType"] === 'pix-icon'){
                                                $data['settings']['icon_size'] = round((int) $data['settings']['icon_size'] / 0.75);
                                            }
                                            if($data["widgetType"] === 'pix-feature'){
                                                $data['settings']['icon_size'] = round((int) $data['settings']['icon_size'] / 0.85);
                                            }
                                        }
                                        if(isset($data['settings']['icon_position']) && $data['settings']['icon_position'] === 'left'){
                                            // check if padding_title contains "px" string, then get its (int) valur and add 2 to it, then save the value with 'px' at the end in padding_title
                                            if(isset($data['settings']['padding_title']) && strpos($data['settings']['padding_title'], 'px') !== false){
                                                $padding_title = (int) $data['settings']['padding_title'];
                                                $padding_title += 3;
                                                $data['settings']['padding_title'] = $padding_title . 'px';
                                            }
                                        }
                                    }
                                } else {
                                    $data['settings']['icon'] = $this->verifyIconName($data['settings']['icon']);
                                }
                            }
                        }
                    }
                }
            }
        }
        return $data;
    }
}
