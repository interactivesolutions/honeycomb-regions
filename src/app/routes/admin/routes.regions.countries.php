<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/countries', ['as' => 'admin.regions.countries.index', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@adminIndex']);

    Route::group(['prefix' => 'api/regions/countries'], function ()
    {
        Route::get('/', ['as' => 'admin.api.regions.countries', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.regions.countries.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.regions.countries.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.regions.countries.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_create', 'acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.regions.countries.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.regions.countries.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.regions.countries.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.regions.countries.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.regions.countries.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@apiForceDelete']);
        });
    });
});
