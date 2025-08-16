jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        if (typeof pix_main_slider === 'function') {
            pix_main_slider($element);
        }
        if (typeof init_tilts === 'function') {
            init_tilts($element);
        }
    };

    elementorFrontend.hooks.addAction(
        'frontend/element_ready/pix-clients-carousel.default',
        addHandler
    );
});
