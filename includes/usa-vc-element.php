<?php

function usa_vc_addon_function() {
    
    $usa_vc_content_tags = array(
       'Select' => '', 
       'h1' => 'h1', 
       'h2' => 'h2', 
       'h3' => 'h3', 
       'h4' => 'h4', 
       'h5' => 'h5', 
       'h6' => 'h6'
    );
    
    
    $usa_vc_tag_size = array(
       'Select' => '', 
       '12 px' => '12', 
       '13 px' => '13', 
       '14 px' => '14', 
       '15 px' => '15', 
       '16 px' => '16', 
       '17 px' => '17', 
       '18 px' => '18', 
       '19 px' => '19', 
       '20 px' => '20', 
       '21 px' => '21',
       '22 px' => '22',
       '23 px' => '23',
       '24 px' => '24'
    );
    
    
    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map(array(
        "name" => "Ultimate Searchable Accordion",
        "base" => "usa_container",
        "category" => esc_html__( "Content", "usa_vc"),
        "as_parent" => array('only' => 'usa_item,vc_tta_tabs'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "controls" => "full",
        "is_container" => false,
        "icon" => "icon-usa-con-vc-addon",
        "front_enqueue_js" => array( USA_VC_PLUGIN_DIR.  'assets/js/jquery.bwlaccordion.min.js', USA_VC_PLUGIN_DIR.  'assets/js/usa-vc-custom.js' ),
        "params" => array(
            // add params same as with any other content element

            array(
                
                "admin_label" => true,
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Enable Accordion Toggle Status", "usa_vc"),
                "param_name" => "toggle",
                "value" => array(esc_html__("Yes", "usa_vc") => "true"),
                "description" => "",
                "group" => "General",
            ),
            array(
                
                "admin_label" => true,
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Enable expand/collapse button", "usa_vc"),
                "param_name" => "ctrl_btn",
                "value" => array(esc_html__("Yes", "usa_vc") => "true"),
                "description" => "",
                "group" => "General",
            ),
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Disable closed all section", "usa_vc"),
                "param_name" => "closeall",
                "value" => array( esc_html__("Yes", "usa_vc") => "false"),
                "description" => "",
                "group" => "General",
            ),
            
            array("type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Opened Items Type", "usa_vc"),
                "param_name" => "item_opened",
                "value" => array(
                    "Default (Opened first item)" => "",
                    "Opened all items" => "all",
                    "Opened only even items" => "even",
                    "Opened only odd items" => "odd",
                    "Opened custom items" => "custom_item_opened"
                ),
                "group" => "General",
                "description" => '',
                "dependency" => array("element" => "closeall", "value" => "false")
            ),
            
            array(
                "type" => "textfield",
                "heading" => esc_html__("Set the number of custom opened rows.", "usa_vc"),
                "param_name" => "custom_item_opened_rows",
                "description" => esc_html__("Example: Example: Set 0,3 and it will opened first and fourth row of accordion.", "usa_vc"),
                "group" => "General",
                "dependency" => array('element' => "item_opened", 'value' => array('custom_item_opened'))
            ),
            
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Enable RTL mode", "usa_vc"),
                "param_name" => "rtl",
                "value" => array(esc_html__("Yes", "usa_vc") => "true"),
                "description" => "",
                "group" => "General",
            ),
            
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Accordion Extra Class", 'usa_vc'),
                "param_name" => "custom_acc_class",
                "value" => "",
                "description" => esc_html__("Add Extra Class For Accordion Block", 'usa_vc'),
                "group" => "General"
            ),
            
            /*----- ANIMATION TAB ----*/
            
            array(                
                "admin_label" => true,
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Animation", "usa_vc"),
                "param_name" => "animate",
                "value" => array(
                    "Pulse" => "pulse",
                    "Flash" => "flash",
                    "Shake" => "shake",
                    "Tada" => "tada",
                    "Swing" => "swing",
                    "Wobble" => "wobble",
                    "Pulse" => "pulse",
                    "Flipx" => "flipx",
                    "Faderight" => "faderight",
                    "Fadeleft" => "fadeleft",
                    "Slide" => "slide",
                    "Slideup" => "slideup",
                    "Bounce" => "bounce",
                    "Lightspeed" => "lightspeed",
                    "Roll" => "roll",
                    "Rotate" => "rotate",
                    "Fade" => "fade",
                    "None" => "none"
                ),
                "group" => "Animation",
                "description" => '',
            ),

            // Search Box Tab.
            
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Display search box?", "usa_vc"),
                "param_name" => "search",
                "value" => array(esc_html__("Yes", "usa_vc") => "true"),
                "description" => "",
                "group" => "Search Box",
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Set custom search input placeholder:", "usa_vc"),
                "param_name" => "placeholder",
                "description" => '',
                "group" => "Search Box",
                "dependency" => array('element' => "search", 'value' => array('true'))
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Set custom message for content found:", "usa_vc"),
                "param_name" => "msg_item_found",
                "description" => '',
                "group" => "Search Box",
                "dependency" => array('element' => "search", 'value' => array('true'))
            ),
            
            array(
                "type" => "textfield",
                "heading" => esc_html__("Set custom message for nothing found:", "usa_vc"),
                "param_name" => "msg_no_result",
                "description" => '',
                "group" => "Search Box",
                "dependency" => array('element' => "search", 'value' => array('true'))
            ),
            
            /*-----  THEME TAB ----*/
            
            array(
                "admin_label" => true,
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Theme", "usa_vc"),
                "param_name" => "theme",
                "value" => array(
                    "Olive(Default)" => "default",
                    "Red" => "theme-red",
                    "Blue" => "theme-blue",
                    "Green" => "theme-green",
                    "Red" => "theme-red",
                    "Orange" => "theme-orange",
                    "Yellow" => "theme-yellow",
                    "Custom" => "custom"
                ),
                "group" => "Theme",
                "description" => esc_html__("Select accordion theme from the list.", "usa_vc")
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Accordion Title BG', 'usa_vc'),
                "param_name" => "title_bg",
                "value" => "#2C2C2C",
                "description" => esc_html__('Set accordion title background.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Accordion Title Text', 'usa_vc'),
                "param_name" => "title_text_color",
                "value" => "#FFFFFF",
                "description" => esc_html__('Set accordion title text color.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Navigation Box BG', 'usa_vc'),
                "param_name" => "nav_box_bg",
                "value" => "#B8B831",
                "description" => esc_html__('Set accordion navigataion background color.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Active Accordion Title BG', 'usa_vc'),
                "param_name" => "title_active_bg",
                "value" => "#414141",
                "description" => esc_html__('Set active accordion title background.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Active Accordion Title Text', 'usa_vc'),
                "param_name" => "title_active_text_color",
                "value" => "#F0F0F0",
                "description" => esc_html__('Set active accordion title text color.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => esc_html__('Active Navigation Box BG', 'usa_vc'),
                "param_name" => "nav_active_box_bg",
                "value" => "#D0D051",
                "description" => esc_html__('Set active accordion navigataion background color.', 'usa_vc'),
                "group" => esc_html__('Theme', 'usa_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Title Tag", "usa-vc"),
                "param_name" => "title_tag",
                "value" => $usa_vc_content_tags,
                "group" => "Theme",
                "description" => ''
            ),
            
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Title Tag Front Size: ", "usa_vc"),
                "param_name" => "tt_font_size",
                "value" => $usa_vc_tag_size,
                "group" => "Theme",
                "description" => esc_html__("Set the font size (example: 15 ) of heading tag. Defult size: 15", "usa_vc")
            ),
            
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Search highlighter background:", "usa_vc"),
                "param_name" => "highlight_bg",
                "value" => '#FF0000', //Default Color
                "description" => esc_html__("Choose BG color", "usa_vc"),
                "group" => "Theme",
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Search highlighter text color:", "usa_vc"),
                "param_name" => "highlight_color",
                "value" => '#FF0000', //Default Color
                "description" => esc_html__("Choose text color", "usa_vc"),
                "group" => "Theme",
            ),
            
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion content background:", "usa_vc"),
                "param_name" => "content_bg",
                "value" => '#FBFBFB', //Default Color
                "description" => esc_html__("Choose BG color of accordion content.", "usa_vc"),
                "group" => "Theme",
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion content text color:", "usa_vc"),
                "param_name" => "content_text_color",
                "value" => '#666666', //Default Color
                "description" => esc_html__("Choose text color of accordion content.", "usa_vc"),
                "group" => "Theme",
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion content link color:", "usa_vc"),
                "param_name" => "content_link_color",
                "value" => '#2C2C2C', //Default Color
                "description" => esc_html__("Choose text color of accordion content link.", "usa_vc"),
                "group" => "Theme",
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
            
             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion content link hover color:", "usa_vc"),
                "param_name" => "content_link_hover_color",
                "value" => '#000000', //Default Color
                "description" => esc_html__("Choose hover text color of accordion content link.", "usa_vc"),
                "group" => "Theme",
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            
            
            
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => esc_html__("Display Navigation Box To Right?", "usa_vc"),
                "param_name" => "nav_right",
                "value" => array(esc_html__("Yes", "usa_vc") => "1"),
                "description" => "",
                "group" => "Navigation box",
            ),
            
            array(
                "admin_label" => true,
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Navigation boxes:", "usa_vc"),
                "param_name" => "nav_box",
                "value" => array(
                    "Crossed(Default)" => "",
                    "Square" => "square",
                    "Arrow" => "arrow",
                    "Circle" => "circle"
                ),
                "group" => "Navigation box",
                "description" => '',
            ),
            array(
                "admin_label" => true,
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Navigation icons:", "usa_vc"),
                "param_name" => "nav_icon",
                "value" => array(
                    "Plus(Default)" => "",
                    "Angle" => "angle",
                    "Angle Double" => "angle_double",
                    "Angle Caret" => "angle_caret",
                    "Angle Chevron" => "angle_chevron"
                ),
                "group" => "Navigation box",
                "description" => '',
            )
        ),
        "js_view" => 'VcColumnView'
    ));

    vc_map(array(
        "name" => esc_html__("Accordion Block", "usa_vc"),
        "base" => "usa_item",
        "icon" => "icon-usa-vc-addon",
        "content_element" => true,
        "as_child" => array('only' => 'usa_container'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            // add params same as with any other content element
            array(
                "admin_label" => true,
                "type" => "textfield",
                "heading" => esc_html__("Accordion Title", "usa_vc"),
                "param_name" => "acc_title",
                "description" => '',
                "group" => "General",
            ),
            array(
                "type" => "textarea_html",
                "heading" => esc_html__("Accordion Content", "usa_vc"),
                "param_name" => "content",
                "description" => '',
                "group" => "General",
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Accordion Title Icon', 'usa_vc'),
                'param_name' => 'title_icon',
                "value" => "",
                'settings' => array(
                    'emptyIcon' => true, // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 30, // default 100, how many icons per/page to display
                ),
                "group" => "Icon",
                'description' => esc_html__('Select icon from library.', 'usa_vc')
            ),
            
            array(
                "type" => "textfield",
                "heading" => esc_html__("Title Icon Class", "usa_vc"),
                "param_name" => "title_icon_class",
                "description" => 'You can directly add Font Awesome Icon Class in here.',
                "group" => "Icon",
            )
            
        )
    ));
    
}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
   class WPBakeryShortCode_Usa_Container extends WPBakeryShortCodesContainer {
   }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
   class WPBakeryShortCode_Usa_Item extends WPBakeryShortCode {
   }
}