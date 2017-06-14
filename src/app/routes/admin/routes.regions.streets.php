<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/streets', ['as' => 'admin.regions.streets', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@adminIndex']);

    Route::group(['prefix' => 'api/regions/streets'], function ()
    {
        Route::get('/', ['as' => 'admin.api.regions.streets', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_create'], 'uses' => 'regions\\HCStreetsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_delete'], 'uses' => 'regions\\HCStreetsController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.regions.streets.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.regions.streets.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.regions.streets.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_create', 'acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.regions.streets.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_force_delete'], 'uses' => 'regions\\HCStreetsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.regions.streets.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_delete'], 'uses' => 'regions\\HCStreetsController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.regions.streets.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.regions.streets.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_create'], 'uses' => 'regions\\HCStreetsController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.regions.streets.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_force_delete'], 'uses' => 'regions\\HCStreetsController@apiForceDelete']);
        });
    });
});
