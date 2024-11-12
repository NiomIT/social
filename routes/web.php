<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\PollController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\CountdownController;
use App\Http\Controllers\VoteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
// routes/web.php

Route::get('/get-countdown-time', [CountdownController::class, 'getCountdownTime']);

Route::get('/add-post', [PostController::class, 'addPost'])->name('post.add');

Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

Route::get('subcategory/category-subcategory/ajax/{category_id}',[PostController::class,'getsubcategory'])->name('subcategory.post.ajax');


Route::get('/', function () {
    return view('frontend.index');
});


Route::post('/user-post-store', [PostController::class, 'userPostStore'])->name('user.post.store');

Route::post('/{poll}{id}/vote', [PollController::class,'vote'])->name('poll.vote');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::get('/user/profile/edit', [UserController::class, 'UserPrifileEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserchangePassword'])->name('user.change.password');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
}); // Group Middleware End

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // ==================== Admin Brand All Routes ===================//

Route::prefix('brand')->group(function(){
    Route::get('/index', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('/view/{id}', [BrandController::class, 'view'])->name('brand.view');
    Route::post('/update/{id}',[BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/brand_active/{id}', [BrandController::class, 'active'])->name('brand.active');
    Route::get('/brand_inactive/{id}', [BrandController::class, 'inactive'])->name('brand.in_active');
});
    // ==================== Post All Routes ===================//
    Route::prefix('post')->group(function(){
        Route::get('/index', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::get('/view/{id}', [PostController::class, 'view'])->name('post.view');
        Route::post('/update/{id}',[PostController::class, 'update'])->name('post.update');

        Route::get('/trash', [PostController::class, 'trash'])->name('post.trash');
        Route::get('/copy/{id}', [PostController::class, 'copy'])->name('post.copy');
        Route::get('/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
        Route::get('/kill/{id}', [PostController::class, 'kill'])->name('post.kill');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('/post_active/{id}', [PostController::class, 'active'])->name('post.active');
        Route::get('/post_inactive/{id}', [PostController::class, 'inactive'])->name('post.in_active');

        // post archive
        Route::get('/post/archive', [PostController::class, 'archive'])->name('post.archive');

        Route::post('/post', [PostController::class, 'showDateWisePosts'])->name('posts.showDateWise');

        /* ================  Category & Subcategory With Ajax ================== */






    });
              // ==================== Advertisement All Routes ===================//
    Route::group(['prefix'=>'advertisement'], function(){
        Route::get('/index', [AdvertisementController::class, 'index'])->name('advertisement.index');
        Route::get('/create', [AdvertisementController::class, 'create'])->name('advertisement.create');
        Route::post('/store', [AdvertisementController::class, 'store'])->name('advertisement.store');
        Route::get('/edit/{id}', [AdvertisementController::class, 'edit'])->name('advertisement.edit');
        Route::post('/update/{id}', [AdvertisementController::class, 'update'])->name('advertisement.update');
        Route::get('/destroy/{id}', [AdvertisementController::class, 'delete'])->name('advertisement.delete');
        Route::get('/advertisement-active/{id}', [AdvertisementController::class, 'active'])->name('advertisement.active');
        Route::get('/advertisement-inactive/{id}', [AdvertisementController::class, 'inactive'])->name('advertisement.in_active');

    });

    // ==================== Admin Event All Routes ===================//
    Route::prefix('event')->group(function () {
        Route::get('/index', [EventController::class, 'index'])->name('event.index');
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/store', [EventController::class, 'store'])->name('event.store');
        Route::get('/view/{id}', [EventController::class, 'view'])->name('event.view');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
        Route::post('/update/{id}', [EventController::class, 'update'])->name('event.update');
        Route::get('/delete/{id}', [EventController::class, 'delete'])->name('event.delete');
        Route::get('/event_active/{id}', [EventController::class, 'active'])->name('event.active');
        Route::get('/event_inactive/{id}', [EventController::class, 'inactive'])->name('event.in_active');
    });

      // ==================== Admin poll All Routes ===================//
      Route::prefix('poll')->group(function () {
        Route::get('/index', [PollController::class, 'index'])->name('poll.index');
        Route::get('/create', [PollController::class, 'create'])->name('poll.create');
        Route::post('/store', [PollController::class, 'store'])->name('poll.store');
        Route::get('/view/{id}', [PollController::class, 'view'])->name('poll.view');
        Route::get('/edit/{id}', [PollController::class, 'edit'])->name('poll.edit');
        Route::post('/update/{id}', [PollController::class, 'update'])->name('poll.update');
        Route::get('/delete/{id}', [PollController::class, 'delete'])->name('poll.delete');
        Route::get('/poll_active/{id}', [PollController::class, 'active'])->name('poll.active');
        Route::get('/poll_inactive/{id}', [PollController::class, 'inactive'])->name('poll.in_active');

    });

    // ==================== Admin Category All Routes ===================//
    Route::prefix('category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/view/{id}', [CategoryController::class, 'view'])->name('category.view');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/category_active/{id}', [CategoryController::class, 'active'])->name('category.active');
        Route::get('/category_inactive/{id}', [CategoryController::class, 'inactive'])->name('category.in_active');
    });


    // ==================== Admin SubCategory All Routes ===================//
    Route::prefix('subcategory')->group(function () {
        Route::get('/index', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/view/{id}', [SubCategoryController::class, 'view'])->name('subcategory.view');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/subcategory_active/{id}', [SubCategoryController::class, 'active'])->name('subcategory.active');
        Route::get('/subcategory_inactive/{id}', [SubCategoryController::class, 'inactive'])->name('subcategory.in_active');

    });






     // Product All Route
     Route::controller(SettingController::class)->group(function () {
        Route::get('/general/setting/', 'generalSetting')->name('general.setting');
        Route::post('/general/setting/update/', 'generalSettingUpdate')->name('general.setting.update');

    });


});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login');

// ======= All Vendor Route=========
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');

    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');
});


/*================== Multi Language All Routes =================*/
Route::get('/language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


Route::get('/post/details/{post_slug}', [FrontendController::class, 'singlePost'])->name('details.post');
Route::get('/post/{slug}', [FrontendController::class, 'categoryPost'])->name('category.post');
Route::get('/post/sub/{slug}', [FrontendController::class, 'subcategoryPost'])->name('subcategory.post');
Route::get('/post/subcat/{slug}', [FrontendController::class, 'subsubcategoryPost'])->name('subsubcategory.post');
Route::get('/post/wserwise/{id}', [FrontendController::class, 'userWisePost'])->name('userWise.post');

 // Search Post
Route::post('/search/post/', [FrontendController::class, 'searchPost'])->name('post.search');

// Frontend Product Tags Page
Route::get('/post/tag/{tag}', [FrontendController::class, 'TagWisePost']);
Route::get('featured/news', [FrontendController::class, 'FeaturedNews'])->name('featured.news');
Route::get('hot/news', [FrontendController::class, 'HotNews'])->name('hot.news');
Route::get('trending/news', [FrontendController::class, 'TrendingNews'])->name('trending.news');


Route::middleware('auth')->group(function () {

    Route::post('/polls/{poll}/vote', [VoteController::class, 'vote'])->name('polls.vote');
});


