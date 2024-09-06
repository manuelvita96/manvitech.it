jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        updateSldier($element);
    };
    function updateSldier($element) {
        if (typeof window.Flickity !== 'undefined') {
            setTimeout(function () {
                pix_main_slider($element);
                if (window.init_tilts) {
                    init_tilts();
                }
            }, 2500);
        } else {
            setTimeout(function () {
                updateSldier($element);
            }, 500);
        }
    }
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-img-slider.default', addHandler);
});
