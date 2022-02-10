<?php
/*
// default pages
$defaults = [
	'page_on_front' => 'Home',
	'page_for_posts' => 'Blog',
	'woocommerce_shop_page_id' => 'Shop',
	'woocommerce_cart_page_id' => 'Cart',
	'woocommerce_checkout_page_id' => 'Checkout',
	'woocommerce_myaccount_page_id' => 'My account',
	'woocommerce_terms_page_id' => 'Privacy Policy',
];
*/

$demos 	= array(

	// default websites

	'theme' => array(
		'name'				=> 'Default',
		'categories'	=> [ 'bus', 'blo', 'por' ],
		'plugins'			=> [ 'cf7', 'rev' ],
		'revslider'		=> [ 'theme.zip', 'betheme-blog.zip', 'betheme-portfolio.zip' ],
		'url'					=> 'https://themes.muffingroup.com/betheme',
	),
	'bethemestore' => array(
		'name'				=> 'Default Store',
		'categories'	=> [ 'bus', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'revslider'		=> [ 'bethemestore.zip', 'bethemestore-content.zip' ],
		'wrapper'			=> '1280',
		'url'					=> 'https://themes.muffingroup.com/betheme-store',
	),

	// pre-built websites

	'landing4' => array(
		'name'				=> 'Landing 4',
		'categories'	=> [ 'bus', 'one', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1160',
		'new' => true,
	),
	'event8' => array(
		'name'				=> 'Event 8',
		'categories'	=> [ 'bus', 'ent', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1340',
		'new' => true,
	),
	'whiskey2' => array(
		'name'				=> 'Whiskey 2',
		'categories'	=> [ 'bus', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1210',
		'pages'				=> [
			'page_for_posts' => 'News', // do not change, blog page is not posts page in this demo
			'woocommerce_shop_page_id' => 'Products',
		],
	),
	'agency7' => array(
		'name'				=> 'Agency 7',
		'categories'	=> [ 'bus', 'cre', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1140',
		'pages'				=> [
			'page_for_posts' => 'News', // do not change, blog page is not posts page in this demo
		],
	),
	'book2' => array(
		'name'				=> 'Book 2',
		'categories'	=> [ 'ent', 'one', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1180',
	),
	'tire' => array(
		'name'				=> 'Tire',
		'categories'	=> [ 'bus', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1245',
	),
	'ecofood2' => array(
		'name'				=> 'Eco Food 2',
		'categories'	=> [ 'bus', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1140',
		'pages'				=> [
			'page_for_posts' => 'News', // do not change, blog page is not posts page in this demo
		],
	),
	'shopassistant' => array(
		'name'				=> 'Shop Assistant',
		'categories'	=> [ 'bus', 'blo', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1320',
		'pages'				=> [
			'page_for_posts' => 'News', // do not change, blog page is not posts page in this demo
		],
	),
	'design4' => array(
		'name'				=> 'Design 4',
		'categories'	=> [ 'cre', 'por', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1160',
	),
	'wallet2' => array(
		'name'				=> 'Wallet 2',
		'categories'	=> [ 'bus', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1160',
	),
	'babyshop' => array(
		'name'				=> 'Baby Shop',
		'categories'	=> [ 'bus', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1280',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Products<br /> Catalog',
		],
	),
	'event7' => array(
		'name'				=> 'Event 7',
		'categories'	=> [ 'bus', 'ent', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1180',
	),
	'cottage3' => array(
		'name'				=> 'Cottage 3',
		'categories'	=> [ 'bus', 'ent', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1150',
	),
	'franchise' => array(
		'name'				=> 'Franchise',
		'categories'	=> [ 'bus', 'blo', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1170',
		'pages'				=> [
			'page_for_posts' => 'News',
		],
	),
	'dietshop' => array(
		'name'				=> 'Diet Shop',
		'categories'	=> [ 'bus', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1280',
	),
	'agency6' => array(
		'name'				=> 'Agency 6',
		'categories'	=> [ 'bus', 'cre', 'por', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1140',
	),
	'nursinghome' => array(
		'name'				=> 'Nursing Home',
		'categories'	=> [ 'bus', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1280',
	),
	'dentist4' => array(
		'name'				=> 'Dentist 4',
		'categories'	=> [ 'bus', 'blo', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1260',
	),
	'event6' => array(
		'name'				=> 'Event 6',
		'categories'	=> [ 'bus', 'ent', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1290',
	),
	'clothingstore' => array(
		'name'				=> 'Clothing Store',
		'categories'	=> [ 'bus', 'blo', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1180',
	),
	'business4' => array(
		'name'				=> 'Business 4',
		'categories'	=> [ 'bus', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1160',
	),
	'church3' => array(
		'name'				=> 'Church 3',
		'categories'	=> [ 'blo', 'oth', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'ele' ],
		'wrapper'			=> '1220',
		'pages'				=> [
			'page_for_posts' => 'GOOD NEWS',
		],
	),
	'flower2' => array(
		'name'				=> 'Flower 2',
		'categories'	=> [ 'bus', 'sho', 'ele', 'mfn' ],
		'plugins'			=> [ 'cf7', 'rev', 'woo', 'ele' ],
		'wrapper'			=> '1320',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our flowers',
		],
	),
	'consultant2' => array(
		'name'				=> 'Consultant 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1150',
	),
	'cottage2' => array(
		'name'				=> 'Cottage 2',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'ebook3' => array(
		'name'				=> 'eBook 3',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1150',
	),
	'interior6' => array(
		'name'				=> 'Interior 6',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'tea4' => array(
		'name'				=> 'Tea 4',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1140',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'View our<br/>tea selections',
		],
	),
	'mechanic7' => array(
		'name'				=> 'Mechanic 7',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1280',
	),
	'surfing2' => array(
		'name'				=> 'Surfing 2',
		'categories'	=> array( 'bus', 'ent', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1140',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'PRODUCTS',
		],
	),
	'hemp' => array(
		'name'				=> 'Hemp',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1140',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Discover <br/>our products',
		],
	),
	'coworking' => array(
		'name'				=> 'Coworking',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1340',
	),
	'pizza5' => array(
		'name'				=> 'Pizza 5',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1340',
	),
	'baker3' => array(
		'name'				=> 'Baker 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'dietitian3' => array(
		'name'				=> 'Dietitian 3',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'itservice5' => array(
		'name'				=> 'IT Service 5',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1150',
	),
	'webmaster2' => array(
		'name'				=> 'Webmaster 2',
		'categories'	=> array( 'bus', 'cre', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1160',
	),
	'internet3' => array(
		'name'				=> 'Internet 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'cleaner3' => array(
		'name'				=> 'Cleaner 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'history' => array(
		'name'				=> 'History',
		'categories'	=> array( 'blo', 'oth', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'funfair' => array(
		'name'				=> 'Funfair',
		'categories'	=> array( 'ent', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'barber4' => array(
		'name'				=> 'Barber 4',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'ele' ),
		'wrapper'			=> '1100',
	),
	'farm2' => array(
		'name'				=> 'Farm 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1160',
	),
	'industry2' => array(
		'name'				=> 'Industry 2',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1170',
	),
	'photography3' => array(
		'name'				=> 'Photography 3',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'print4' => array(
		'name'				=> 'Print 4',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1200',
	),
	'kindergarten4' => array(
		'name'				=> 'Kindergarten 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1110',
	),
	'finance4' => array(
		'name'				=> 'Finance 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1130',
	),
	'party4' => array(
		'name'				=> 'Party 4',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1130',
	),
	'scooterrental' => array(
		'name'				=> 'Scooter Rental',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1280',
	),
	'landing3' => array(
		'name'				=> 'Landing 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'portfolio2' => array(
		'name'				=> 'Portfolio 2',
		'categories'	=> array( 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'factory3' => array(
		'name'				=> 'Factory 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1100',
	),
	'weddingband' => array(
		'name'				=> 'Wedding Band',
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'spa6' => array(
		'name'				=> 'Spa 6',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'corporation3' => array(
		'name'				=> 'Corporation 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'pestcontrol' => array(
		'name'				=> 'Pest Control',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1260',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our products',
		],
	),
	'handyman3' => array(
		'name'				=> 'Handyman 3',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'media2' => array(
		'name'				=> 'Media 2',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'ski2' => array(
		'name'				=> 'Ski 2',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'travel2' => array(
		'name'				=> 'Travel 2',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1260',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our tours<br /> and attractions',
		],
	),
	'carparts' => array(
		'name'				=> 'Car Parts',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1260',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'our products',
		],
	),
	'computershop' => array(
		'name'				=> 'Computer Shop',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1260',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our products',
		],
	),
	'leasing' => array(
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1270',
	),
	'festival2' => array(
		'name'				=> 'Festival 2',
		'categories'	=> array( 'ent', 'cre', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'aromatherapy' => array(
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'gsmservice2' => array(
		'name'				=> 'GSM Service 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'agency5' => array(
		'name'				=> 'Agency 5',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'optics' => array(
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'SHOP',
		],
	),
	'itservice4' => array(
		'name'				=> 'IT Service 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'firm2' => array(
		'name'				=> 'Firm 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1000',
	),
	'finance3' => array(
		'name'				=> 'Finance 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'clinic5' => array(
		'name'				=> 'Clinic 5',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'cv2' => array(
		'name'				=> 'CV 2',
		'categories'	=> array( 'bus', 'cre', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
	),
	'creative4' => array(
		'name'				=> 'Creative 4',
		'categories'	=> array( 'cre', 'por', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1920',
	),
	'bistro4' => array(
		'name'				=> 'Bistro 4',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'records2' => array(
		'name'				=> 'Records 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'home3' => array(
		'name'				=> 'Home 3',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our products',
		],
	),
	'hairdresser3' => array(
		'name'				=> 'Hairdresser 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'clothing2' => array(
		'name'				=> 'Clothing 2',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
	),
	'store2' => array(
		'name'				=> 'Store 2',
		'categories'	=> array( 'bus', 'blo', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Products',
		],
	),
	'event5' => array(
		'name'				=> 'Event 5',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'restaurant7' => array(
		'name'				=> 'Restaurant 7',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1180',
	),
	'mechanic6' => array(
		'name'				=> 'Mechanic 6',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'model3' => array(
		'name'				=> 'Model 3',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'detailing4' => array(
		'name'				=> 'Detailing 4',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'clinic4' => array(
		'name'				=> 'Clinic 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'personaltrainer2' => array(
		'name'				=> 'Personal Trainer 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'charity3' => array(
		'name'				=> 'Charity 3',
		'categories'	=> array( 'blo', 'oth', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'business3' => array(
		'name'				=> 'Business 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'data' => array(
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'developer4' => array(
		'name'				=> 'Developer 4',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'artist3' => array(
		'name'				=> 'Artist 3',
		'categories'	=> array( 'ent', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
	),
	'corporation2' => array(
		'name'				=> 'Corporation 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'barman2' => array(
		'name'				=> 'Barman 2',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'home2' => array(
		'name'				=> 'Home 2',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Products',
		],
	),
	'erp2' => array(
		'name'				=> 'ERP 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'course2' => array(
		'name'				=> 'Course 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'training2' => array(
		'name'				=> 'Training 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'agency4' => array(
		'name'				=> 'Agency 4',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'massage2' => array(
		'name'				=> 'Massage 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'ai' => array(
		'name'				=> 'AI',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'grocery2' => array(
		'name'				=> 'Grocery 2',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1280',
		'pages'				=> [
			'woocommerce_shop_page_id' => '○ Our products',
		],
	),
	'party3' => array(
		'name'				=> 'Party 3',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'mining2' => array(
		'name'				=> 'Mining 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'app7' => array(
		'name'				=> 'App 7',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
	),
	'loans4' => array(
		'name'				=> 'Loans 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'renovate4' => array(
		'name'				=> 'Renovate 4',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'estate3' => array(
		'name'				=> 'Estate 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'consultant' => array(
		'name'				=> 'Consultant',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'finance2' => array(
		'name'				=> 'Finance 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
	),
	'firebrigade' => array(
		'name'				=> 'Fire Brigade',
		'categories'	=> array( 'blo', 'oth', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'craftbeer2' => array(
		'name'				=> 'Craft Beer 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1100',
	),
	'lab3' => array(
		'name'				=> 'Lab 3',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'medicalshop2' => array(
		'name'				=> 'Medical Shop 2',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Our products',
		],
	),
	'psychologist3' => array(
		'name'				=> 'Psychologist 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'politics2' => array(
		'name'				=> 'Politics 2',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'medicalshop' => array(
		'name'				=> 'Medical Shop',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'OUR PRODUCTS',
		],
	),
	'course' => array(
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'grocery' => array(
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Products',
		],
	),
	'product5' => array(
		'name'				=> 'Product 5',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'restaurant6' => array(
		'name'				=> 'Restaurant 6',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1160',
	),
	'wine3' => array(
		'name'				=> 'Wine 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'copywriter2' => array(
		'name'				=> 'Copywriter 2',
		'categories'	=> array( 'cre', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'pay2' => array(
		'name'				=> 'Pay 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'company6' => array(
		'name'				=> 'Company 6',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'weddingservices' => array(
		'name'				=> 'Wedding Services',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'astrology' => array(
		'categories'	=> array( 'bus', 'blo', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'journey2' => array(
		'name'				=> 'Journey 2',
		'categories'	=> array( 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'loans3' => array(
		'name'				=> 'Loans 3',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'cafe3' => array(
		'name'				=> 'Cafe 3',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'band5' => array(
		'name'				=> 'Band 5',
		'categories'	=> array( 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'hotel5' => array(
		'name'				=> 'Hotel 5',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'rallydriver' => array(
		'name'				=> 'Rally Driver',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'foodtruck' => array(
		'name'				=> 'Food Truck',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'mall' => array(
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'psychologist2' => array(
		'name'				=> 'Psychologist 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'handyman2' => array(
		'name'				=> 'Handyman 2',
		'categories'	=> array( 'bus', 'cre', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'security3' => array(
		'name'				=> 'Security 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'club3' => array(
		'name'				=> 'Club 3',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'restaurant5' => array(
		'name'				=> 'Restaurant 5',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'tailor3' => array(
		'name'				=> 'Tailor 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'itservice3' => array(
		'name'				=> 'IT Service 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'app6' => array(
		'name'				=> 'App 6',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'ele' ),
		'wrapper'			=> '1120',
	),
	'swimmingpool' => array(
		'name'				=> 'Swimming Pool',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'tutor' => array(
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'carrental2' => array(
		'name'				=> 'Car Rental 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'interactive2' => array(
		'name'				=> 'Interactive 2',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'cityhall' => array(
		'name'				=> 'City Hall',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'electric2' => array(
		'name'				=> 'Electric 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'band4' => array(
		'name'				=> 'Band 4',
		'categories'	=> array( 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'weddingplanner' => array(
		'name'				=> 'Wedding Planner',
		'categories'	=> array( 'bus', 'oth', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'steak2' => array(
		'name'				=> 'Steak 2',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'ecofood' => array(
		'name'				=> 'Eco Food',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1160',
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Products',
		],
	),
	'danceschool2' => array(
		'name'				=> 'Dance School 2',
		'categories'	=> array( 'bus', 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'fisher' => array(
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'eco3' => array(
		'name'				=> 'Eco 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'xmas3' => array(
		'name'				=> 'Xmas 3',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'language3' => array(
		'name'				=> 'Language 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'repair3' => array(
		'name'				=> 'Repair 3',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'kindergarten3' => array(
		'name'				=> 'Kindergarten 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'3dprint' => array(
		'name'				=> '3D Print',
		'categories'	=> array( 'bus', 'sho', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo', 'ele' ),
		'wrapper'			=> '1120',
	),
	'horse2' => array(
		'name'				=> 'Horse 2',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'party2' => array(
		'name'				=> 'Party 2',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1200',
	),
	'callcenter2' => array(
		'name'				=> 'Call Center 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'spa5' => array(
		'name'				=> 'Spa 5',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1260',
	),
	'plumber2' => array(
		'name'				=> 'Plumber 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'blogger3' => array(
		'name'				=> 'Blogger 3',
		'categories'	=> array( 'ent', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1000',
	),
	'driving2' => array(
		'name'				=> 'Driving 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'oculist2' => array(
		'name'				=> 'Oculist 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'coach' => array(
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'halloween' => array(
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'icecream2' => array(
		'name'				=> 'Ice Cream 2',
		'categories'	=> array( 'bus', 'cre', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'paintball' => array(
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'carwash2' => array(
		'name'				=> 'Car Wash 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'insurance3' => array(
		'name'				=> 'Insurance 3',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'transport3' => array(
		'name'				=> 'Transport 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'lawyer5' => array(
		'name'				=> 'Lawyer 5',
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'ele' ),
		'wrapper'			=> '1120',
	),
	'seo3' => array(
		'name'				=> 'SEO 3',
		'categories'	=> array( 'bus', 'cre', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'spa4' => array(
		'name'				=> 'Spa 4',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1160',
	),
	'hosting3' => array(
		'name'				=> 'Hosting 3',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'video3' => array(
		'name'				=> 'Video 3',
		'categories'	=> array( 'bus', 'cre', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1140',
	),
	'marathon' => array(
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'taxi2' => array(
		'name'				=> 'Taxi 2',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'boxing' => array(
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'webinar' => array(
		'categories'	=> array( 'bus', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'factory2' => array(
		'name'				=> 'Factory 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1100',
	),
	'seajourney' => array(
		'name'				=> 'Sea Journey',
		'categories'	=> array( 'ent', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'print3' => array(
		'name'				=> 'Print 3',
		'categories'	=> array( 'bus', 'por', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'app5' => array(
		'name'				=> 'App 5',
		'categories'	=> array( 'bus', 'one', 'ele', 'mfn' ),
		'plugins'			=> array( 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'biker3' => array(
		'name'				=> 'Biker 3',
		'categories'	=> array( 'bus', 'ent', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1120',
	),
	'honey' => array(
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1160',
	),
	'cleaner2' => array(
		'name'				=> 'Cleaner 2',
		'categories'	=> array( 'bus', 'ele', 'mfn' ),
		'plugins'			=> array( 'cf7', 'rev', 'ele' ),
		'wrapper'			=> '1110',
	),
	'ebook2' => array(
		'name'				=> 'eBook 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'festival' => array(
		'categories'	=> array( 'ent', 'cre', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'garden4' => array(
		'name'				=> 'Garden 4',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'football2' => array(
		'name'				=> 'Football 2',
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'architect5' => array(
		'name'				=> 'Architect 5',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'cottage' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'company5' => array(
		'name'				=> 'Company 5',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'catering2' => array(
		'name'				=> 'Catering 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'dj2' => array(
		'name'				=> 'DJ 2',
		'categories'	=> array( 'ent', 'cre', 'blo', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'photography2' => array(
		'name'				=> 'Photography 2',
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'code2' => array(
		'name'				=> 'Code 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'bar3' => array(
		'name'				=> 'Bar 3',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'dentist3' => array(
		'name'				=> 'Dentist 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'event4' => array(
		'name'				=> 'Event 4',
		'categories'	=> array( 'bus', 'ent', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'sitter2' => array(
		'name'				=> 'Sitter 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'design3' => array(
		'name'				=> 'Design 3',
		'categories'	=> array( 'cre', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'photo2' => array(
		'name'				=> 'Photo 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'psychologist' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'hotel4' => array(
		'name'				=> 'Hotel 4',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'gym3' => array(
		'name'				=> 'Gym 3',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'yoga3' => array(
		'name'				=> 'Yoga 3',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'lab2' => array(
		'name'				=> 'Lab 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'pizza4' => array(
		'name'				=> 'Pizza 4',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'mechanic5' => array(
		'name'				=> 'Mechanic 5',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'medic3' => array(
		'name'				=> 'Medic 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'barber3' => array(
		'name'				=> 'Barber 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'itservice2' => array(
		'name'				=> 'IT Service 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'transport2' => array(
		'name'				=> 'Transport 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'mechanic4' => array(
		'name'				=> 'Mechanic 4',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'yacht' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'safari2' => array(
		'name'				=> 'Safari 2',
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'baker2' => array(
		'name'				=> 'Baker 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'hairdresser2' => array(
		'name'				=> 'Hairdresser 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'mountainguide' => array(
		'name'				=> 'Mountain Guide',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'extreme2' => array(
		'name'				=> 'Extreme 2',
		'categories'	=> array( 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'event3' => array(
		'name'				=> 'Event 3',
		'categories'	=> array( 'bus', 'ent', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'product4' => array(
		'name'				=> 'Product 4',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'resort2' => array(
		'name'				=> 'Resort 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'bistro3' => array(
		'name'				=> 'Bistro 3',
		'categories'	=> array( 'bus', 'cre', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'danceschool' => array(
		'name'				=> 'Dance School',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'sciencecentre' => array(
		'name'				=> 'Science Centre',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'polyglot' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'interior5' => array(
		'name'				=> 'Interior 5',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'rev' ),
	),
	'carpenter4' => array(
		'name'				=> 'Carpenter 4',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'company4' => array(
		'name'				=> 'Company 4',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'club2' => array(
		'name'				=> 'Club 2',
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'adventure2' => array(
		'name'				=> 'Adventure 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'whiskey' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'product3' => array(
		'name'				=> 'Product 3',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'organic' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'moving3' => array(
		'name'				=> 'Moving 3',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'architect4' => array(
		'name'				=> 'Architect 4',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'electronics' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'tea3' => array(
		'name'				=> 'Tea 3',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'hosting2' => array(
		'name'				=> 'Hosting 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'coaching2' => array(
		'name'				=> 'Coaching 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'product2' => array(
		'name'				=> 'Product 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'healthy' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'diet2' => array(
		'name'				=> 'Diet 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'biker2' => array(
		'name'				=> 'Biker 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'app4' => array(
		'name'				=> 'App 4',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'carpenter3' => array(
		'name'				=> 'Carpenter 3',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'video2' => array(
		'name'				=> 'Video 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'manicure2' => array(
		'name'				=> 'Manicure 2',
		'categories'	=> array( 'bus', 'one' ),
	),
	'adagency2' => array(
		'name'				=> 'AdAgency 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7' ),
	),
	'print2' => array(
		'name'				=> 'Print 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'pet' => array(
		'categories'	=> array( 'one', 'oth' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'weddingphotos' => array(
		'name'				=> 'Wedding Photos',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7' ),
	),
	'restaurant4' => array(
		'name'				=> 'Restaurant 4',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'catering' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'aeroclub' => array(
		'name'				=> 'Aero Club',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'rev' ),
	),
	'logistics2' => array(
		'name'				=> 'Logistics 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'cosmetics2' => array(
		'name'				=> 'Cosmetics 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'rev' ),
	),
	'kids' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'asg2' => array(
		'name'				=> 'ASG 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'beauty4' => array(
		'name'				=> 'Beauty 4',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'model2' => array(
		'name'				=> 'Model 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'weddingdresses' => array(
		'name'				=> 'Wedding Dresses',
		'categories'	=> array( 'bus', 'oth' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'spa3' => array(
		'name'				=> 'Spa 3',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'band3' => array(
		'name'				=> 'Band 3',
		'categories'	=> array( 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'gunrange' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'renovate3' => array(
		'name'				=> 'Renovate 3',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'tailor2' => array(
		'name'				=> 'Tailor 2',
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'			=> array( 'rev' ),
	),
	'cakes' => array(
		'name'				=> 'Cakes',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'car2' => array(
		'name'				=> 'Car 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'rev' ),
	),
	'agency3' => array(
		'name'				=> 'Agency 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'coffee3' => array(
		'name'				=> 'Coffee 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'rev' ),
	),
	'school2' => array(
		'name'				=> 'School 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'burger2' => array(
		'name'				=> 'Burger 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'internet2' => array(
		'name'				=> 'Internet 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'restaurant3' => array(
		'name'				=> 'Restaurant 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'clinic3' => array(
		'name'				=> 'Clinic 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'drone' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'estate2' => array(
		'name'				=> 'Estate 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'builder2' => array(
		'name'				=> 'Builder 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'football' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'insurance2' => array(
		'name'				=> 'Insurance 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'beauty3' => array(
		'name'				=> 'Beauty 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'interior4' => array(
		'name'				=> 'Interior 4',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'rev' ),
	),
	'recipes2' => array(
		'name'				=> 'Recipes 2',
		'categories'	=> array( 'ent', 'blo' ),
	),
	'erp' => array(
		'categories'	=> array( 'bus' ),
	),
	'lawyer4' => array(
		'name'				=> 'Lawyer 4',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'movie2' => array(
		'name'				=> 'Movie 2',
		'categories'	=> array( 'ent', 'blo' ),
	),
	'interior3' => array(
		'name'				=> 'Interior 3',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'navigation' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo' ),
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Store',
		],
	),
	'vet2' => array(
		'name'				=> 'Vet 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'minimal2' => array(
		'name'				=> 'Minimal 2',
		'categories'	=> array( 'cre', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'creative3' => array(
		'name'				=> 'Creative 3',
		'categories'	=> array( 'cre', 'por' ),
		'plugins'			=> array( 'cf7' ),
	),
	'county' => array(
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'			=> array( 'cf7' ),
	),
	'company3' => array(
		'name'				=> 'Company 3',
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'band2' => array(
		'name'				=> 'Band 2',
		'categories'	=> array( 'ent', 'cre' ),
		'plugins'			=> array( 'cf7' ),
	),
	'product' => array(
		'categories'	=> array( 'bus', 'other' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'cryptocurrency' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'landing2' => array(
		'name'				=> 'Landing 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7' ),
	),
	'supplier' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'sportsman' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'barman' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'kindergarten2' => array(
		'name'				=> 'Kindergarten 2',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'coffee2' => array(
		'name'				=> 'Coffee 2',
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'gym2' => array(
		'name'				=> 'Gym 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'eco2' => array(
		'name'				=> 'Eco 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'garden3' => array(
		'name'				=> 'Garden 3',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'fantasy' => array(
		'categories'	=> array( 'cre', 'oth' ),
		'plugins'			=> array( 'rev' ),
	),
	'church2' => array(
		'name'				=> 'Church 2',
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'funeralhome' => array(
		'name'				=> 'Funeral Home',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7' ),
	),
	'security2' => array(
		'name'				=> 'Security 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'event2' => array(
		'name'				=> 'Event 2',
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'repair2' => array(
		'name'				=> 'Repair 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7' ),
	),
	'thriller' => array(
		'categories'	=> array( 'cre', 'one' ),
	),
	'company2' => array(
		'name'				=> 'Company 2',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'simple2' => array(
		'name'				=> 'Simple 2',
		'categories'	=> array( 'cre', 'oth' ),
		'plugins'			=> array( 'cf7' ),
	),
	'architect3' => array(
		'name'				=> 'Architect 3',
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'adventure' => array(
		'categories'	=> array( 'ent', 'blo', 'sho' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo' ),
		'pages'				=> [
			'page_for_posts' => 'Adventure Stories',
		],
	),
	'accountant3' => array(
		'name'				=> 'Accountant 3',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'universe' => array(
		'categories'	=> array( 'one', 'oth' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'tea2' => array(
		'name'				=> 'Tea 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7' ),
	),
	'hairdresser' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'mechanic3' => array(
		'name'				=> 'Mechanic 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'fitness2' => array(
		'name'				=> 'Fitness 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'actor' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'clothing' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo' ),
		'revslider'		=> array( 'clothing.zip', 'clothing-content.zip' ),
	),
	'dietitian2' => array(
		'name'				=> 'Dietitian 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'resort' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'bar2' => array(
		'name'				=> 'Bar 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'museum2' => array(
		'name'				=> 'Museum 2',
		'categories'	=> array( 'ent', 'cre', 'blo', 'oth' ),
		'plugins'			=> array( 'cf7' ),
	),
	'accountant2' => array(
		'name'				=> 'Accountant 2',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'decor2' => array(
		'name'				=> 'Decor 2',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7' ),
	),
	'farm' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'yoga2' => array(
		'name'				=> 'Yoga 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'rev' ),
	),
	'webdeveloper' => array(
		'name'				=> 'Web Developer',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'lawyer3' => array(
		'name'				=> 'Lawyer 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'birthday' => array(
		'categories'	=> array( 'ent', 'one' ),
		'plugins'			=> array( 'rev' ),
	),
	'ecobeef' => array(
		'name'				=> 'Eco Beef',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'hotel3' => array(
		'name'				=> 'Hotel 3',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'app3' => array(
		'name'				=> 'App 3',
		'categories'	=> array( 'bus', 'ent' ),
	),
	'photography' => array(
		'categories'	=> array( 'bus', 'cre', 'blo', 'por' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'robotics' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'carwash' => array(
		'name'				=> 'Car Wash',
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'gsmservice' => array(
		'name'				=> 'GSM Service',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'snowpark' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'rev' ),
	),
	'wanderer' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'			=> array( 'rev' ),
	),
	'pizza3' => array(
		'name'	=> 'Pizza 3',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'cv' => array(
		'categories'	=> array( 'bus', 'one' ),
	),
	'winter' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'stylist' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'			=> array( 'cf7' ),
	),
	'company' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'bistro2' => array(
		'name'				=> 'Bistro 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'			=> array( 'cf7' ),
	),
	'music2' => array(
		'name'	=> 'Music 2',
		'categories'	=> array( 'ent', 'blo', 'sho' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'language2' => array(
		'name'	=> 'Language 2',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'employment' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'watchmaker' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'			=> array( 'cf7', 'rev' ),
	),
	'pay' => array(
		'categories'	=> array( 'bus', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'animals2' => array(
		'name'	=> 'Animals 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'artist2' => array(
		'name'	=> 'Artist 2',
		'categories'	=> array( 'bus', 'cre', 'blo', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'developer3' => array(
		'name'	=> 'Developer 3',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'personaltrainer' => array(
		'name'			=> 'Personal Trainer',
		'categories'	=> array( 'bus', 'ent', 'one' ),
		'plugins'		=> array( 'cf7' ),
	),
	'detailing3' => array(
		'name'			=> 'Detailing 3',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'carpenter2' => array(
		'name'			=> 'Carpenter 2',
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'internet' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'airport' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'salmon' => array(
		'categories'	=> array( 'bus', 'one', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'detailing2' => array(
		'categories'	=> array( 'bus' ),
		'plugins'			=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'detailing2.zip', 'detailing2-content.zip' ),
	),
	'drawing' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'mockup' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'denim' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
	),
	'manicure' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
		'pages'				=> [
			'woocommerce_shop_page_id' => 'Manicure store',
		],
	),
	'meeting' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'vegetables' => array(
		'categories'	=> array( 'bus', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'meat' => array(
		'categories'	=> array( 'bus', 'blo', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'cafe2' => array(
		'name'			=> 'Cafe 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'tiles2' => array(
		'name'			=> 'Tiles 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'rev' ),
		'revslider'		=> array( 'tiles2.zip', 'tiles2-content.zip' ),
	),
	'hiphop' => array(
		'name'			=> 'Hip Hop',
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'game' => array(
		'categories'	=> array( 'bus', 'ent', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'marina' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'clinic2' => array(
		'name'			=> 'Clinic 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'clinic2.zip', 'clinic2-content.zip' ),
	),
	'assistance' => array(
		'name'			=> 'Assistance',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'sushi2' => array(
		'name'			=> 'Sushi 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'repair' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'3d' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'code' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'spa2' => array(
		'name'			=> 'Spa 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'it' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'upholsterer' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'cf7' ),
	),
	'fareast' => array(
		'name'			=> 'Far East',
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'loans2' => array(
		'name'			=> 'Loans 2',
		'categories'	=> array( 'bus', 'one', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'philharmonic' => array(
		'name'			=> 'Philharmonic',
		'categories'	=> array( 'ent', 'blo', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'garden2' => array(
		'name'			=> 'Garden 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'weddingvideos' => array(
		'name'			=> 'Wedding Videos',
		'categories'	=> array( 'bus', 'ent', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'animalshelter' => array(
		'name'			=> 'Animal Shelter',
		'categories'	=> array( 'por', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'craftbeer' => array(
		'name'			=> 'Craft Beer',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'elearning' => array(
		'name'			=> 'eLearning',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'elearning.zip', 'elearning-content.zip' ),
	),
	'artist' => array(
		'name'			=> 'Artist',
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'oculist' => array(
		'name'			=> 'Oculist',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'sportsclub' => array(
		'name'			=> 'Sports Club',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'productions' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'diet' => array(
		'categories'	=> array( 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'boutique' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'boutique.zip', 'boutique-content.zip' ),
	),
	'stone' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'guesthouse' => array(
		'name'			=> 'Guest House',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'wildlife' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'restaurant2' => array(
		'name'			=> 'Restaurant 2',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'restaurant2.zip', 'restaurant2-content.zip' ),
	),
	'dentist2' => array(
		'name'	=> 'Dentist 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'furniture2' => array(
		'name'	=> 'Furniture 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'creative2' => array(
		'name'	=> 'Creative 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'wine2' => array(
		'name'	=> 'Wine 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'detailing' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'detailing.zip', 'detailing-content.zip' ),
	),
	'home' => array(
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'active' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'shoes' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
	),
	'corporation' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'musician' => array(
		'categories'	=> array( 'ent', 'blo', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'developer2' => array(
		'name'	=> 'Developer 2',
		'categories'	=> array( 'bus', 'blo', 'por'  ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'xmas2' => array(
		'name'	=> 'Xmas 2',
		'categories'	=> array( 'ent', 'one' ),
		'plugins'		=> array( 'cf7' ),
	),
	'fireplace' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
	),
	'training' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'couturier' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'couturier-box1.zip', 'couturier-box2.zip' ),
	),
	'surveyor' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'wallet' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'herbal' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
	),
	'snapshot' => array(
		'categories'	=> array( 'ent', 'cre', 'blo', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'biolab' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'biolab-content.zip', 'biolab-content2.zip' ),
	),
	'moto' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'logistics' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'pizza2' => array(
		'name'	=> 'Pizza 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'hifi' => array(
		'name'	=> 'HiFi',
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'woo' ),
	),
	'ebook' => array(
		'name'	=> 'eBook',
		'categories'	=> array( 'ent', 'one', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'lawyer2' => array(
		'name'	=> 'Lawyer 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'watch' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'tailor' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'biker' => array(
		'categories'	=> array( 'bus', 'ent', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
		'pages'				=> [
			'woocommerce_shop_page_id' => 'SHOP',
		],
	),
	'writer' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'mechanic2' => array(
		'name'	=> 'Mechanic 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'barber2' => array(
		'name'	=> 'Barber 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'goodfood' => array(
		'categories'	=> array( 'cre', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'agency2' => array(
		'name'	=> 'Agency 2',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'minimal' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'medic2' => array(
		'name'	=> 'Medic 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'underwater' => array(
		'categories'	=> array( 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'seo2' => array(
		'name'	=> 'SEO 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'smarthome' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'car' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'makeup' => array(
		'categories'	=> array( 'cre', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'architect2' => array(
		'name'	=> 'Architect 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'wedding2' => array(
		'name'	=> 'Wedding 2',
		'categories'	=> array( 'ent', 'oth' ),
		'plugins'		=> array( 'rev' ),
	),
	'technics' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'aquapark' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'print' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'perfume' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'movie' => array(
		'categories'	=> array( 'ent' ),
		'plugins'		=> array( 'rev' ),
	),
	'eco' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'bistro' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'ngo' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'casino' => array(
		'categories'	=> array( 'ent', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'pharmacy' => array(
		'categories'	=> array( 'blo', 'sho' ),
		'plugins'			=> array( 'cf7', 'rev', 'woo' ),
		'pages'				=> [
			'page_for_posts' => 'Articles',
		],
	),
	'hr' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'music' => array(
		'categories'	=> array( 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'vpn' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'pets' => array(
		'categories'	=> array( 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'tiles' => array(
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'freelancer' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'lifestyle' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'app2' => array(
		'name'	=> 'App 2',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'rev' ),
	),
	'kebab' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'holding' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'tea' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'toy' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'charity2' => array(
		'name'	=> 'Charity 2',
		'categories'	=> array( 'bus', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'carpenter' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'mining' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'retouch' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'accountant' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'sushi' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'rev' ),
	),
	'beauty2' => array(
		'name'	=> 'Beauty 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'fitness' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'rev' ),
		'revslider'		=> array( 'fitness.zip', 'fitness-content.zip' ),
	),
	'design2' => array(
		'name'	=> 'Design 2',
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'painter' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'kindergarten' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'rev', 'cf7' ),
	),
	'ski' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'rev' ),
	),
	'blogger2' => array(
		'name'	=> 'Blogger 2',
		'categories'	=> array( 'ent', 'blo', 'ele', 'mfn' ),
		'plugins'			=> array( 'ele' ),
		'wrapper'			=> '1260',
	),
	'service' => array(
		'categories'	=> array( 'bus', 'one' ),
	),
	'firm' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'interior2' => array(
		'name'	=> 'Interior 2',
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'rev' ),
	),
	'industry' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'journey' => array(
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'science' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'carver' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'hotel2' => array(
		'name'	=> 'Hotel 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'moving2' => array(
		'name'	=> 'Moving 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'billiard' => array(
		'categories'	=> array( 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'business2' => array(
		'name'	=> 'Business 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'renovate2' => array(
		'name'	=> 'Renovate 2',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'xmas' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'rev', 'mch' ),
	),
	'exposure' => array(
		'categories'	=> array( 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'burger' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'rev' ),
	),
	'profile' => array(
		'categories'	=> array( 'por', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'profile.zip', 'profile-portfolio.zip' ),
	),
	'farmer' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'copywriter' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'horse' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'notebook' => array(
		'categories'	=> array( 'bus', 'one', 'oth' ),
	),
	'dietitian' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'investment' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'investment.zip', 'investment-content.zip' ),
	),
	'handmade' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'space' => array(
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'		=> array( 'rev' ),
	),
	'club' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'buddy' => array(
		'categories'	=> array( 'ent', 'oth' ),
		'plugins'		=> array( 'bud', 'rev' ),
	),
	'lab' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'zoo' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'asg' => array(
		'name'	=> 'ASG',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'journalist' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'simple' => array(
		'categories'	=> array( 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'extreme' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'voyager' => array(
		'categories'	=> array( 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'typo' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'tuning' => array(
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'smart' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'glasses' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'taxi' => array(
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'cf7'),
	),
	'decor' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'builder' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'karting' => array(
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'coaching' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'wine' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'surfing' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'garden' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'garden-content.zip', 'garden-content2.zip' ),
	),
	'software' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'library' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'digital' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'icecream' => array(
		'name'	=> 'Ice Cream',
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'rev' ),
	),
	'constructor' => array(
		'categories'	=> array( 'bus', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'interactive' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'agro' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'media' => array(
		'categories'	=> array( 'bus', 'por', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'cosmetics' => array(
		'categories'	=> array( 'bus', 'cre', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
		'revslider'		=> array( 'cosmetics1.zip', 'cosmetics2.zip', 'cosmetics3.zip' ),
	),
	'jet' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'dentist' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'kravmaga' => array(
		'name'	=> 'Krav Maga',
		'categories'	=> array( 'ent', 'cre', 'por', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'transfer' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'showcase' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'cafe' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'bikerental' => array(
		'name'	=> 'Bike Rental',
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'massage' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'callcenter' => array(
		'name'	=> 'Call Center',
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'golf' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'theater' => array(
		'categories'	=> array( 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'flower' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'handyman' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'translator' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'story' => array(
		'categories'	=> array( 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'factory' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'recipes' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'sport' => array(
		'categories'	=> array( 'ent', 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ,'rev', 'mch' ),
	),
	'store' => array(
		'categories'	=> array( 'bus', 'blo', 'sho' ),
		'plugins'		=> array( 'cf7' ,'rev', 'mch', 'woo' ),
	),
	'animals' => array(
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'webdesign' => array(
		'name'	=> 'WebDesign',
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ,'rev', 'mch' ),
	),
	'safari' => array(
		'categories'	=> array( 'ent', 'one', 'oth' ),
	),
	'adagency' => array(
		'name'	=> 'AdAgency',
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ,'rev', 'mch' ),
		'revslider'		=> array( 'adagency.zip', 'adagency-content.zip' ),
	),
	'congress' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'video' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'steak' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'clinic' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'play' => array(
		'categories'	=> array( 'bus', 'one', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'fashion' => array(
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7' ),
	),
	'disco' => array(
		'categories'	=> array( 'ent', 'cre', 'one' ),
	),
	'fix' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'bar' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'bar.zip', 'bar-content.zip' ),
	),
	'coffee' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'finance' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'cleaner' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'itservice' => array(
		'name'	=> 'IT Service',
		'categories'	=> array( 'bus', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'jeweler' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'records' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'politics' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'rev' ),
	),
	'pole' => array(
		'categories'	=> array( 'ent', 'cre', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'energy' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'launch' => array(
		'categories'	=> array( 'one', 'oth' ),
		'plugins'		=> array( 'mch' ),
	),
	'tattoo' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'tattoo.zip', 'tattoo-content.zip' ),
	),
	'yoga' => array(
		'categories'	=> array( 'bus', 'ent', 'one' ),
		'plugins'		=> array( 'mch', 'rev' ),
	),
	'insurance' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'driving' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'party' => array(
		'categories'	=> array( 'ent', 'cre', 'one', 'oth' ),
		'plugins'		=> array( 'mch', 'rev' ),
	),
	'vision' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7' ),
	),
	'model' => array(
		'categories'	=> array( 'ent', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'pr' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'pr.zip', 'pr-content.zip' ),
	),
	'baker' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'language' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'security' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'security.zip', 'security-content.zip' ),
	),
	'furniture' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'museum' => array(
		'categories'	=> array( 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'architect' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'electric' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'vet' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'loans' => array(
		'categories'	=> array( 'bus', 'one', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'charity' => array(
		'categories'	=> array( 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'sitter' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'moving' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'fit' => array(
		'categories'	=> array( 'ent', 'one' ),
		'plugins'		=> array( 'rev' ),
	),
	'barber' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'rev' ),
	),
	'book' => array(
		'categories'	=> array( 'ent', 'oth' ),
		'plugins'		=> array( 'cf7' ),
	),
	'plumber' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'dj' => array(
		'name'	=> 'DJ',
		'categories'	=> array( 'ent', 'cre', 'one' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'sketch' => array(
		'categories'	=> array( 'cre', 'one' ),
	),
	'bw' => array(
		'name'	=> 'B&W',
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'tourist' => array(
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'art' => array(
		'categories'	=> array( 'cre', 'one' ),
	),
	'interior' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'webmaster' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'app' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'seo' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'pizza' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'event' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'developer' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'carrental' => array(
		'name' 	=> 'Car Rental',
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'band' => array(
		'categories'	=> array( 'cre', 'one' ),
	),
	'university' => array(
		'categories'	=> array( 'bus', 'ent', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'spa' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
		'revslider'		=> array( 'spa.zip', 'spa-content.zip' ),
	),
	'press' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'rev' ),
	),
	'gym' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7' ),
	),
	'design' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'marketing' => array(
		'categories'	=> array( 'bus', 'ent', 'cre', 'one' ),
	),
	'hosting' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'travel' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'agency' => array(
		'categories'	=> array( 'bus', 'cre' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'estate' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'beauty' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'blogger' => array(
		'name'	=> 'Blogger 960px',
		'categories'	=> array( 'ent', 'cre', 'blo' ),
		'plugins'		=> array( 'rev' ),
	),
	'business' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'church' => array(
		'categories'	=> array( 'blo', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'creative' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7' ),
	),
	'hotel' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'landing' => array(
		'name'	=> 'Landing Page',
		'categories'	=> array( 'cre', 'one', 'oth' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'lawyer' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'mechanic' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'medic' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'onepage' => array(
		'name' 	=> 'One Page',
		'categories'	=> array( 'cre', 'one' ),
		'plugins'		=> array( 'rev' ),
		'revslider'		=> array( 'onepage.zip', 'onepage-content.zip' ),
	),
	'parallax' => array(
		'categories'	=> array( 'cre', 'por', 'one' ),
	),
	'photo' => array(
		'categories'	=> array( 'bus', 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'portfolio' => array(
		'categories'	=> array( 'cre', 'por' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'renovate' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'restaurant' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'resume' => array(
		'categories'	=> array( 'cre', 'por', 'one' ),
		'plugins'		=> array( 'cf7' ),
	),
	'school' => array(
		'categories'	=> array( 'bus', 'blo' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'shop' => array(
		'categories'	=> array( 'bus', 'sho' ),
		'plugins'		=> array( 'cf7', 'rev', 'woo' ),
	),
	'transport' => array(
		'categories'	=> array( 'bus' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'wedding' => array(
		'categories'	=> array( 'bus', 'ent' ),
		'plugins'		=> array( 'cf7', 'rev' ),
	),
	'splash-classic' => array(
		'name'				=> 'Splash classic',
		'categories'	=> array(),
		'plugins'			=> array( 'rev' ),
	),
);
