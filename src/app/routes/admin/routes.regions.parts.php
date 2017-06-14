<?php

Route::group(['prefix' => config('hc.admin_url'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/parts', ['as' => 'admin.regions.parts', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@adminIndex']);

    Route::group(['prefix' => 'api/regions/parts'], function ()
    {
        Route::get('/', ['as' => 'admin.api.regions.parts', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_create'], 'uses' => 'regions\\HCCityPartsController@apiStore']);
        Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_delete'], 'uses' => 'regions\\HCCityPartsController@apiDestroy']);

        Route::get('list', ['as' => 'admin.api.regions.parts.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@apiIndex']);
        Route::post('restore', ['as' => 'admin.api.regions.parts.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@apiRestore']);
        Route::post('merge', ['as' => 'admin.api.regions.parts.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_create', 'acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@apiMerge']);
        Route::delete('force', ['as' => 'admin.api.regions.parts.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_force_delete'], 'uses' => 'regions\\HCCityPartsController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'admin.api.regions.parts.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@apiShow']);
            Route::put('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_delete'], 'uses' => 'regions\\HCCityPartsController@apiDestroy']);

            Route::put('strict', ['as' => 'admin.api.regions.parts.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'admin.api.regions.parts.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_create'], 'uses' => 'regions\\HCCityPartsController@apiDuplicate']);
            Route::delete('force', ['as' => 'admin.api.regions.parts.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_force_delete'], 'uses' => 'regions\\HCCityPartsController@apiForceDelete']);
        });
    });
});


