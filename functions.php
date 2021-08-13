<?php
require_once get_template_directory().'/includes/assets.php';
require_once get_template_directory().'/includes/custom_post_types.php';
require_once get_template_directory().'/includes/menus.php';




    function add_new_menu_items()
    {
        add_menu_page(
            "Site Settings", 
            "Site Settings",
            "manage_options", 
            "theme-options",
            "theme_options_page",
        );

    }
  
    function theme_options_page()
    {
        wp_enqueue_media();
        ?>
            <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h1>Site Settings</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php
               
                    settings_fields("header_section");
                   
                    do_settings_sections("theme-options");
               
                    submit_button();
                    
                   
                ?>         
            </form>
        </div>
        <?php
    }

    add_action("admin_menu", "add_new_menu_items");


    function display_options()
    {

        add_settings_section("header_section", "SITE OPTIONS", "display_header_options_content", "theme-options");

        add_settings_field("email", "EMAIL", "display_email_form_element", "theme-options", "header_section");
        add_settings_field("number", "NUMBER", "display_number_form_element", "theme-options", "header_section");
        add_settings_field("whatsaap", "WHATSAPP.NO", "display_whatsapp_form_element", "theme-options", "header_section");
        add_settings_field("location", "LOCATION", "display_location_form_element", "theme-options", "header_section");
        add_settings_field("copyright", "COPYRIGHT", "display_copyright_form_element", "theme-options", "header_section");
        add_settings_field("insta", "INSTAGRAM FEED", "display_insta_form_element", "theme-options", "header_section");
        add_settings_field("facebook", "FACEBOOK FEED", "display_facebook_form_element", "theme-options", "header_section");
        add_settings_field("head_logo", "HEADER LOGO", "display_head_logo_form_element", "theme-options", "header_section");
        add_settings_field("footer_logo", "FOOTOER LOGO", "display_footer_logo_form_element", "theme-options", "header_section");
        add_settings_field("favicon", "FAVICON", "display_favicon_form_element", "theme-options", "header_section");

        register_setting("header_section", "email");
        register_setting("header_section", "number");
        register_setting("header_section", "whatsapp");
        register_setting("header_section", "location");
        register_setting("header_section", "copyright");
        register_setting("header_section", "insta");
        register_setting("header_section", "facebook");
        register_setting("header_section", "head_logo");
        register_setting("header_section", "footer_logo");
        register_setting("header_section", "favicon");
        
    }

    function display_header_options_content(){echo "The Settings of the theme";}
    function display_email_form_element()
    {
        ?>
            <input type="text" name="email" id="email" value="<?php echo get_option('email'); ?>" />
        <?php
    }
    function display_number_form_element()
    {
        ?>
            <input type="text" name="number" id="number" value="<?php echo get_option('number'); ?>" maxlength="12" onkeypress="return isNumberKey(event)" />
        <?php
    }
    function display_whatsapp_form_element()
    {
        ?>
            <input type="text" name="whatsapp" id="whatsapp" value="<?php echo get_option('whatsapp'); ?>" maxlength="12" onkeypress="return isNumberKey(event)" />
        <?php
    }
    function display_location_form_element()
    {
        ?>
            <input type="text" name="location" id="location" value="<?php echo get_option('location'); ?>" />
        <?php
    }
    function display_copyright_form_element()
    {
        ?>
            <input type="text" name="copyright" id="copyright" value="<?php echo get_option('copyright'); ?>" />
        <?php
    }
    function display_insta_form_element()
    {
        ?>
            <input type="text" name="insta" id="insta" value="<?php echo get_option('insta'); ?>" />
        <?php
    }
    function display_facebook_form_element()
    {
        ?>
            <input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
        <?php
    }
    function display_head_logo_form_element()
    {
        ?>
           <!-- <input type="file" name="head_logo" id="head_logo" value="<?php echo get_option('head_logo'); ?>" /> -->
           <input id="header_logo" class="head_logo" name="head_logo" type="hidden" value="<?php echo get_option('head_logo'); ?>">
                <div style="display: none;" class="head_logo">
                    <img src="<?php echo get_option('head_logo'); ?>" width="150" height="80"/>
                </div>
                <a href="javascript:;" class="upload-button button button-secondary head_logo" type="button" >Upload Logo</a>
                <?php
            }           
    function display_footer_logo_form_element()
    {
        ?>
            <!-- <input type="file" name="footer_logo" id="footer_logo" value="<?php echo get_option('footer_logo'); ?>" /> -->
            <input id="foot_logo" class="footer_logo" name="footer_logo" type="hidden" value="<?php echo get_option('footer_logo'); ?>">
                <div style="display: none;" class="footer_logo">
                    <img src="<?php echo get_option('footer_logo'); ?>" width="150" height="80"/>
                </div>
                <a href="javascript:;" class="upload-button button button-secondary footer_logo" type="button" >Upload Logo</a>
                <?php
            }          
    
    function display_favicon_form_element()
    {
        ?>
            <!-- <input type="file" name="favicon" id="favicon" value="<?php echo get_option('favicon'); ?>" /> -->
            <input id="fav_icon" class="favicon" name="favicon" type="hidden" value="<?php echo get_option('favicon'); ?>">
                <div style="display: none;" class="favicon">
                    <img src="<?php echo get_option('favicon'); ?>" width="150" height="80"/>
                </div>
                <a href="javascript:;" class="upload-button button button-secondary favicon" type="button" >Upload Logo</a>
             
        <?php
    }

    add_action("admin_init", "display_options");
    ?>

    
    
  
    
    