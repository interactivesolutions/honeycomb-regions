<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/regions/cities'], function ()
    {
        Route::get('/', ['as' => 'api.v1.regions.cities', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_create'], 'uses' => 'regions\\HCCitiesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.cities.list', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiIndex']);
            Route::get('{timestamp}', ['as' => 'api.v1.regions.cities.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.regions.cities.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.regions.cities.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_create', 'acl-apps:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.regions.cities.force.multi', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.cities.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.regions.cities.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.regions.cities.duplicate', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_create'], 'uses' => 'regions\\HCCitiesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.regions.cities.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@apiForceDelete']);
        });
    });
});


