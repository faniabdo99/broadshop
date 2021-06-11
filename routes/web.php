<?php
use Illuminate\Support\Facades\Route;
Route::get('/' , 'PageController@getSoon')->name('soon');
Route::get('/home' , 'PageController@getIndex')->name('home');
Route::get('/contact' , 'ContactController@getContact')->name('contactUs');
Route::post('/contact' , 'ContactController@postContact')->name('contactUs.post'); 
Route::get('/about' , 'PageController@getAbout')->name('about');
Route::get('/terms-and-conditions' , 'PageController@getToc')->name('toc');
//Add middleware here to guest only
Route::middleware('guest')->group(function () {
    Route::get('signup' , 'UserController@getSignup')->name('user.getSignup');
    Route::post('signup' , 'UserController@postSignup')->name('user.postSignup');
    Route::get('signin' , 'UserController@getSignin')->name('user.getSignin');
    Route::post('signin' , 'UserController@postSignin')->name('user.postSignin');
    Route::get('reset-password' , 'UserController@getResetPage')->name('user.getReset');
    Route::post('reset-password' , 'UserController@postResetPage')->name('user.postReset');
    Route::get('choose-password/{email}/{code}' , 'UserController@getChoosePasswordPage')->name('user.getChoosePassword');
    Route::post('choose-password/' , 'UserController@postChoosePasswordPage')->name('reset.postChoosePassword');
    Route::get('activate/{code}/{email}' , 'UserController@activate')->name('user.activate');
    //Social Signup System
    Route::get('social-login/{provider}' , 'UserController@redirectToProvider')->name('login.social');
    Route::get('login/{driver}/callback' , 'UserController@handleProviderCallback')->name('login.social.callback');
});
Route::middleware('auth')->group(function () {
    Route::get('profile' , 'UserController@getProfile')->name('user.getProfile');
    Route::get('orders' , 'UserController@getOrders')->name('user.getOrders');
    Route::get('profile/edit' , 'UserController@getEditProfile')->name('user.getEditProfile');
    Route::post('profile/edit' , 'UserController@postEditProfile')->name('user.postEditProfile');
    Route::get('profile/update-password' , 'UserController@getEditPassword')->name('user.getEditPassword');
    Route::post('profile/update-password' , 'UserController@postEditPassword')->name('user.postEditPassword');
    Route::get('profile/wishlist' , 'UserController@getWishlist')->name('user.wishlist');
    Route::post('review' , 'ReviewsController@postReview')->name('review.post');
    Route::get('signout' , 'UserController@signout')->name('user.signout');
});
Route::group(['prefix' => 'blog'] , function () {
  Route::get('/' , 'BlogController@getIndex')->name('blog');
  Route::get('/{slug}/{id}' , 'BlogController@getSingle')->name('blog.single');
});
Route::group(['prefix' => 'products'] , function () {
  Route::get('/{category?}' , 'ProductsController@getIndex')->name('products');
  Route::get('/{slug}/{id}' , 'ProductsController@getSingle')->name('product.single');
});

