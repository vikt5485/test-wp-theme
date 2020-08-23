<?php
function scripts() 
{
    //CSS
    wp_register_style("style", get_template_directory_uri() . "/dist/app.css", [], 1, "all");
    wp_enqueue_style("style");

    //JS
    wp_enqueue_script("jquery");
    wp_register_script("app", get_template_directory_uri() . "/dist/app.js", ["jquery"], 1, true);
    wp_enqueue_script("app");

}
add_action("wp_enqueue_scripts", "scripts");

//Theme options
add_theme_support("menus");
add_theme_support("post-thumbnails");
add_theme_support("widgets");


//Menus
register_nav_menus(
    array(

        "top-menu" => "Top Menu Location", 
        "mobile-menu" => "Mobile Menu Location",

    )

    );



//Custom image sizes
add_image_size("blog-large", 800, 400, false);
add_image_size("blog-small", 300, 200, array( 'left', 'top' ));


function my_first_post_type() {
    $args = array(
        "labels" => array(
            "name" => "Projects",
            "singular" => "Project"
        ),
        "public" => true,
        "has_archive" => true,
        "menu_icon" => "dashicons-palmtree",
        "supports" => array("title"),
    );

    register_post_type("projects", $args);



}
add_action("init", "my_first_post_type");


add_action('admin_head', 'remove_content_editor');
/**
 * Remove the content editor from pages as all content is handled through Panels
 */
function remove_content_editor()
{
    if((int) get_option('page_on_front')==get_the_ID())
    {
        remove_post_type_support('page', 'editor');
    }
}


?>