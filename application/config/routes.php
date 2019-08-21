<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


# Admininstration Login
$route['admin'] = 'Admin_home';
$route['admin/login'] = 'Admin_login';
$route['admin/forgot'] = 'Admin_login/forgot';
$route['admin/recovery/(:any)'] = 'Admin_login/recovery/$1';
$route['admin/logout'] = 'Admin_login/logout';

# Admininstration Module
$route['admin/property'] = 'Admin_property/index';
$route['admin/profile'] = 'Admin_profile/index';
$route['admin/profile/activities'] = 'Admin_profile/activity';
$route['admin/users'] = 'Admin_user/index';
$route['admin/users/edit'] = 'Admin_user/edit';
$route['admin/users/new'] = 'Admin_user/edit';
$route['admin/languages'] = 'Admin_language/index';
$route['admin/languages/active'] = 'Admin_language/active';
$route['admin/languages/inactive'] = 'Admin_language/inactive';
$route['admin/activities'] = 'Admin_activity/index';

# Admininstration Category
$route['admin/category'] = 'Admin_category/index';
$route['admin/category/new'] = 'Admin_category/edit';
$route['admin/category/edit'] = 'Admin_category/edit';
$route['admin/category/(:any)/edit'] = 'Admin_category/edit_lang/$1';

# Admininstration Post
$route['admin/post'] = 'Admin_post/index';
$route['admin/post/new'] = 'Admin_post/addnew';
$route['admin/post/edit'] = 'Admin_post/edit';

# Administrator Page
$route['admin/page'] = 'Admin_page/index';
$route['admin/page/new'] = 'Admin_page/edit';
$route['admin/page/edit'] = 'Admin_page/edit';

# Admininstration File Upload
$route['admin/upload/image'] = 'Admin_upload/image';
$route['admin/upload/video'] = 'Admin_upload/video';
$route['admin/upload/loadimage'] = 'Admin_upload/loadimage';
$route['admin/upload/loadvideo'] = 'Admin_upload/loadvideo';
$route['admin/upload/viewvideo'] = 'Admin_upload/viewvideo';
$route['admin/upload/update'] = 'Admin_upload/update';

# Administrator Photo
$route['admin/media/image'] = 'Admin_media/image';
$route['admin/media/video'] = 'Admin_media/video';
$route['admin/media/edit'] = 'Admin_media/edit';

# Administrator Thumbnail
$route['admin/thumbnail/(:any)'] = 'Admin_thumbnail/index/$1';

# Administrator Member
$route['admin/member'] = 'Admin_member/index';
$route['admin/member/new'] = 'Admin_member/edit';
$route['admin/member/edit'] = 'Admin_member/edit';

# Adminstrator Payment Setting
$route['admin/payment-setting'] = 'Admin_payment_setting/index';
$route['admin/payment-setting/edit'] = 'Admin_payment_setting/edit';

# Administrator API Setting
$route['admin/api'] = 'Admin_api/index';
$route['admin/api/new'] = 'Admin_api/edit';
$route['admin/api/edit'] = 'Admin_api/edit';

# Administrator SEO
$route['admin/seo'] = 'Admin_seo/index';
$route['admin/seo/edit'] = 'Admin_seo/edit';
$route['admin/seo/new'] = 'Admin_seo/edit';

# Administrator Comment
$route['admin/comment'] = 'Admin_comment/index';
$route['admin/comment/info'] = 'Admin_comment/info';

# Administrator Currency
$route['admin/currency'] = 'Admin_currency/index';
$route['admin/currency/active'] = 'Admin_currency/active';
$route['admin/currency/inactive'] = 'Admin_currency/inactive';
$route['admin/currency/update'] = 'Admin_currency/update';

# Administrator Widget
$route['admin/widget/(:any)'] = 'Admin_widget/index/$1';
$route['admin/widget/(:any)/new'] = 'Admin_widget/edit/$1';
$route['admin/widget/(:any)/edit'] = 'Admin_widget/edit/$1';

