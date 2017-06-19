<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/cities', ['as' => 'admin.regions.cities.index', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@adminIndex']);

    Route::group(['prefix' => 'api/regions/cities'], function ()
    {
        Route::get('/', ['as' => 'admin.api.regions.cities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_create'], 'uses' => 'regions\\HCCitiesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.regions.cities.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.regions.cities.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.regions.cities.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_create', 'acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.regions.cities.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.regions.cities.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.regions.cities.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.regions.cities.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_create'], 'uses' => 'regions\\HCCitiesController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.regions.cities.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@apiForceDelete']);
        });
    });
});
