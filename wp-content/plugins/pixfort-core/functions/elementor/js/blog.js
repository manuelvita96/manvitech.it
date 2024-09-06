jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        if(window.init_tilts){
            init_tilts();
        }  
        pix_animation();
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-blog.default',
        addHandler
    );
});
