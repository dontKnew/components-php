<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers' );
$routes->setDefaultController('HomeController' );
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

    $routes->get('/', 'HomeController::index', ["as"=>"home"]);
    $routes->get('blog', 'BlogController::index', ["as"=>"blog"]);
    $routes->get('(:any)', 'BlogController::viewPost', ["as"=>"blog_type/blog_name"]);

    $routes->group('admin', function ($route) {
        /*dashboard*/
        $route->get('dashboard', 'Admin\DashboardController::index', ["as"=>"admin/dashboard", "filter"=>"admin"]);
        /*admin profile*/
        $route->get('register', 'Admin\AuthController::register', ["as"=>"admin/register"]);
        $route->post('login', 'Admin\AuthController::login', ["as"=>"admin/login"]);
        $route->get('login', 'Admin\AuthController::index', ["as"=>"admin/login"]);

        $route->get('profile', 'Admin\AuthController::profile', ["as"=>"admin/profile", "filter"=>"admin"]);
        $route->post('profile/update', 'Admin\AuthController::updateProfile', ["as"=>"admin/profile/update", "filter"=>"admin"]);

        $route->match(['post', 'get'],'change-password', 'Admin\AuthController::changePassword' , ["as"=>"admin/change-password", "filter"=>"admin"]);
        $route->get('logout', 'Admin\AuthController::logout', ["as"=>"admin/logout"]);

        /*post-blog*/
        $route->match( (['post','get']), 'post-blog', 'Admin\PostBlogController::index', ["as"=>"admin/post-blog","filter"=>"admin"]);
        $route->match(['post','get'],'post-blog/add', 'Admin\PostBlogController::add', ["as"=>"admin/post-blog/add","filter"=>"admin"]);
        $route->match(['get'],'post-blog/edit/(:num)', 'Admin\PostBlogController::edit/$1' , ["as"=>"admin/post-blog/edit", "filter"=>"admin"]);
        $route->match(['get'],'post-blog/copy/(:num)', 'Admin\PostBlogController::copy/$1' , ["as"=>"admin/post-blog/copy", "filter"=>"admin"]);
        $route->match(['post'],'post-blog/update', 'Admin\PostBlogController::update', ["as"=>"admin/post-blog/update", "filter"=>"admin"]);
        $route->get('post-blog/delete/(:num)', 'Admin\PostBlogController::delete/$1' , ["as"=>"admin/post-blog/delete", "filter"=>"admin"]);

        /*post-category*/
        $route->match( (['post','get']), 'post-category', 'Admin\PostCategoryController::index', ["as"=>"admin/post-category","filter"=>"admin"]);
        $route->match(['post','get'],'post-category/add', 'Admin\PostCategoryController::add', ["as"=>"admin/post-category/add","filter"=>"admin"]);
        $route->match(['get'],'post-category/edit/(:num)', 'Admin\PostCategoryController::edit/$1' , ["as"=>"admin/post-category/edit", "filter"=>"admin"]);
        $route->match(['post'],'post-category/update', 'Admin\PostCategoryController::update', ["as"=>"admin/post-category/update", "filter"=>"admin"]);
        $route->get('post-category/delete/(:num)', 'Admin\PostCategoryController::delete/$1' , ["as"=>"admin/post-category/delete", "filter"=>"admin"]);

        $route->get('admin-activity', "Admin\LogViewerController::index");
        $route->get('developer-logs', "Admin\LogViewerController::developer");
    });

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
