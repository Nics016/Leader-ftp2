<?php
add_filter('show_admin_bar', '__return_false'); //скроем на время админ бар сверху

//подключаем стили
function _s_styles()
{
	

	// Header
	wp_register_style('header', get_template_directory_uri(). '/css/header.css');
	wp_enqueue_style('header', get_template_directory_uri(). '/css/header.css');

	// Общие стили
	wp_register_style('total', get_template_directory_uri(). '/css/style.css');
	wp_enqueue_style('total', get_template_directory_uri(). '/css/style.css');

	// Footer
	wp_register_style('footer', get_template_directory_uri(). '/css/footer.css');
	wp_enqueue_style('footer', get_template_directory_uri(). '/css/footer.css');

	// Главная
	if ( is_page("main") )
	{
		wp_register_style('main', get_template_directory_uri(). '/css/main.css');
		wp_enqueue_style('main', get_template_directory_uri(). '/css/main.css');

		//bxslider
		wp_register_style('bxslider', get_template_directory_uri(). '/plugins/bxslider/jquery.bxslider.css');
		wp_enqueue_style('bxslider', get_template_directory_uri(). '/plugins/bxslider/jquery.bxslider.css');
	}
 
	// О проекте
	wp_register_style('about_css', get_template_directory_uri(). '/css/about.css');
	wp_enqueue_style('about_css', get_template_directory_uri(). '/css/about.css');

	// Категория Архив
	wp_register_style('article_css', get_template_directory_uri(). '/css/article.css');
	wp_enqueue_style('article_css', get_template_directory_uri(). '/css/article.css');

	// Статья
	wp_register_style('single_article_css', get_template_directory_uri(). '/css/single_article.css');
	wp_enqueue_style('single_article_css', get_template_directory_uri(). '/css/single_article.css');

	// Контакты главные
	wp_register_style('contacts_css', get_template_directory_uri(). '/css/contacts.css');
	wp_enqueue_style('contacts_css', get_template_directory_uri(). '/css/contacts.css');
}
add_action('wp_enqueue_scripts', '_s_styles');

//подключаю скрипты

function _s_scripts()
{
	//своя библиотека jquery, не вордпрессовска
	wp_deregister_script('jquery');
	wp_register_script('jquery',  get_template_directory_uri(). '/js/jquery.js');
	wp_enqueue_script('jquery');

	if ( is_page("main") )
	{

		//bxslider
		wp_register_script('bxslider',  get_template_directory_uri(). '/plugins/bxslider/jquery.bxslider.min.js', array("jquery"));
		wp_enqueue_script('bxslider');

		//скрипты для главной
		wp_register_script('main',  get_template_directory_uri(). '/js/main.js', array("jquery", "bxslider"));
		wp_enqueue_script('main');

	}

	wp_register_script('common_script',  get_template_directory_uri(). '/js/common.js', array("jquery"));
	wp_enqueue_script('common_script');
}

add_action('wp_enqueue_scripts', '_s_scripts');



//регистрация меню
if ( function_exists( 'register_nav_menus' ) )
{
	register_nav_menus(
		array(
			'top-menu'=>__('Top Menu')
		)
	);
}

function custom_menu(){
	echo '<ul>';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

// Добавляем кнопку добавления миниатюры поста
add_theme_support( 'post-thumbnails' );

// Добавляем страничку настроек темы
require_once("options_page.php");
?>