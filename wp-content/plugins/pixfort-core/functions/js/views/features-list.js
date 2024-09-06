(function ( $ ) {
	'use strict';
	if(window.InlineShortcodeView){
	    // This name is defined automatically (InlineShortcodeView_you, for Frontend editor only
	    window.InlineShortcodeView_pix_feature_list = window.InlineShortcodeView.extend({
	    	// Render called every time when some of attributes changed.
	    	render: function () {
				let params = this.model.get( 'params' );
				params = window.pixVerifyWPBakeryIcons(params, true, 'features');
				this.model.save( 'params', params );
				params = this.model.get( 'params' );

	    		window.InlineShortcodeView_pix_feature_list.__super__.render.call(this); // it is recommended to call parent method to avoid new versions problems.
	    		return this;
	    	},

	    	updated: function () {
	            // console && console.log('InlineShortcodeView_pix_feature_list: updated called.');
	    		window.InlineShortcodeView_pix_feature_list.__super__.updated.call(this);
	            return this;
	    	},
	    	parentChanged: function () {
	            // console && console.log('InlineShortcodeView_pix_feature_list: parentChanged called.');
	    		window.InlineShortcodeView_pix_feature_list.__super__.parentChanged.call(this);
	    	}

	    });
	}
})( window.jQuery );