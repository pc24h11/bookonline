<?php
	define('BOOKONLINE_KEY', 'AgCd34');
	define('URL_FRIENDLY', true);

	// Đường dẫn thư mục chứa ứng dụng
	define('PATH_APPLICATION', realpath(dirname(__DIR__)));
	
	// Đường dẫn thư mục chứa thư viện
	define('PATH_LIBRARY', PATH_APPLICATION . '/library');
	
	// Đường dẫn thư mục chứa vendor
	define('PATH_VENDOR', PATH_APPLICATION . '/vendor');
	define('HTMLPURIFIER_PREFIX', PATH_VENDOR);
	
	// Đường dẫn thư mục public
	define('PATH_PUBLIC', PATH_APPLICATION . '/public');
	
	// Đường dẫn thư mục captcha
	define('PATH_CAPTCHA', PATH_PUBLIC . '/captcha');
	
	// Đường dẫn thư mục template
	define('PATH_TEMPLATE', PATH_PUBLIC . '/template');
	
	// Đường dẫn thư mục files
	define('PATH_FILES', PATH_PUBLIC . '/files');
	
	// Đường dẫn thư mục scripts
	define('PATH_SCRIPTS', PATH_PUBLIC . '/scripts');
	
	define('URL_APPLICATION', '');
	define('URL_PUBLIC', URL_APPLICATION . '/public');
	define('URL_TEMPLATE', URL_PUBLIC . '/template');
	define('URL_FILES', URL_PUBLIC . '/files');
	define('URL_SCRIPTS', URL_PUBLIC . '/scripts');
	
	// TABLE NAME
	define('TABLE_GROUP'		, 'group');
	define('TABLE_USER'			, 'user');
	define('TABLE_NESTED'		, 'nested');
	define('TABLE_CATEGORY'		, 'category');
	define('TABLE_BOOK'			, 'book');
	define('TABLE_SLIDER'		, 'slider');
	define('TABLE_PERMISSION'	, 'permission');
	define('TABLE_CART'			, 'cart');
	