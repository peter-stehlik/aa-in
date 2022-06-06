<?php
/*
 * Aardwark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package
 * @since 1.0.0
 */

if (!function_exists('page_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function page_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('intranetaa', get_template_directory().'/languages');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /**
         * Remove excerpt.
         */
        add_action('init', 'my_theme_remove_post_type_support');
        function my_theme_remove_post_type_support() {
            remove_post_type_support('post', 'excerpt');
        }

        // Disable Tags Dashboard WP
        add_action('admin_menu', 'my_remove_sub_menus');

        function my_remove_sub_menus() {
            remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
        }
        // Remove tags support from posts
        function myprefix_unregister_tags() {
            unregister_taxonomy_for_object_type('post_tag', 'post');
        }
        add_action('init', 'myprefix_unregister_tags');

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(
            array(
                'top-menu' => __('Hlavné menu', 'intranetaa'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');
		
		// Register a new image sizes
		add_image_size('member_square', 390 , 390, ['center', 'top']);
		add_image_size('member_square_2x', 780 , 780, ['center', 'top']);
		add_image_size('member_tall', 270 , 400, ['center', 'top']);
		add_image_size('member_tall_2x', 540 , 800, ['center', 'top']);
		add_image_size('member_avatar', 68 , 68, ['center', 'top']);
		add_image_size('member_avatar_2x', 136, 136, ['center', 'top']);
		add_image_size('gallery', 370 , 244, true);
		add_image_size('gallery_2x', 740, 488, true);
    }
endif;

add_action('after_setup_theme', 'page_setup');

/**
 * Register widget area.
 *
 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function page_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Pätička', 'aardwark'),
            'id' => 'sidebar-3',
            'description' => __('Add widgets here to appear in your sidebar.', 'intranetaa'),
            'before_widget' => '<section id="%1$s" class="widget %2$s mb-4 pl-4 pb-4 border-bottom">',
            'after_widget' => '</section>',
            'before_title' => '<span class="h4 font-weight-bold d-block">',
            'after_title' => '</span>',
        )
    );
}
add_action('widgets_init', 'page_widgets_init');

function add_theme_scripts()
{
    wp_enqueue_style('aardwark', get_template_directory_uri().'/assets/css/custom.min.css?v=5.3');
	// wp_enqueue_style('theme-styles', get_stylesheet_uri() . '?v=3.4');
	
	wp_enqueue_script('aardwark', get_template_directory_uri().'/assets/js/custom.min.js', array(), 1.9, true);
	
}
  add_action('wp_enqueue_scripts', 'add_theme_scripts');

/*
 * Customize WordPress
 *
 *
 */
/* remove useless classes from navigation */
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var)
{
    if (is_array($var)) {
        $varci = array_intersect($var, array('current-menu-item'));
        $cmeni = array('current-menu-item');
        $selava = array('active');
        $selavaend = array();
        $selavaend = str_replace($cmeni, $selava, $varci);
    } else {
        $selavaend = '';
    }

    return $selavaend;
}

// REMOVE ACTIONS FROM HEAD
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
// END REMOVE ACTIONS FROM HEAD

// CUSTOM LOGO ON LOGIN PAGE
function my_login_logo()
{
    ?>
    <style type="text/css">
		.login {
			background-color:#eee;
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/aardwark-pink.svg');
            background-repeat: no-repeat;
            background-position: bottom 0 right -130px;
            background-size: 300px 200px;
            background-attachment: fixed;
		}
		
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-colour.svg);
            padding-bottom: 60px;
			background-size: 300px 80px;
			background-position: center bottom;
			width:300px;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'my_login_logo');
// END CUSTOM LOGO ON LOGIN PAGE

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
// END REMOVE WP EMOJI

function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
// add_action('wp_default_scripts', 'remove_jquery_migrate');


/**
 * enqueue admin assets.
 */
function enqueue_admin_assets()
{
    $user_id = wp_get_current_user();
    if ($user_id->ID != 1) { // 1 is superadmin, sees everything
        wp_enqueue_style('vak-admin-css', get_template_directory_uri().'/assets/admin/admin.css?v=1.1');
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_assets');


// REMOVE CERTAIN PAGES FROM LIST IN BACKEND
add_action('pre_get_posts', 'exclude_this_page');

function exclude_this_page($query)
{
    if (!is_admin()) {
        return $query;
    }

    global $pagenow;

    // WordPress 3.0

    if ('edit.php' == $pagenow && (get_query_var('post_type') && 'page' == get_query_var('post_type'))) {
        $query->set('post__not_in', array(159,160,161,162,163));
    }

    return $query;
}
// END REMOVE CERTAIN PAGES FROM LIST IN BACKEND

// HELP DISPLAYED DIRECTLY ON DASHBOARD
function custom_dashboard_widget() {
	echo "
    <strong>Ako funguje Bazoš?</strong><p>Ak užívateľ stlačí tlačidlo 'Rezervovať', administrátorovi príde emailom notifikácia o tom, kto má záujem tovar kúpiť. Zároveň na stránke bude pri produkte vyznačené, že je rezervovaný a ďalšia osoba už nebude mať prístup si ho rezervovať.</p>
    <p>Rezerváciu je možné zrušiť, keď v detaile produktu (administrácia) vymažete email z políčka 'Rezervované'.</p>
    <strong>Ako upozorním ostatných o novom príspevku v Intranete?</strong><p>V administrácii príspevku (Aktuality, Teambuilding, Bazoš) máte v pravom stĺpci možnosť 'Upozorniť aardwarkáčov o novom príspevku'. Ak označíte 'áno' (a políčko 'Rozposlané dňa' je prázdne), po uložení príspevku sa všetkým registrovaným členom rozpošle emailová notifikácia o novom príspevku.</p>
    <p>Ak z nejakého dôvodu chcete notifikáciu poslať opakovane, vymažte políčko 'Rozposlané dňa'. Emaily sa rozposielajú iba v tom prípade, ak je prázdne.</p>
    <strong>Ako sú zoradené akcie v teambuildingoch?</strong><p>Akcie sú zoradené podľa dátumu. Ten viete meniť na detaile, v pravom stĺpci hore ako dátum 'Publikované dňa'.</p>
    <strong>Ako zamknúť podstránku len pre konkrétnu skupinu používateľov?</strong><p>V administrácii každého príspevku máte na spodu možnosť zvoliť 'Restrict this content'. Zvoľte 'Members with a certain role', kde zaškrtnite kto môže príspevok vidieť. Odporúčame vždy zaškrtávať aj 'Administrátor'.</p>
    <strong>Ako nastaviť v menu, ktoré položky sa majú zobraziť pre ktorú používateľskú rolu?</strong><p>Cez Vzhľad - Menu môžete upraviť tzv. CSS triedy (pod Navigačný štítok). Ak to tam nie je zobrazené, vpravo hore možno rozbaliť Možnosti zobrazenia a zaškrtnite CSS triedy. Potom tam pridajte kód použivateľskej roly, napr. TPP 1 = tpp-1, študenti 4 = studenti-4, IČO 23 = ico-23.</p>
	<strong>Ako zobrazím stránku z administrácie?</strong><p>Vľavo úplne hore je ikonka domčeka a www adresa stránky. Po nadídení myšou sa vám ukáže ponuka 'Navštíviť stránku'. Otvárajte vždy na novej karte, pretože po jednoduchom kliknutí sa odhlásite z administrácie.</p>
	<strong>Ako upravim stránku?</strong><p>Z ľavého menu vyberte 'Stránky'.</p>
	<strong>Ako zmením heslo?</strong><p>Cez položku 'Profil'.</p>
	";
}
function add_custom_dashboard_widget() {
	wp_add_dashboard_widget('custom_dashboard_widget', 'Užitočné informácie pri úpravách na stránke.', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
// END HELP DISPLAYED DIRECTLY ON DASHBOARD

/*
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> __('Aardwark nastavenia web stránky', 'aardwark'),
		'menu_title'	=> __('Aardwark ', 'aardwark'),
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Nastavenia', 'aardwark'),
		'menu_title'	=> __('Nastavenia', 'aardwark'),
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> __('Pätička', 'aardwark'),
		'menu_title'	=> __('Pätička', 'aardwark'),
		'parent_slug'	=> 'theme-general-settings',
	));
}*/



// disable Gutenberg
// add_filter('use_block_editor_for_post', '__return_false', 10);




/*
* ---------------------------------
*
*	CUSTOM COLOR PALLETTE IN WYSIWYG
*	ref.: https://wordpress.stackexchange.com/questions/233450/how-do-you-add-custom-color-swatches-to-all-wysiwyg-editors
*
* ---------------------------------
*/
function my_mce4_options($init) {

    $custom_colours = '
        "361568", "fialová",
        "6846A0", "ružová tmavá",
        "A06DC0", "ružová",
        "CCA0D7", "ružová svetlá",
        "82D2D2", "zelená",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');


function rjs_lwp_contactform_css_js() {
    wp_dequeue_script( 'contact-form-7' );
    // wp_dequeue_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'rjs_lwp_contactform_css_js');


/* BAZAR REZERVOVAT */
add_action( 'wp_ajax_aa_reserve', 'aa_reserve' );
add_action( 'wp_ajax_nopriv_aa_reserve', 'aa_reserve' );
function aa_reserve()
{
	$result = true;

    $postId = $_GET["postId"];
    $email = $_GET["email"];
    $title = $_GET["title"];
    $permalink = $_GET["permalink"];
	
    if( $postId && $email && $title && $permalink ){
        update_field("rezervovane", $email, $postId);

        $current_user = wp_get_current_user();
        $email = $current_user->email;

        $to = "hr@aardwark.com";
        /*if( $email = "peter@inovative.sk" ){
            $to = "ahoj.wappka@gmail.com";
        }*/
        $subject = "AA Bazos rezervacia";
        $message = "Na bazosi si " . $email . " rezervoval <a href='" . $permalink . "'> " . $title . "</a>.";
		
		$headers = '';		
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Aardwark Bazar <hr@aardwark.com>' . "\r\n";
		$headers .= 'Reply-To: Aardwark <hr@aardwark.com>' . "\r\n";

        mail( $to, $subject, $message, $headers );
    } else {
        $result = false;
    }
	
	echo $result;
	
	die();
}


/* UPOZORNENIE O NOVOM OBSAHU */
function notify_users($post_id, $post, $update){
    $notifier = get_field("rozposlat_email", $post_id);

    if( $notifier == "yes" ){
        $sent_date = get_field("rozposlane_dna", $post_id);
        $chosen_roles = get_field("user_roles", $post_id);
        
        if( !empty($sent_date) ){
            $users = get_users();

            foreach ( $users as $user ) {
                $to = $user->user_email;
                $roles = ( array ) $user->roles;

                if( count(array_intersect($chosen_roles, $roles)) == 0 ){
                    break;
                }
                
                // $to = "ahoj.wappka@gmail.com";
                
                $subject = "AA Intranet dáva do pozornosti";
                $message = "<h2>Čo je nové?</h2>";
                $message .= "<p>Prečítajte si príspevok: <a href='" . get_permalink($post_id) . "'> " . get_the_title($post_id) . "</a>.</p>";
                $message .= "<hr><p><small>Špecialisti na Enterprise IT riešenia</small></p>";
                
                $headers = '';		
                $headers .= 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Aardwark Intranet <hr@aardwark.com>' . "\r\n";
                $headers .= 'Reply-To: Aardwark Intranet <hr@aardwark.com>' . "\r\n";
                    
                mail( $to, $subject, $message, $headers );
            }

            $now = date("d.m.Y H:i:s");
            update_field("rozposlane_dna", $now, $post_id);
        }
    }
}

add_action("save_post", "notify_users", 10, 3);



/*
function ss_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post__not_in', array( 68, 538, 525, 548, 567, 15, 267, 1098, 1100, 54) ); // 68, 538, 525, 548, 567 benefity 1,23,4,6,7 ................. 15, onboarding manual 1 7 4, 23 6 ............ 1098, 1100, 54 admin, templaty zoho, zoho manual pre adminov 
    }
}
add_action( 'pre_get_posts', 'ss_search_filter' );*/