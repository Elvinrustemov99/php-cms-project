<?php

if (!route(1)) {
	$route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))) {
	$route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3){
	$route[1] = 'login';
}

$menus = [
	'index' => [
		'title' => 'Əsas səifə',
		'icon' => 'home',
		'permissions' => [
			'show' => 'Görüntüləmə'
		]

	],
	'user' => [
		'title' => 'İstifadəçilər',
		'icon' => 'user',
		'permissions' => [
			'show' => 'Görüntüləmə',
			'edit' => 'Yeniləmə',
			'delete' => 'Sil'
		]
//		'submenu' => [
//			'add-user' => [
//				'title' => 'İstifadəçi əlavə et',
//				'icon' => 'user'
//			],
//			'users-list' => [
//				'title' => 'İstifadəçi siyahsı',
//				'icon' => 'list'
//			]
//		]
	],
	'menu' => [
		'title' => 'Menyu idarəetmə',
		'icon' => 'bars',
		'permissions' => [
			'show' => 'Görüntüləmə',
			'add' => 'Əlavə etmə',
			'edit' => 'Yeniləmə',
			'delete' => 'Sil'
		]
	],

	'settings' => [
		'title' => 'Tənzimləmələr',
		'icon' => 'cog',
		'permissions' => [
			'show' => 'Görüntüləmə',
			'edit' => 'Yeniləmə'
		]
	]
];

require admin_controller(route(1));