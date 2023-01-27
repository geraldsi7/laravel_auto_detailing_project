<?php

use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TasksController;

use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\BudgetController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GalleryController;
use App\Models\{Menu, User, Category, Subcategory, Services, Rating, Order};
use Illuminate\Routing\RouteRegistrar;

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

Route::get('/', function () {
	$galleries = Gallery::latest()->get();
	
	return view('welcome', compact('galleries'));
})->name('welcome');



// guest group middleware


// end of guest group middleware



Auth::routes();


// category routes

/* Route::get('/category', [App\Http\Controllers\SubcategoryController::class, 'index'])->name('category.index');
*/

Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');

// end of category routes


// items routes

Route::get('/category/{category}/{item}/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');

Route::get('/search', [App\Http\Controllers\ItemController::class, 'index'])->name('item.search');

//end of item routes

Route::middleware(['auth','admin.access'])->group(function () {
	
	


	Route::get('/items/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');

	Route::post('/items/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');

	Route::get('items/{items}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');

	Route::get('items/{items}/review', [App\Http\Controllers\MenuController::class, 'review'])->name('menu.review');

	Route::put('items/{items}/info-update', [App\Http\Controllers\MenuController::class, 'updateMenuInfo'])->name('menu.info.update');

	Route::put('items/{items}/image-update', [App\Http\Controllers\MenuController::class, 'updateMenuImage'])->name('menu.image.update');

	Route::put('items/{items}/update', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');

	Route::get('items/{items}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');

	Route::get('items/{items}/remove-image', [App\Http\Controllers\MenuController::class, 'removeImage'])->name('menu.destroy.image');

	Route::get('items/delete-all', [App\Http\Controllers\MenuController::class, 'destroyAll'])->name('menu.destroy.all');

/*	Route::get('categories/{titles}/edit', [App\Http\Controllers\TitleController::class, 'edit'])->name('title.edit');

	Route::put('categories/{titles}/update', [App\Http\Controllers\TitleController::class, 'update'])->name('title.update');

	Route::get('categories/{titles}/delete', [App\Http\Controllers\TitleController::class, 'destroy'])->name('title.destroy');

	Route::get('categories/delete-all', [App\Http\Controllers\TitleController::class, 'destroyAll'])->name('title.destroy.all');

	Route::get('/subcategories', [App\Http\Controllers\SubcategoryController::class, 'manage'])->name('subcategory.manage.index');

	Route::get('/subcategories/create', [App\Http\Controllers\SubcategoryController::class, 'create'])->name('subcategory.manage.create');

	Route::get('/get-subcategory-list', [App\Http\Controllers\SubcategoryController::class, 'getSubcategoryList']);

	Route::post('/subcategories/store', [App\Http\Controllers\SubcategoryController::class, 'store'])->name('subcategory.manage.store');

	Route::get('subcategories/{subcategories}/edit', [App\Http\Controllers\SubcategoryController::class, 'edit'])->name('subcategory.manage.edit');

	Route::put('subcategories/{subcategories}/update', [App\Http\Controllers\SubcategoryController::class, 'update'])->name('subcategory.manage.update');

	Route::get('subcategories/{titles}/delete', [App\Http\Controllers\SubcategoryController::class, 'destroy'])->name('subcategory.manage.destroy');

	Route::get('subcategories/delete-all', [App\Http\Controllers\SubcategoryController::class, 'destroyAll'])->name('subcategory.manage.destroy.all');

*/
	Route::get('manage-gallery', [GalleryController::class, 'index'])->name('manage.gallery.index');

	Route::get('manage-gallery/create', [GalleryController::class, 'create'])->name('gallery.create');

	Route::get('manage-gallery/fetch', [GalleryController::class, 'fetch'])->name('gallery.fetch');

	Route::post('manage-gallery/store', [GalleryController::class, 'store'])->name('gallery.store');

	Route::put('manage-gallery/{gallery}/update', [GalleryController::class, 'update'])->name('gallery.update');

	Route::post('manage-gallery/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

// cart routes

Route::get('cart', [App\Http\Controllers\OrderController::class, 'index'])->name('cart.index');

Route::post('cart/store', [App\Http\Controllers\OrderController::class, 'store'])->name('cart.store');

Route::post('cart/qty/update', [App\Http\Controllers\OrderController::class, 'cartQtyUpdate'])->name('cart.qty.update');

Route::post('/cart/actions', [App\Http\Controllers\OrderController::class, 'cartActions'])->name('cart.actions');
//end of cart routes

// wishlist routes

Route::get('wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('wishlist.index');

Route::post('wishlist/store', [App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');

Route::post('/wishlist/actions', [App\Http\Controllers\WishlistController::class, 'actions'])->name('wishlist.actions');

// end of wishlist routes


Route::any('checkout', [App\Http\Controllers\OrderController::class, 'show'])->name('cart.show')->middleware(['auth','check.access']);

Route::any('verify-payment', [App\Http\Controllers\OrderController::class, 'verifyPayment'])->name('verify.payment')->middleware(['auth','check.access']);

Route::post('checkout', [App\Http\Controllers\OrderController::class, 'update'])->name('cart.checkout')->middleware(['auth','check.access']);

Route::get('/my-orders', [App\Http\Controllers\OrderController::class, 'history'])->name('cart.history');


// dashboard orders routes
Route::get('/orders', [TasksController::class, 'index'])->name('tasks.index');

Route::get('/orders/fetch', [TasksController::class, 'fetch'])->name('tasks.fetch');

Route::post('/orders/actions', [TasksController::class, 'orderActions'])->name('tasks.actions');

// end of dashboard orders route

// budget routes

Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');

Route::post('/budgets/store', [BudgetController::class, 'store'])->name('budgets.store');

Route::post('/budgets/validates', [BudgetController::class, 'validates'])->name('budgets.validates');

Route::get('/budgets/fetch', [BudgetController::class, 'fetch'])->name('budgets.fetch');

Route::get('/budgets/print', [BudgetController::class, 'generateBudgetPDF'])->name('budgets.print');

// end of budget routes

// manage categories routes

Route::get('/manage/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.manage.index');

Route::get('/manage/category/fetch', [App\Http\Controllers\CategoryController::class, 'fetch'])->name('category.manage.fetch');

Route::get('/manage/category/fetch/form', [App\Http\Controllers\CategoryController::class, 'fetchForm'])->name('category.manage.form');

Route::post('/manage/category/actions', [App\Http\Controllers\CategoryController::class, 'actions'])->name('category.manage.actions');

Route::post('/manage/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.manage.store');

Route::put('/manage/category/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.manage.update');

Route::post('/manage/category/validates', [App\Http\Controllers\CategoryController::class, 'validates'])->name('category.manage.validates');

// end of manage categories routes

// manage items routes

Route::get('/manage/item', [App\Http\Controllers\ServicesController::class, 'index'])->name('item.manage.index');

Route::get('/manage/item/fetch', [App\Http\Controllers\ServicesController::class, 'fetch'])->name('manage.item.fetch');

Route::post('/manage/item/actions', [App\Http\Controllers\ServicesController::class, 'actions'])->name('manage.item.actions');

Route::get('/manage/item/fetch/form', [App\Http\Controllers\ServicesController::class, 'fetchForm'])->name('item.manage.form');

Route::post('/manage/item/store', [App\Http\Controllers\ServicesController::class, 'store'])->name('item.manage.store');

Route::post('/manage/item/store/image', [App\Http\Controllers\ServicesController::class, 'storeImage'])->name('item.manage.store.image');

Route::put('/manage/item/{item}/update', [App\Http\Controllers\ServicesController::class, 'update'])->name('item.manage.update');

Route::post('/manage/item/remove/image', [App\Http\Controllers\ServicesController::class, 'removeItemImage'])->name('item.manage.remove.image');

Route::post('/manage/item/validates', [App\Http\Controllers\ServicesController::class, 'validates'])->name('item.manage.validates');

// end of manage items routes

// manage customers routes

Route::get('customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');

Route::get('/customers/fetch', [App\Http\Controllers\CustomerController::class, 'fetch'])->name('customers.fetch');

Route::post('/customers/actions', [App\Http\Controllers\CustomerController::class, 'actions'])->name('customers.actions');

Route::get('/customers/fetch/form', [App\Http\Controllers\CustomerController::class, 'fetchForm'])->name('customers.form');

Route::post('/customers/validates', [App\Http\Controllers\CustomerController::class, 'validates'])->name('customers.validates');


//end of manage customers routes

/*

Route::resource('invoice', InvoiceController::class);


Route::get('/staff', [AdminController::class, 'index'])->name('users.index');

Route::get('/staff/create', [AdminController::class, 'create'])->name('users.create');

Route::post('/users', [AdminController::class, 'store'])->name('users.store');

Route::get('/staff/{users}/edit', [AdminController::class, 'edit'])->name('users.edit');

Route::put('/staff/{users}/update', [AdminController::class, 'update'])->name('users.update');

Route::get('/staff/{users}/remove', [AdminController::class, 'destroy'])->name('users.destroy');

Route::get('/staff/remove-all', [AdminController::class, 'destroyAll'])->name('users.destroy.all');

*/

Route::get('/about-us', [App\Http\Controllers\ContactController::class, 'index'])->name('about.index');

Route::get('/gallery', [App\Http\Controllers\ContactController::class, 'gallery'])->name('gallery.index');

Route::get('/testimonials', [App\Http\Controllers\ContactController::class, 'testimonials'])->name('testimonials.index');

Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact.index');

Route::get('/detailing-services', [App\Http\Controllers\ContactController::class, 'services'])->name('services.index');

Route::post('/mail', [App\Http\Controllers\ContactController::class, 'send'])->name('mail.send');


Route::group(['middleware' => 'auth'], function () {

// dashboard route
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	//end of dashboard route

// review route
	Route::post('review', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

	Route::post('review/destroy', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.destroy');
// end of review route
	
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

