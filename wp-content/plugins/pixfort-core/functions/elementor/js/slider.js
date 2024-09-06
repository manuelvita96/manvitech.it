jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        updateSldier($element);
    };
    function updateSldier($element) {
        setTimeout(function () {
            if (window.pix_sliders) window.pix_sliders();
            pix_animation_display($element);
        }, 1500);
        setTimeout(function () {
            if (window.pix_sliders) window.pix_sliders();
        }, 2500);
    }
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-slider.default', addHandler);
});
