/**
 * @package StoreLocatorPlus\Admin\ExperienceTab
 */

/**
 * Setting Helpers
 */
var slp_setting_helper = function () {
    var turned_on = new  Object();

    /*
     * Initialize our helpers.
     */
    this.initialize = function () {
        jQuery('div[data-related_to]').hover(SLP_ADMIN.helper.related_on, SLP_ADMIN.helper.related_off);
    };

    /**
     * Add 'highlight-related' CSS to all elements containing the related_to string in their name property.
     * Add those elements to the "turned on" list.
     */
    this.related_on = function () {
        var related_to = jQuery(this).attr('data-related_to');
        var related_array = related_to.split(',');
        related_array.forEach( function( item ) {

            var related_element = jQuery('div[id*="' + item + '"]');
            jQuery(related_element).addClass('highlight-related');

            if ( typeof turned_on[item] === 'undefined' ) {
                turned_on[item] = related_element;
            }
        } );
    };

    /**
     * Remove 'highlight-related' CSS from all elements on the "turned on" list.
     */
    this.related_off = function () {
        for (var property in turned_on ) {
            if ( turned_on.hasOwnProperty(property) ) {
                var related_element = turned_on[property];
                jQuery( related_element ).removeClass('highlight-related');
                turned_on[property] = undefined;
            }
        }
    }

};

/**
 * Plugin Style
 */
