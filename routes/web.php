<?php

Route::get('/', 'IndexController@index')->name('home');
Route::get('/apartment/{apartment}', 'ApartmentController@show')->name('apartment/show');
Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard/profile');
Route::post('/dashboard/profile/save', 'ProfileController@saveDetails')->name('dashboard/profile/save');
Route::post('/dashboard/profile/password/save', 'ProfileController@savePassword')->name('dashboard/password/save');
Route::get('/dashboard/profile/subscription', 'SubscriptionController@index')->name('dashboard/subscription');
Route::get('/dashboard/profile/invoices', 'InvoicesController@index')->name('dashboard/invoices');
Route::get('/dashboard/profile/invoice/{id}', 'InvoicesController@detail')->name('dashboard/invoices/detail');

Route::get('/dummyInvoice', 'PaymentEndpoint@dummyInvoice');

Route::get('login/facebook/redirect', 'SocialAuthFacebookController@redirect')->name('facebook/redirect');
Route::get('login/facebook/callback', 'SocialAuthFacebookController@callback')->name('facebook/callback');

Auth::routes();

Route::post('/ajax/paymentMethod/add', 'AjaxPaymentMethods@addPaymentMethod')->name('ajax/paymentMethod/add');
Route::get('/ajax/paymentMethod/addDummy', 'AjaxPaymentMethods@dummy');

Route::post('/ajax/postSubscription/execute', 'AjaxPostSubscription@execute')->name('ajax/postSubscription/execute');
Route::post('/ajax/customerHandler/add', 'AjaxCustomerHandler@addCustomerHandler')->name('ajax/customerHandler/add');
Route::get('/ajax/getCards/execute', 'AjaxGetCards@execute')->name('ajax/getCards/execute');
Route::get('/ajax/getSubscriptions/execute', 'AjaxGetSubscriptions@execute')->name('ajax/getSubscriptions/execute');
Route::get('/ajax/getInvoices/execute', 'AjaxGetInvoices@execute')->name('ajax/getInvoices/execute');
Route::get('/ajax/getInvoice', 'AjaxGetInvoices@detailInfo')->name('ajax/getInvoice');
Route::post('/paymentEndpoint/execute', 'PaymentEndpoint@execute')->name('paymentEndpoint/execute');
