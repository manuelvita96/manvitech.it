function pixGlobalFunctionCaller($element){
    pix_main_slider($element);
}
jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        $element.find('.pix-main-slider').removeClass('pix-slider-loaded flickity-enabled is-draggable');
        pixGlobalFunctionCaller();
        pix_main_slider($element);
        if(window.init_tilts){
            init_tilts();
        }  
        pix_animation();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-blog-slider.default',
        addHandler
    );
});
