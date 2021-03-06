<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 28/02/2016
 *
 * Domain: 
 * Manager
 * 
 * Type: 
 * Router
 * 
 * Description:
 * All administrator routes assigned here
 */

#
# Dashboard
#
$router->get('/', 'Dashboard@index')->name('dashboard');

#
# Media
# 
$router->group(['namespace' => 'Media', 'prefix' => 'media', 'as' => 'media.'], function($router) {

  $router->post('upload/{type}', 'Upload@index')->name('upload');

});


#
# Auth pages
#
$router->group(['namespace' => 'Auth'], function($router) {
  $router->any('login', 'Authentication@login')->name('login'); # login page
  $router->get('logout', 'Authentication@logout')->name('logout'); #logout page
});

#
# Configuration pages
#
$router->group(['namespace' => 'Config'], function($router) {
  $router->any('configuration/{type?}', 'Configuration@index')->name('configuration');
});

#
# Catalog pages
#
$router->group(['namespace' => 'Catalog'], function($router) {

  # Categories
  $router->any('catalog/category', 'Categories@index')->name('catalog.categories');
  $router->post('catalog/category/update', 'Categories@update')->name('catalog.categories.update');

  # Attributes
  $router->get('catalog/attribute', 'Attributes@index')->name('catalog.attributes');
  $router->post('catalog/attribute', 'Attributes@update')->name('catalog.attributes.update');  
  $router->post('catalog/attribute/action', 'Attributes@action')->name('catalog.attributes.action');  

  # Products
  $router->get('catalog/product', 'Product@index')->name('catalog.product');
  $router->get('catalog/product/update/{id?}', 'Product@update')->name('catalog.product.update');  
  $router->get('catalog/product/delete/{id?}', 'Product@delete')->name('catalog.product.delete');
  
  $router->post('catalog/product/action', 'Product@action')->name('catalog.product.action');
  $router->post('catalog/product/save', 'Product@save')->name('catalog.product.save');

  # Products media
  $router->post('catalog/product/media', 'ProductMedia@update')->name('catalog.product.media');
  $router->post('catalog/product/media/delete', 'ProductMedia@delete')->name('catalog.product.media.delete');
  $router->post('catalog/product/media-list', 'ProductMedia@mediaList')->name('catalog.product.media-list');

  # Products variation
  $router->post('catalog/product/variation', 'ProductVariation@update')->name('catalog.product.variation');
  $router->post('catalog/product/variation/save', 'ProductVariation@save')->name('catalog.product.variation.save');

});

#
# User pages
#
$router->group(['namespace' => 'User'], function($router) {

  # Users
  $router->get('users', 'Users@index')->name('users');
  $router->get('users/update/{id?}', 'Users@update')->name('users.update');
  $router->get('users/delete/{id}', 'Users@delete')->name('users.delete');
  $router->post('users/save', 'Users@save')->name('users.save');

  # Roles
  $router->get('roles', 'Roles@index')->name('roles');
  $router->get('roles/update/{id?}', 'Roles@update')->name('roles.update');
  $router->get('roles/delete/{id}', 'Roles@delete')->name('roles.delete');
  $router->post('roles/save', 'Roles@save')->name('roles.save');

});

#
# CMS
#
$router->group(['namespace' => 'Cms', 'prefix' => 'cms', 'as' => 'cms.'], function($router) {

  #
  # PAGES
  #
  $router->any('pages', 'Pages@index')->name('page');
  $router->get('pages/create', 'Pages@form')->name('page.create');
  $router->get('pages/update/{id?}', 'Pages@form')->name('page.update');
  $router->get('pages/delete/{id?}', 'Pages@delete')->name('page.delete');
  $router->post('pages/save', 'Pages@save')->name('page.save');

});

#
# E-COMMERCE
#
$router->group(['namespace' => 'Commerce', 'prefix' => 'commerce', 'as' => 'commerce.'], function($router) {

});