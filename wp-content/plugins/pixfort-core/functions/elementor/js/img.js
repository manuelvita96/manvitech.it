jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {};
    elementorFrontend.hooks.addAction('frontend/element_ready/pix-img.default', addHandler);
});
