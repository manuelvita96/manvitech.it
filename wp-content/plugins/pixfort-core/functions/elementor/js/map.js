jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        pixLoadMaps($element);
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-map.default', addHandler);
});
