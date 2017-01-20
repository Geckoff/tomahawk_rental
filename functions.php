<?php

function load_style_script() {
    wp_enqueue_script('yamaps', 'http://api-maps.yandex.ru/2.1/?lang=en_US');
    /*wp_enqueue_script('mapsimg', 'icon_customImage.js', 'yamaps');   */
    wp_enqueue_script('google-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
    wp_enqueue_script('slyjs', get_template_directory_uri().'/js/sly.js', 'google-jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', 'google-jquery');
    wp_enqueue_script('validator', get_template_directory_uri().'/js/validator.min.js', 'google-jquery');
    wp_enqueue_script('maskedinput', get_template_directory_uri().'/js/jquery.maskedinput.js', 'google-jquery');
    wp_enqueue_script('myscripts', get_template_directory_uri().'/js/scripts.js', 'google-jquery');


    wp_enqueue_style('horizontal', get_template_directory_uri().'/css/horizontal.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('mysly', get_template_directory_uri().'/css/mysly.css');
    wp_enqueue_style('mysly', get_template_directory_uri().'/css/mysly.css');
    wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('style1200', get_template_directory_uri().'/css/style1200.css');
    wp_enqueue_style('style992', get_template_directory_uri().'/css/style992.css');
    wp_enqueue_style('style768', get_template_directory_uri().'/css/style768.css');
    wp_enqueue_style('style480', get_template_directory_uri().'/css/style480.css');
}

function load_style_script_admin() {
    wp_enqueue_script('google-admin-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
    wp_enqueue_script('myscripts-admin', get_template_directory_uri().'/js/admin-scripts.js', 'google-jquery');
}

add_action('wp_enqueue_scripts', 'load_style_script');
add_action('admin_enqueue_scripts', 'load_style_script_admin');

/**
*   post-thumbnails support
**/

add_theme_support('post-thumbnails');

/*===Menu===*/

register_nav_menus(array(
    'header_menu' => 'Header Menu'
));

/*===Admin-panel Contacts section===*/

add_action('admin_menu','wfm_admin_menu');
add_action('admin_init','wfm_admin_settings');

function wfm_admin_menu() {
    //$page_title
    //$menu_title
    //$capability
    //$menu_slug
    //$function
    //$icon_url
    //$position
    add_menu_page('Contacts', 'Contacts', 'manage_options', 'contacts_settings', 'wfm_option_page', 'dashicons-admin-home', 3);
}

function wfm_option_page() {
    ?>

    <div class="wrap">
        <h2>Contacts</h2>
        <form action="options.php" method="post">
            <?php settings_fields('contacts_group'); ?>
            <?php do_settings_sections('inp_address_id'); ?>
            <?php do_settings_sections('inp_tels_id'); ?>
            <?php do_settings_sections('inp_schedule_id'); ?>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
}

function wfm_admin_settings() {
    // $option_group, $option_name, $sanitize_callback
    register_setting('contacts_group', 'inp_contacts_options', 'inp_contacts_options_sanitize');

    add_settings_section('inp_address_section_id', 'Address', '', 'inp_address_id');
    add_settings_section('inp_tels_section_id', 'Phones (Format: XXX XXX XXXX)', '', 'inp_tels_id');
    add_settings_section('inp_schedule_section_id', 'Schedule', '', 'inp_schedule_id');

    add_settings_field('inp_setting_address_id', 'Address', 'inp_address_cb', 'inp_address_id', 'inp_address_section_id', array('label_for' =>'inp_setting_address_id'));
    add_settings_field('inp_setting_tel1_id', 'Phone 1', 'inp_tel1_cb', 'inp_tels_id', 'inp_tels_section_id', array('label_for' =>'inp_setting_tel1_id'));
    add_settings_field('inp_setting_tel2_id', 'Phone 2', 'inp_tel2_cb', 'inp_tels_id', 'inp_tels_section_id', array('label_for' =>'inp_setting_tel2_id'));
    add_settings_field('inp_setting_schedule1_id', 'String 1', 'inp_schedule1_cb', 'inp_schedule_id', 'inp_schedule_section_id', array('label_for' =>'inp_setting_schedule1_id'));
    add_settings_field('inp_setting_schedule2_id', 'String 2', 'inp_schedule2_cb', 'inp_schedule_id', 'inp_schedule_section_id', array('label_for' =>'inp_setting_schedule2_id'));
}

function inp_contacts_options_sanitize($options) {
    $clean_options = array();
    foreach ($options as $k => $v) {
        $clean_options[$k] = strip_tags($v);
    }
    return $clean_options;
}

function inp_address_cb() {
    $options = get_option('inp_contacts_options');

    ?>

    <input type="text" class='regular-text' name="inp_contacts_options[address]" id="inp_setting_address_id" value="<?php echo esc_attr($options['address'])  ?>"  />

    <?php
}

function inp_tel1_cb() {
    $options = get_option('inp_contacts_options');

    ?>

    <input type="text" class='regular-text' name="inp_contacts_options[tel1]" id="inp_setting_tel1_id" value="<?php echo esc_attr($options['tel1'])  ?>"  />

    <?php
}

function inp_tel2_cb() {
    $options = get_option('inp_contacts_options');

    ?>

    <input type="text" class='regular-text' name="inp_contacts_options[tel2]" id="inp_setting_tel2_id" value="<?php echo esc_attr($options['tel2'])  ?>"  />

    <?php
}

function inp_schedule1_cb() {
    $options = get_option('inp_contacts_options');

    ?>

    <input type="text" class='regular-text' name="inp_contacts_options[schedule1]" id="inp_setting_schedule1_id" value="<?php echo esc_attr($options['schedule1'])  ?>"  />

    <?php
}

function inp_schedule2_cb() {
    $options = get_option('inp_contacts_options');

    ?>

    <input type="text" class='regular-text' name="inp_contacts_options[schedule2]" id="inp_setting_schedule2_id" value="<?php echo esc_attr($options['schedule2'])  ?>"  />

    <?php
}

/*===Admin-panel Contacts section END===*/

/*===Admin-panel Pictures section===*/

add_action('admin_menu','wfm_admin_menu2');
add_action('admin_init','wfm_admin_settings2');

function wfm_admin_menu2() {
    //$page_title
    //$menu_title
    //$capability
    //$menu_slug
    //$function
    //$icon_url
    //$position
    add_menu_page('Pictures', 'Pictures', 'manage_options', 'pictures_settings', 'wfm_option_page2', 'dashicons-format-gallery', 4);
}

function wfm_option_page2() {
    ?>

    <div class="wrap">
        <h2>Pictures</h2>
        <form id='picform' action="options.php" method="post"  enctype='multipart/form-data'>
            <?php settings_fields('pictures_group'); ?>
            <?php do_settings_sections('inp_pictures_id'); ?>
            <?php submit_button(); ?>
        </form>
    </div>

    <?php
}

function wfm_admin_settings2() {
    // $option_group, $option_name, $sanitize_callback
    register_setting('pictures_group', 'inp_pictures_options', 'inp_pictures_options_sanitize');

    add_settings_section('inp_pictures_section_id', 'Pictures', '', 'inp_pictures_id');

    add_settings_field('inp_setting_pic1_id', 'Picture 1 (262x362)', 'inp_setting_pic1_cb', 'inp_pictures_id', 'inp_pictures_section_id', array('label_for' =>'inp_setting_pic1_id'));
    add_settings_field('inp_setting_pic2_id', 'Picture 2 (262x362)', 'inp_setting_pic2_cb', 'inp_pictures_id', 'inp_pictures_section_id', array('label_for' =>'inp_setting_pic2_id'));
    add_settings_field('inp_setting_pic3_id', 'Picture 3 (440x362)', 'inp_setting_pic3_cb', 'inp_pictures_id', 'inp_pictures_section_id', array('label_for' =>'inp_setting_pic3_id'));

}

function inp_pictures_options_sanitize($options) {

    for ($i = 1; $i <= 3; $i++) {
        if (!empty($_FILES['inp_picture_'.$i]['tmp_name'])) {
            $overrides = array('test_form' => false);
            $file = wp_handle_upload($_FILES['inp_picture_'.$i], $overrides);
            $options['file'.$i] = $file['url'];

        }
        else {
            $old_options = get_option('inp_pictures_options');
            $options['file'.$i] = $old_options['file'.$i];
        }


    }
    $clean_options = array();
    foreach ($options as $k => $v) {
        $clean_options[$k] = strip_tags($v);
    }
    return $clean_options;
}

function inp_setting_pic1_cb() {

    ?>

    <input type="file" name="inp_picture_1" id="inp_setting_pic1_id" /><br>
    <img style="display: none" src="" id='preview_pic' width="100" alt="" />



    <?php
    $options = get_option('inp_pictures_options');
    if (!empty($options['file1'])) {
        echo "<p><img src='{$options['file1']}' alt='' width='200'></p>";
    }
}

function inp_setting_pic2_cb() {

    ?>

    <input type="file" name="inp_picture_2" id="inp_setting_pic2_id" /><br>
    <img style="display: none" src="" id='preview_pic' width="100" alt="" />

    <?php
    $options = get_option('inp_pictures_options');
    if (!empty($options['file2'])) {
        echo "<p><img src='{$options['file2']}' alt='' width='200'></p>";
    }
}

function inp_setting_pic3_cb() {

    ?>

    <input type="file" name="inp_picture_3" id="inp_setting_pic3_id" /><br>
    <img style="display: none" src="" id='preview_pic' width="100" alt="" />

    <?php
    $options = get_option('inp_pictures_options');
    if (!empty($options['file3'])) {
        echo "<p><img src='{$options['file3']}' alt='' width='200'></p>";
    }
}



/*===Admin-panel Pictures section END===*/

/*===Callback Form===*/



/*===Callback Form END===*/


 ?>