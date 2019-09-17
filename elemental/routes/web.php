<?php

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



Auth::routes();

Route::get('/admin', 'Admin\Pages\PagesController@index')->name('admin');

Route::get('/admin/pages', 'Admin\Pages\PagesController@index')->name('pages');
Route::get('/admin/pages/create', 'Admin\Pages\CreateController@index')->name('pages_create');
Route::post('/admin/pages/save', 'Admin\Pages\CreateController@save')->name('pages_save');
Route::get('/admin/pages/update/{id}', 'Admin\Pages\UpdateController@index')->name('pages_update');
Route::get('/admin/pages/delete/{id}', 'Admin\Pages\CreateController@delete')->name('pages_delete');
Route::post('/admin/pages/content/save', 'Admin\Pages\ContentController@addBlock')->name('pages_add_block');
Route::get('/admin/pages/content/delete/{id}', 'Admin\Pages\ContentController@deleteBlock')->name('pages_delete_block');
Route::get('/admin/pages/content/', 'Admin\Pages\ContentController@index')->name('pages_content');

Route::get('/admin/posts', 'Admin\Posts\PostsController@index')->name('posts');
Route::get('/admin/posts/create', 'Admin\Posts\CreateController@index')->name('posts_create');
Route::post('/admin/posts/save', 'Admin\Posts\CreateController@save')->name('posts_save');
Route::post('/admin/posts/update', 'Admin\Posts\UpdateController@save')->name('posts_save_update');
Route::get('/admin/posts/update/{id}', 'Admin\posts\UpdateController@index')->name('posts_update');
Route::get('/admin/posts/delete/{id}', 'Admin\Posts\CreateController@delete')->name('posts_delete');

Route::get('/admin/orders', 'Admin\Orders\OrdersController@index')->name('orders');
Route::get('/admin/orders/create', 'Admin\Orders\CreateController@index')->name('orders_create');

Route::get('/admin/media', 'Admin\Media\MediaController@index')->name('media');
Route::post('/admin/media/upload', 'Admin\Media\CreateController@upload')->name('media_upload');
Route::post('/admin/media/link', 'Admin\Media\CreateController@link')->name('media_link');
Route::get('/admin/media/create', 'Admin\Media\CreateController@index')->name('media_create');
Route::get('/admin/media/delete/{id}', 'Admin\Media\CreateController@delete')->name('media_delete');

Route::get('/admin/contacts', 'Admin\Contacts\ContactsController@index')->name('contacts');
Route::get('/admin/contacts/create', 'Admin\Contacts\CreateController@index')->name('contacts_create');

Route::get('/admin/events', 'Admin\Events\EventsController@index')->name('events');
Route::get('/admin/events/create', 'Admin\Events\CreateController@index')->name('events_create');
Route::post('/admin/events/save', 'Admin\Events\CreateController@save')->name('events_save');
Route::post('/admin/events/update', 'Admin\Events\UpdateController@save')->name('events_save_update');
Route::get('/admin/events/update/{id}', 'Admin\Events\UpdateController@index')->name('events_update');
Route::get('/admin/events/delete/{id}', 'Admin\Events\CreateController@delete')->name('events_delete');

Route::get('/admin/users', 'Admin\Users\UsersController@index')->name('users');
Route::get('/admin/users/create', 'Admin\Users\CreateController@index')->name('users_create');
Route::post('/admin/users/save', 'Admin\Users\CreateController@save')->name('users_save');
Route::post('/admin/users/update', 'Admin\Users\UpdateController@save')->name('users_save_update');
Route::get('/admin/users/update/{id}', 'Admin\Users\UpdateController@index')->name('users_update');
Route::get('/admin/users/delete/{id}', 'Admin\Users\CreateController@delete')->name('users_delete');

Route::get('/admin/menu', 'Admin\Menu\MenuController@index')->name('menu');
Route::get('/admin/menu/create', 'Admin\Menu\CreateController@index')->name('menu_create');
Route::post('/admin/menu/save', 'Admin\Menu\CreateController@save')->name('menu_save');
Route::post('/admin/menu/update', 'Admin\Menu\UpdateController@save')->name('menu_save_update');
Route::get('/admin/menu/update/{id}', 'Admin\Menu\UpdateController@index')->name('menu_update');
Route::get('/admin/menu/delete/{id}', 'Admin\Menu\CreateController@delete')->name('menu_delete');

Route::get('/admin/settings', 'Admin\Settings\SettingsController@index')->name('settings');
Route::post('/admin/settings/update', 'Admin\Settings\UpdateController@save')->name('settings_save_update');

Route::get('/admin/messages', 'Admin\Messages\MessagesController@index')->name('messages');
Route::get('/admin/messages/update/{id}', 'Admin\Messages\UpdateController@index')->name('messages_update');
Route::get('/admin/messages/delete/{id}', 'Admin\Messages\CreateController@delete')->name('messages_delete');

Route::post('mail', 'Site\ContactController@mail')->name("mail");



Route::any('{any}', 'Site\PageController@index')->where('any', "(.*)");

