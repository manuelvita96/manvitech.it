jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_main_slider($element);
        if(window.init_tilts){
            init_tilts();
        }  
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-clients-carousel.default',
        addHandler
    );
});
