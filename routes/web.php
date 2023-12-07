<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CategoryController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ApplyLoanController;
use App\Http\Controllers\admin\RevenueController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\HospitalController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\EnqueryController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\SubCategoryController;

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\WebPageController;
use App\Http\Controllers\frontend\SpecialitiesController as WebSpecialitiesController;
use App\Http\Controllers\frontend\HospitalController as WebHospitalController;
use App\Http\Controllers\frontend\DoctorController as WebDoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//admin routes

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [WebPageController::class, 'about'])->name('about');
Route::get('/doctors', [WebDoctorController::class, 'doctor'])->name('web_doctor');
Route::get('/doctor/{id}', [WebDoctorController::class, 'doctor_detail']);
Route::get('/hospitals', [WebHospitalController::class, 'hospital'])->name('web_hospital');
Route::get('/hospital/{id}', [WebHospitalController::class, 'hospital_detail']);
Route::get('/specialities', [WebSpecialitiesController::class, 'specialities'])->name('web_specialities');
Route::get('/Speciality/{id}', [WebSpecialitiesController::class, 'specialities_detail']);
Route::get('/contact-us', [WebPageController::class, 'contact'])->name('contact');
Route::get('/terms-condition', [WebPageController::class, 'terms_condition'])->name('terms_condition');
Route::get('/privacy-policy', [WebPageController::class, 'privacy_policy'])->name('privacy_policy');


Route::group(['middleware' => 'ifnotadmin'], function () {
    Route::get('/admin', [LoginController::class, 'index'])->name('adminlogin');
    Route::post('/admin/login-save', [LoginController::class, 'save'])->name('loginsave');
    Route::post('/admin/login-save_image', [LoginController::class, 'loginsaveimage'])->name('loginsaveimage');
});

