jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        setTimeout(function () {
            if (typeof pix_main_slider === 'function') {
                pix_main_slider($element);
            }
            if (typeof init_tilts === 'function') {
                init_tilts($element);
            }
        }, 400);
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-products-carousel.default', addHandler);
});
