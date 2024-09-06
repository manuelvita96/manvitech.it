jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        setTimeout(function () {
            pix_main_slider($element);
            if (window.init_tilts) {
                init_tilts();
            }
        }, 400);
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-products-carousel.default', addHandler);
});
