jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        if(window.init_tilts){
            init_tilts($element);
        }  
        // pix_animation($element);
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-blog.default',
        addHandler
    );
});
