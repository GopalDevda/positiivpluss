<?php



namespace Config;



// Create a new instance of our RouteCollection class.

$routes = Services::routes();




// can override as needed.

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {

	require SYSTEMPATH . 'Config/Routes.php';
}



/**

 * --------------------------------------------------------------------

 * Router Setup

 * --------------------------------------------------------------------

 */

$routes->setDefaultNamespace('App\Controllers');

$routes->setDefaultController('Home');
$routes->setDefaultController('Sensor');
$routes->setDefaultController('Governance');
$routes->setDefaultController('SocialController');
$routes->setDefaultController('Environment');
$routes->setDefaultController('Automotion');
$routes->setDefaultController('Suppliers_Model');
$routes->setDefaultController('Supplier');
$routes->setDefaultController('Blog');
$routes->setDefaultController('Qualitative_assessment');
$routes->setDefaultController('MarketPlace');

//$routes->setDefaultModal('Universal');

$routes->setDefaultMethod('index');

$routes->setTranslateURIDashes(false);

$routes->set404Override();

$routes->setAutoRoute(true);



/*

 * --------------------------------------------------------------------

 * Route Definitions

 * --------------------------------------------------------------------

 */



// We get a performance increase by specifying the default

// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

// Front Route Set

// $routes->get('/home/signup', 'Home::signup');
$routes->get('/step1/(:num)', 'StepController::index/$1');
$routes->get('/step2/(:num)/(:num)', 'StepController::step1/$1/$2');
$routes->get('/step3/(:num)/(:num)', 'StepController::step2/$1/$2');
$routes->get('/step4/(:num)/(:num)', 'StepController::step3/$1/$2');
$routes->get('/step5/(:num)/(:num)', 'StepController::step4/$1/$2');
$routes->get('/governance_view/(:num)', 'Governance::governance/$1');
$routes->get('/social_indicator_view/(:num)', 'SocialController::social/$1');
$routes->get('/environment_indicator_view/(:num)', 'Environment::environment/$1');
$routes->get('/environmentt_indicatort_vieww/(:num)', 'Environment::environmentt/$1');
$routes->get('/environment_indicator_view/(:num)', 'Environment::standard/$1');
$routes->add('/environment_indicator_demo', 'Environment::environment_demo');
$routes->get('/new_page/(:num)', 'Automotion::new/$1');
// $routes->get('/financial/(:num)', 'Automotion::financial/$1');
//$routes->add('/signup', 'Home::signup');

$routes->add('/login', 'Home::login');
$routes->add('/Qualitative-assessment', 'Qualitative_assessment::assessment');
$routes->add('assessment-question/(:num)/(:num)', 'Qualitative_assessment::start_assessment/$1/$2');

$routes->add('/automation_cron', 'Automotion::automation_cron');
$routes->add('/positiveMark', 'Home::positivemark');
$routes->add('/Suppliers_Model', 'Suppliers_Model::index');
$routes->add('/admin_new', 'Automotion::Admin_pa');
$routes->add('/dashboard', 'Supplier::index');
$routes->add('/company_profile', 'Supplier::complete_profile');
$routes->add('/market_place', 'MarketPlace::index');
$routes->add('/company_document', 'Supplier::document');
$routes->add('/Plan', 'Home::plans');
$routes->add('/guides', 'Blog::guides');
$routes->add('/glossary', 'Blog::glossary');
$routes->add('/view_content/(:num)', 'Blog::guides_view/$1');

$routes->add('/Insight', 'Home::insights');

$routes->add('/aboutUs', 'Home::abouts');

$routes->add('/contactus', 'Home::contactus');

$routes->add('/forgotPassword', 'Home::forgotPassword');

$routes->add('/FAQ', 'Home::faq');

$routes->add('/TermsCondtions', 'Home::termscondtions');

$routes->add('/PrivacyPolicy', 'Home::privacypolicy');
$routes->add('/Sensor/admin_view', 'Sensor::indexx');
$routes->add('/sensor', 'Sensor::index');
$routes->add('/weather', 'Sensor::weather');
$routes->get('/view_weather_data/(:num)', 'Sensor::api/$1');
$routes->add('/view_weather_auto', 'Sensor::api_auto');


// $routes->add('/login', 'Home::user_login');

$routes->post('/add-blog', 'Blog::addBlogSub');

// $routes->add('/inquiry', 'Home::addinquiry');

// Brands Routes

/*

 * --------------------------------------------------------------------

 * Additional Routing

 * --------------------------------------------------------------------

 *

 * There will often be times that you need additional routing and you

 * need it to be able to override any defaults in this file. Environment

 * based routes is one such time. require() additional route files here

 * to make that happen.

 *

 * You will have access to the $routes object within that file without

 * needing to reload it.

 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {

	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