# Administrator Slide
$route['admin/slide'] = 'Admin_slide/index';
$route['admin/slide/new'] = 'Admin_slide/edit';
$route['admin/slide/edit'] = 'Admin_slide/edit';

# Administrator Destination
$route['admin/destination'] = 'Admin_destination/index';
$route['admin/destination/new'] = 'Admin_destination/addnew';
$route['admin/destination/edit'] = 'Admin_destination/edit';

# Administrator Area
$route['admin/area'] = 'Admin_area/index';
$route['admin/area/new'] = 'Admin_area/edit';
$route['admin/area/edit'] = 'Admin_area/edit';

# Administrator Period
$route['admin/period'] = 'Admin_period/index';
$route['admin/period/edit'] = 'Admin_period/edit';
$route['admin/period/new'] = 'Admin_period/edit';

# Administrator Transfer
$route['admin/transfer/car'] = 'Admin_transfer/car';
$route['admin/transfer/car/edit'] = 'Admin_transfer/car_edit';
$route['admin/transfer/car/new'] = 'Admin_transfer/car_edit';
$route['admin/transfer/service'] = 'Admin_transfer/service';
$route['admin/transfer/price'] = 'Admin_transfer/price';

# Administrator Tours
$route['admin/tour'] = 'Admin_tour/index';
$route['admin/tour/edit'] = 'Admin_tour/edit';
$route['admin/tour/new'] = 'Admin_tour/add';

# Administrator Payment
$route['admin/payment'] = 'Admin_payment/index';
$route['admin/payment/info'] = 'Admin_payment/info';

# Administrator Newsletter
$route['admin/newsletter'] = 'Admin_newsletter/index';
$route['admin/newsletter/export'] = 'Admin_newsletter/export';

# Administrator Term
$route['admin/term'] = 'Admin_term/index';
$route['admin/term/new'] = 'Admin_term/edit';
$route['admin/term/edit'] = 'Admin_term/edit';

# Administrator Featured
$route['admin/featured'] = 'Admin_featured/index';

# Image resizer
$route['images/(:any)/(:any)'] = 'Image_resizer/index/$1/$2';
$route['thumbnail/(:any)/(:any)'] = 'Image_resizer/slide/$1/$2';

# Webiste
$route['default_controller'] = 'Web_welcome';

$route['transfer'] = 'Web_transfer/index';
$route['transfer/destination'] = 'Web_transfer/destination';
$route['transfer/pickup'] = 'Web_transfer/area_1';
$route['transfer/dropoff'] = 'Web_transfer/area_2';
$route['transfer/rate'] = 'Web_transfer/rate';
$route['transfer/addcart'] = 'Web_transfer/addcart';

$route['tours/addcart'] = 'Web_tour/addcart';
$route['tours/checkrate'] = 'Web_tour/checkrate';
$route['tours/(:any)'] = 'Web_tour/index/$1';
$route['tours/(:any)/(:any)'] = 'Web_tour/info/$1/$2';
$route['checkout/(:any)'] = 'Web_checkout/index/$1';
$route['thankyou']= 'Web_thankyou/index';

$route['travelguide'] = 'Web_travelguide/index';
$route['travelguide/(:any)'] = 'Web_travelguide/info/$1';

$route['signin'] = 'Web_signin';
$route['signout'] = 'Web_signout';
$route['register'] = 'Web_register';
$route['profile'] = 'Web_profile';
$route['profile/booking'] = 'Web_profile/booking';
$route['profile/booking/info'] = 'Web_profile/booking_info';
$route['profile/setting'] = 'Web_profile/setting';
$route['forgotpassword'] = 'Web_forgot';
$route['contactus'] = 'Web_contact'; 
$route['cart'] = 'Web_cart/index';
$route['cart/delete'] = 'Web_cart/delete';
$route['paypal/ipn'] = 'Web_paypal/ipn';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
