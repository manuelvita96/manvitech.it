jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pix_main_slider($element);
    };

    elementorFrontend.hooks.addAction('frontend/element_ready/pix-reviews-slider.default', addHandler);
});
