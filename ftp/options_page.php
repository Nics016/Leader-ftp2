<?php 
// регистрация настроек
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'section_main_page',
        array(
            'title' => 'Настройки темы: главная страница',
            'description' => 'Главная страница',
            'priority' => 1,
        )
    );

    init_main_page_inputs($customizer);
});

function init_main_page_inputs($customizer){
	// картинка в хидере (слева)
	$customizer->add_setting(
    'input_left_image',
    array('default' => 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic1.png')
	);
	// контрол
	$customizer->add_control(
    'input_left_image',
    array(
        'label' => 'Ссылка на картинку вверху слева',
        'section' => 'section_main_page',
        'type' => 'text',
    )
	);

    // картинка в хидере (по-центру)
    $customizer->add_setting(
    'input_middle_image',
    array('default' => 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic2.png')
    );
    // контрол
    $customizer->add_control(
    'input_middle_image',
    array(
        'label' => 'Ссылка на картинку вверху по-центру',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );

    // картинка в хидере (справа)
    $customizer->add_setting(
    'input_right_image',
    array('default' => 'http://fond-lider.r01host.ru/wp-content/themes/LeaderTheme/img/top-pic3.png')
    );
    // контрол
    $customizer->add_control(
    'input_right_image',
    array(
        'label' => 'Ссылка на картинку вверху справа',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );

    // YouTube
    $customizer->add_setting(
    'input_youtube',
    array('default' => 'http://youtube.com')
    );
    // контрол
    $customizer->add_control(
    'input_youtube',
    array(
        'label' => 'Ссылка внизу на YouTube',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );

    // Instagram
    $customizer->add_setting(
    'input_instagram',
    array('default' => 'http://instagram.com')
    );
    // контрол
    $customizer->add_control(
    'input_instagram',
    array(
        'label' => 'Ссылка внизу на Instagram',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );

    // VK
    $customizer->add_setting(
    'input_vk',
    array('default' => 'http://vk.com')
    );
    // контрол
    $customizer->add_control(
    'input_vk',
    array(
        'label' => 'Ссылка внизу на vk',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );

    // Номер телефона в футере
    $customizer->add_setting(
    'input_phone',
    array('default' => '8(800) 123 78 99')
    );
    // контрол
    $customizer->add_control(
    'input_phone',
    array(
        'label' => 'Номер телефона внизу',
        'section' => 'section_main_page',
        'type' => 'text',
    )
    );
}

?>