var SLP_Admin_Plugin_Style = function () {
    var scroll_in_progress = false;
    var starting_theme;
    var style_obj;
    var user_is_premier = false;

    /**
     * Things we do to start.
     */
    this.initialize = function() {
        this.style_obj = jQuery( '#input-group-options_nojs\\[style\\]' );
        this.user_is_premier = ( jQuery( this.style_obj ).attr('data-premier') === '1' );

        // New Style
        jQuery( 'div.theme .button-secondary' ).on( 'click' , SLP_Admin_Settings_Help.PluginStyle.set_active_style );
        jQuery( '.wpcsl-style_vision_list' ).on( 'scroll' , SLP_Admin_Settings_Help.PluginStyle.get_more_style );

        // Old Style
        jQuery( 'select#options_nojs\\[theme\\]' ).on('change keyup', SLP_Admin_Settings_Help.PluginStyle.show_details );
        SLP_Admin_Settings_Help.PluginStyle.starting_theme = jQuery( 'select#options_nojs\\[theme\\] option:selected' ).val();
        jQuery( '#wpcsl-option-view_sidemenu' ).on('click', SLP_Admin_Settings_Help.PluginStyle.show_details );
    };

    /**
     * Get more style.
     */
    this.get_more_style = function() {
        if ( ! SLP_Admin_Settings_Help.PluginStyle.scroll_in_progress ) {
            SLP_Admin_Settings_Help.PluginStyle.scroll_in_progress  = true;

            var style_obj = SLP_Admin_Settings_Help.PluginStyle.style_obj;
            var page_size = jQuery( style_obj ).attr('data-page_len');
            var page = jQuery( style_obj ).attr('data-pages_loaded');

            var url_services = 'https://www.storelocatorplus.com/';
            var rest_endpoint = 'wp-json/wp/v2/slp_style_gallery';
            var request_params = '?orderby=title&order=asc&per_page=' + page_size + '&page=' + ++page;
            var full_url = url_services + rest_endpoint + request_params;

            jQuery.get(full_url, '', SLP_Admin_Settings_Help.PluginStyle.add_more_style).fail(
                function( data ) {
                    SLP_Admin_Settings_Help.PluginStyle.scroll_in_progress  = false;
                    if ( data.responseJSON.code === 'rest_post_invalid_page_number' ) {
                      jQuery( '.wpcsl-style_vision_list' ).off( 'scroll' );
                    }
                }
                );
        }
    };

    /**
     * Add style.
     */
    this.add_more_style = function( data ) {
        var style_obj = SLP_Admin_Settings_Help.PluginStyle.style_obj;
        if ( data.length < 1 ) {
            jQuery(style_obj).attr( 'style' , 'border-bottom: none; padding-bottom: 1em;' );
            return;
        }

        var page = jQuery(style_obj).attr('data-pages_loaded');
        jQuery(style_obj).attr('data-pages_loaded', ++page);

        var vision_list = jQuery(style_obj).find('.card_list');
        var style_html = '';
        jQuery( data ).each( function() {
                style_html = SLP_Admin_Settings_Help.PluginStyle.vision_item_html( this );
                jQuery(vision_list).append(style_html).find('.button-secondary').on( 'click' , SLP_Admin_Settings_Help.PluginStyle.set_active_style );
            }
        );
        SLP_Admin_Settings_Help.PluginStyle.scroll_in_progress  = false;
    };

    /**
     * HTML from style object.
     */
    this.vision_item_html = function ( style ) {
        var active = '';
        if ( jQuery( '#options_nojs\\[style_id\\]' ) .val() == style.id ) {
            active = ' active ';
        }


        var access_level = '';
        if ( typeof(style.custom_fields.access_level) !== 'undefined' ) {
            access_level = style.custom_fields.access_level[0]
        }

        var actions = '';
        if ( ( access_level == '' ) || SLP_Admin_Settings_Help.PluginStyle.user_is_premier ) {
            var item_data = 'data-post_id="'+ style.id +'"';
            var activate_label = ( active == '' ) ? jQuery( '#select_text' ).val() : jQuery( '#active_text' ).val();
            actions =
                '<div class="card-section theme-actions">' +
                '<a class="button button-secondary activate" ' + item_data + ' aria-label="'+ activate_label + '">'+ activate_label +'</a>' +
                '</div>'
            ;
        }

        var style_html =
            '<div class="card theme ' + access_level + active + '">' +

          '<div class="card-divider">' +
              '<h2 class="theme-name">' + style.title.rendered + '</h2>' +
          '</div>' +

            '<div class="card-section details">' +
                style.content.rendered +
            '</div>' +

            actions +

            '</div>';

        return style_html;
    };

    /**
     * Set the active style.
     *
     * @returns {undefined}
     */
    this.set_active_style = function () {
        var clicked_theme = jQuery( this ).attr( 'data-slug' );
        jQuery( '#options_nojs\\[style\\]').val( clicked_theme );
        jQuery( '#options_nojs\\[style_id\\]').val( jQuery( this ).attr( 'data-post_id' ) );

        var active_div = jQuery( 'div.active' );
        jQuery( active_div ).find( '.button-secondary' ).removeClass( 'customize' ).addClass('activate');
        jQuery( active_div ).removeClass( 'active' );

        jQuery( '.' + clicked_theme ).addClass( 'active' );
        var active_div = jQuery( 'div.active' );
        jQuery( active_div ).find( '.button-secondary' ).addClass('customize').text( jQuery( '#activating_text' ).val() );
        jQuery( active_div ).removeClass( 'activate' );

        jQuery( '.button-primary' ).click();
    };

    /**
     * Show the theme details panel and hide the prior active selection.
     *
     * @returns {undefined}
     */
    this.show_details = function () {
        var selected_theme = jQuery('select#options_nojs\\[theme\\] option:selected').val();
        var selected_theme_details = '#' + selected_theme + '_details';

        var content = '<h3>' + jQuery('select#options_nojs\\[theme\\] option:selected').text() + '</h3>' +jQuery( selected_theme_details ).html();
        jQuery('.settings-description').toggleClass('is-visible').html( content );

        // Auto apply plugin theme layouts
        if ( selected_theme !== SLP_Admin_Settings_Help.PluginStyle.starting_theme ) {
            SLP_Admin_Settings_Help.PluginStyle.starting_theme = selected_theme;
            SLP_Admin_Settings_Help.PluginStyle.set_theme_options( selected_theme_details );
        }
    };

    /**
     * Set theme options on plugin style change.
     * @returns {boolean}
     */
    this.set_theme_options = function ( selected_theme_details ) {
        jQuery( selected_theme_details + ' > .theme_option_value').each(
            function(index) {
                var field_name = jQuery(this).attr('settings_field');
                jQuery('[name="' + field_name + '"]').val(jQuery(this).text());
            }
        );
        return false;
    }

};

// Is our page loaded?  Go do stuff.
//
jQuery( document ).ready(
    function () {
        SLP_ADMIN.helper = new slp_setting_helper();
        SLP_ADMIN.helper.initialize();
        
        SLP_Admin_Settings_Help.PluginStyle = new SLP_Admin_Plugin_Style();
        SLP_Admin_Settings_Help.PluginStyle.initialize();
    }
);