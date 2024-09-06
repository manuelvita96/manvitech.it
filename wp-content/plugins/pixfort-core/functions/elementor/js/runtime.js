jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        window.pix_runtime();
    };

    elementorFrontend.hooks.addAction('frontend/element_ready/pix-runtime.default', addHandler);
});
