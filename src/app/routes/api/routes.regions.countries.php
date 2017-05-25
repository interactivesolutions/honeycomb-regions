<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function ()
{
    Route::group(['prefix' => 'v1/regions/countries'], function ()
    {
        Route::get('/', ['as' => 'api.v1.regions.countries', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.countries.list', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiIndex']);
            Route::get('{timestamp}', ['as' => 'api.v1.regions.countries.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.regions.countries.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.regions.countries.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_create', 'acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.regions.countries.force.multi', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.countries.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@apiDestroy']);

            Route::post('strict', ['as' => 'api.v1.regions.countries.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.regions.countries.duplicate', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.regions.countries.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@apiForceDelete']);
        });
    });
});
