<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/countries', ['as' => 'api.v1.regions.countries', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@adminView']);

    Route::group(['prefix' => 'v1/regions/countries'], function ()
    {
        Route::get('/', ['as' => 'api.v1.api.regions.countries', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@listPage']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.api.regions.countries.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@listUpdate']);
        Route::get('list', ['as' => 'api.v1.api.regions.countries.list', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@list']);
        Route::get('search', ['as' => 'api.v1.api.regions.countries.search', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@search']);
        Route::get('{id}', ['as' => 'api.v1.api.regions.countries.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.api.regions.countries.duplicate', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.api.regions.countries.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@restore']);
        Route::post('merge', ['as' => 'api.v1.api.regions.countries.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@merge']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@create']);

        Route::put('{id}', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@update']);

        Route::delete('{id}', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@delete']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.api.regions.countries.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.api.regions.countries.force.multi', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@forceDelete']);
    });
});