Route::group(['prefix' => 'admin', 'middleware' => 'ifadmin'], function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('admin_dashboard');
    Route::get('/change-password', [LoginController::class, 'change_password'])->name('change_password');
    Route::post('/change-password/save', [LoginController::class, 'change_password_save'])->name('change_password_save');
    Route::get('/view-profile', [LoginController::class, 'view_profile'])->name('view_profile');
    Route::post('/update-profile', [LoginController::class, 'update_profile'])->name('update_profile');
    Route::get('/logout', [LoginController::class, 'logout'])->name('adminlogout');
    Route::get('/denied', [PermissionController::class, 'denied'])->name('denied');


    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting-save', [SettingController::class, 'save'])->name('setting_save');

    Route::get('/about_us', [PageController::class, 'about_us'])->name('admin_about_us');
    Route::post('/about_us-save', [PageController::class, 'about_us_save'])->name('about_us_save');

    /*---------------------Admin pages routes Start---------------------*/
    Route::get('/page/add/{id?}', [PageController::class, 'add'])->name('page_add');
    Route::post('/page/save/{id?}', [PageController::class, 'save'])->name('page_save');
    Route::get('/page', [PageController::class, 'index'])->name('page');
    Route::get('/page-data', [PageController::class, 'anydata'])->name('page_data');
    Route::get('/page/status', [PageController::class, 'changeStatus'])->name('page_status');
    /*-----------------------Admin pages routes End---------------------*/

    /*---------------------Admin Category routes Start---------------------*/
    Route::get('/specialities/add/{id?}', [CategoryController::class, 'add'])->name('category_add');
    Route::post('/specialities/save/{id?}', [CategoryController::class, 'save'])->name('category_save');
    Route::get('/specialities', [CategoryController::class, 'index'])->name('category');
    Route::any('/specialities-data', [CategoryController::class, 'anydata'])->name('category_data');
    Route::get('/specialities/delete', [CategoryController::class, 'delete'])->name('category_delete');
    Route::get('/specialities/status', [CategoryController::class, 'changeStatus'])->name('category_status');
    /*-----------------------Admin Category routes End---------------------*/

    /*---------------------Admin Sub Category routes Start---------------------*/
    Route::get('/sub-specialities/add/{id?}', [SubCategoryController::class, 'add'])->name('sub_category_add');
    Route::post('/sub-specialities/save/{id?}', [SubCategoryController::class, 'save'])->name('sub_category_save');
    Route::get('/sub-specialities', [SubCategoryController::class, 'index'])->name('sub_category');
    Route::any('/sub-specialities-data', [SubCategoryController::class, 'anydata'])->name('sub_category_data');
    Route::get('/sub-specialities/delete', [SubCategoryController::class, 'delete'])->name('sub_category_delete');
    Route::get('/sub-specialities/status', [SubCategoryController::class, 'changeStatus'])->name('sub_category_status');
    /*-----------------------Admin Sub Category routes End---------------------*/

    /*---------------------Admin faq routes Start---------------------*/
    Route::get('/faq/add/{id?}', [FaqController::class, 'add'])->name('faq_add');
    Route::post('/faq/save/{id?}', [FaqController::class, 'save'])->name('faq_save');
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
    Route::any('/faq-data', [FaqController::class, 'anydata'])->name('faq_data');
    Route::get('/faq/delete', [FaqController::class, 'delete'])->name('faq_delete');
    Route::get('/faq/status', [FaqController::class, 'changeStatus'])->name('faq_status');
    /*-----------------------Admin faq routes End---------------------*/

    /*---------------------Admin gallery routes Start---------------------*/
    Route::get('/gallery/add/{id?}', [GalleryController::class, 'add'])->name('gallery_add');
    Route::post('/gallery/save/{id?}', [GalleryController::class, 'save'])->name('gallery_save');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::any('/gallery-data', [GalleryController::class, 'anydata'])->name('gallery_data');
    Route::get('/gallery/delete', [GalleryController::class, 'delete'])->name('gallery_delete');
    Route::get('/gallery/status', [GalleryController::class, 'changeStatus'])->name('gallery_status');
    /*-----------------------Admin gallery routes End---------------------*/

    /*---------------------Admin City routes Start---------------------*/
    Route::get('/city/add/{id?}', [CityController::class, 'add'])->name('city_add');
    Route::post('/city/save/{id?}', [CityController::class, 'save'])->name('city_save');
    Route::get('/city', [CityController::class, 'index'])->name('city');
    Route::get('/city-data', [CityController::class, 'anydata'])->name('city_data');
    Route::get('/city/delete', [CityController::class, 'delete'])->name('city_delete');
    Route::get('/city/status', [CityController::class, 'changeStatus'])->name('city_status');
    /*-----------------------Admin City routes End---------------------*/


    /*---------------------Admin banner routes Start---------------------*/
    Route::get('/banner/add/{id?}', [BannerController::class, 'add'])->name('banner_add');
    Route::post('/banner/save/{id?}', [BannerController::class, 'save'])->name('banner_save');
    Route::get('/banner', [BannerController::class, 'index'])->name('banner');
    Route::any('/banner-data', [BannerController::class, 'anydata'])->name('banner_data');
    Route::get('/banner/delete', [BannerController::class, 'delete'])->name('banner_delete');
    Route::get('/banner/status', [BannerController::class, 'changeStatus'])->name('banner_status');
    /*-----------------------Admin banner routes End---------------------*/

    /*---------------------Admin doctor routes Start---------------------*/
    Route::get('/doctor/add/{id?}', [DoctorController::class, 'add'])->name('doctor_add');
    Route::post('/doctor/save/{id?}', [DoctorController::class, 'save'])->name('doctor_save');
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctor');
    Route::any('/doctor-data', [DoctorController::class, 'anydata'])->name('doctor_data');
    Route::get('/doctor/delete', [DoctorController::class, 'delete'])->name('doctor_delete');
    Route::get('/doctor/status', [DoctorController::class, 'changeStatus'])->name('doctor_status');
    /*-----------------------Admin banner routes End---------------------*/

    /*---------------------Admin hospital routes Start---------------------*/
    Route::get('/hospital/add/{id?}', [HospitalController::class, 'add'])->name('hospital_add');
    Route::post('/hospital/save/{id?}', [HospitalController::class, 'save'])->name('hospital_save');
    Route::get('/hospitals', [HospitalController::class, 'index'])->name('hospital');
    Route::any('/hospital-data', [HospitalController::class, 'anydata'])->name('hospital_data');
    Route::get('/hospital/delete', [HospitalController::class, 'delete'])->name('hospital_delete');
    Route::get('/hospital/status', [HospitalController::class, 'changeStatus'])->name('hospital_status');
    /*-----------------------Admin banner routes End---------------------*/

    /*---------------------Admin testimonial routes Start---------------------*/
    Route::get('/testimonial/add/{id?}', [TestimonialController::class, 'add'])->name('testimonial_add');
    Route::post('/testimonial/save/{id?}', [TestimonialController::class, 'save'])->name('testimonial_save');
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonial');
    Route::any('/testimonial-data', [TestimonialController::class, 'anydata'])->name('testimonial_data');
    Route::get('/testimonial/delete', [TestimonialController::class, 'delete'])->name('testimonial_delete');
    Route::get('/testimonial/status', [TestimonialController::class, 'changeStatus'])->name('testimonial_status');
    /*-----------------------Admin banner routes End---------------------*/



    /*---------------------Admin User routes Start---------------------*/
    Route::get('/user/add/{id?}', [UserController::class, 'add'])->name('user_add');
    Route::post('/user/save/{id?}', [UserController::class, 'save'])->name('user_save');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user-data', [UserController::class, 'anydata'])->name('user_data');
    Route::get('/user/delete', [UserController::class, 'delete'])->name('user_delete');
    Route::get('/user/status', [UserController::class, 'changeStatus'])->name('user_status');
    Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user_detail');
    Route::get('/user_delete_image', [UserController::class, 'user_delete_image'])->name('user_delete_image');
    /*-----------------------Admin User routes End---------------------*/


    Route::get('/contact-request', [EnqueryController::class, 'contact_request'])->name('contact_request');
    Route::any('/contact-data', [EnqueryController::class, 'contact_request_data'])->name('contact_data');

    Route::get('/hospital-request', [EnqueryController::class, 'hospital_request'])->name('hospital_request');
    Route::any('/hospital-request-data', [EnqueryController::class, 'hospital_request_data'])->name('hospital_request_data');

    Route::get('/doctor-request', [EnqueryController::class, 'doctor_request'])->name('doctor_request');
    Route::any('/doctor-request-data', [EnqueryController::class, 'doctor_request_data'])->name('doctor_request_data');

    Route::get('/specialities-request', [EnqueryController::class, 'specialities_request'])->name('specialities_request');
    Route::any('/specialities-request-data', [EnqueryController::class, 'specialities_request_data'])->name('specialities_request_data');

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.data');
    Route::any('/getRevenueData', [RevenueController::class, 'anydata'])->name('getRevenueData');
});
