jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/widget', function ($scope) {
        if (typeof pix_animation === 'function') pix_animation($scope, true);
        if (typeof window.pix_init_gradient_fix === 'function') {
            window.pix_init_gradient_fix($scope);
        }
    });
});