//Admin Only Routes
Route::group(['prefix' => 'admin',  'middleware' => 'admin'] , function () {
    Route::get('/' , 'AdminController@getHome')->name('admin.home');
    //System Settings
    Route::prefix('system')->group(function(){
      Route::get('/' , 'SystemSettingsController@getHome')->name('admin.system.home');
      Route::get('/edit/{id}' , 'SystemSettingsController@getEdit')->name('admin.system.getEdit');
      Route::post('/edit/{id}' , 'SystemSettingsController@postEdit')->name('admin.system.postEdit');
    });
    //Categories
    Route::prefix('categories')->group(function(){
      Route::get('/' , 'CategoriesController@getHome')->name('admin.categories.home');
      Route::get('/new' , 'CategoriesController@getNew')->name('admin.categories.getNew');
      Route::post('/new' , 'CategoriesController@postNew')->name('admin.categories.postNew');
      Route::get('/edit/{id}' , 'CategoriesController@getEdit')->name('admin.categories.getEdit');
      Route::post('/edit/{id}' , 'CategoriesController@postEdit')->name('admin.categories.postEdit');
      Route::get('/localize/{id}' , 'CategoriesController@getLocalize')->name('admin.categories.getLocalize');
    });
    //Products System
    Route::prefix('products')->group(function(){
      Route::get('/' , 'ProductsController@getHome')->name('admin.products.home');
      Route::get('/new' , 'ProductsController@getNew')->name('admin.products.getNew');
      Route::post('/new' , 'ProductsController@postNew')->name('admin.products.postNew');
      Route::get('/edit/{id}' , 'ProductsController@getEdit')->name('admin.products.getEdit');
      Route::post('/edit/{id}' , 'ProductsController@postEdit')->name('admin.products.postEdit');
      Route::get('/delete-gallery/{id}' , 'ProductsController@deleteGalleryImages')->name('admin.galleryImages.delete');
      Route::get('/localize/{id}' , 'ProductsController@getLocalize')->name('admin.products.getLocalize');
      Route::get('/variation/{id}' , 'ProductsController@getVariation')->name('admin.products.getVariation');
      Route::post('/variation/{id}' , 'ProductsController@postVariation')->name('admin.products.postVariation');
      Route::get('/delete-variation/{id}' , 'ProductsController@deleteVariation')->name('admin.products.deleteVariation');
    });
    //Users System
    Route::prefix('users')->group(function(){
      Route::get('/' , 'UserController@getHome')->name('admin.users.home');
    });
    //Discount System
    Route::prefix('discount')->group(function(){
      Route::get('/' , 'DiscountController@getHome')->name('admin.discount.home');
      Route::get('/new' , 'DiscountController@getNew')->name('admin.discount.getNew');
      Route::post('/new' , 'DiscountController@postNew')->name('admin.discount.postNew');
      Route::get('/edit/{id}' , 'DiscountController@getEdit')->name('admin.discount.getEdit');
      Route::post('/edit/{id}' , 'DiscountController@postEdit')->name('admin.discount.postEdit');
    });
    //Coupouns System
    Route::prefix('coupoun')->group(function(){
      Route::get('/' , 'CoupounsController@getHome')->name('admin.coupoun.home');
      Route::get('/new' , 'CoupounsController@getNew')->name('admin.coupoun.getNew');
      Route::post('/new' , 'CoupounsController@postNew')->name('admin.coupoun.postNew');
      Route::get('/edit/{id}' , 'CoupounsController@getEdit')->name('admin.coupoun.getEdit');
      Route::post('/edit/{id}' , 'CoupounsController@postEdit')->name('admin.coupoun.postEdit');
  });
  
    //Shipping Costs System
    Route::prefix('shipping-costs')->group(function(){
      Route::get('/' , 'ShippingCostsController@getHome')->name('admin.shippingCosts.home');
      Route::get('/new' , 'ShippingCostsController@getNew')->name('admin.shippingCosts.getNew');
      Route::post('/new' , 'ShippingCostsController@postNew')->name('admin.shippingCosts.postNew');
      Route::get('/edit/{id}' , 'ShippingCostsController@getEdit')->name('admin.shippingCosts.getEdit');
      Route::post('/edit/{id}' , 'ShippingCostsController@postEdit')->name('admin.shippingCosts.postEdit');
    });
    //Blog System
    Route::prefix('blog')->group(function(){
        Route::get('/' , 'BlogController@getAdminAll')->name('admin.blog.index');
        Route::get('/new' , 'BlogController@getNew')->name('admin.posts.getNew');
        Route::post('/new' , 'BlogController@postNew')->name('admin.posts.postNew');
        Route::get('/edit/{id}' , 'BlogController@edit')->name('admin.posts.getEdit');
        Route::post('/edit/{id}' , 'BlogController@update')->name('admin.posts.postEdit');
    });
    //Orders System
    Route::prefix('orders')->group(function(){
      Route::get('/' , 'OrdersController@getHome')->name('admin.orders.home');
      Route::get('/single/{id}' , 'OrdersController@getSingleOrder')->name('admin.orders.single');
      Route::post('/update-status/{id}' , 'OrdersController@updateOrderStatus')->name('admin.orders.updateStatus');
      Route::get('/new' , 'ProductsController@getNew')->name('admin.products.getNew');
      Route::post('/new' , 'ProductsController@postNew')->name('admin.products.postNew');
      Route::get('/edit/{id}' , 'ProductsController@getEdit')->name('admin.products.getEdit');
      Route::post('/edit/{id}' , 'ProductsController@postEdit')->name('admin.products.postEdit');
      Route::get('/localize/{id}' , 'ProductsController@getLocalize')->name('admin.products.getLocalize');
    });
    Route::prefix('invoice')->group(function(){
      Route::get('generate/{id}' , 'InvoiceController@generateInvoice')->name('invoice.generate.get');
      Route::post('update/{id}' , 'InvoiceController@postUpdate')->name('admin.invoice.update');
      Route::get('download/{id}' , 'InvoiceController@downloadInvoice')->name('invoice.download.get');
      Route::get('send-to-user/{id}' , 'InvoiceController@sendToUser')->name('invoice.sendToUser.get');
    });
});

Route::get('change-lang/{locale}', 'HomeController@changeLang')->name('changeLang');
Route::get('/change-currency/{currency}/{currency_code}' , 'CurrencyController@setCurrency')->name('currency.change');
Route::get('/success' , 'OrdersController@orderSuccess')->name('order.success');

//Products Routes
Route::group(['prefix'=>'products'] , function (){
  Route::get('/{filter?}' , 'ProductsController@getAll')->name('product.home');
  Route::get('{id}/{slug}' , 'ProductsController@getSingle')->name('product.single');
});
//Cart Related Routes
Route::get('delete-from-cart/{cartId}/{userId}' ,'CartController@deleteItem')->name('cart.delete');
Route::get('cart' , 'CartController@getCartPage')->name('cart');
Route::get('checkout' , 'OrdersController@getCheckoutPage')->name('checkout');
Route::post('checkout', 'OrdersController@postOrder')->name('checkout.post');
Route::get('order-summary/{id}', 'OrdersController@getSummaryPage')->name('checkout.summary');
Route::get('order-payment/{id}', 'OrdersController@getPaymentPage')->name('checkout.payment');
Route::post('order-payment/{id}', 'OrdersController@postPaymentPage')->name('checkout.payment.post');
Route::post('apply-coupon' , 'CoupounsController@applyCoupon')->name('coupon.apply');