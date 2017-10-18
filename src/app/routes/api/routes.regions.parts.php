<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function() {
    Route::group(['prefix' => 'v1/regions/parts'], function() {
        Route::get('/', [
            'as' => 'api.v1.regions.parts',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_list'],
            'uses' => 'regions\\HCCityPartsController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_create'],
            'uses' => 'regions\\HCCityPartsController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_delete'],
            'uses' => 'regions\\HCCityPartsController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('list/{timestamp}', [
                'as' => 'api.v1.regions.parts.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_list'],
                'uses' => 'regions\\HCCityPartsController@apiIndexSync',
            ]);
            Route::get('list', [
                'as' => 'api.v1.regions.parts.list',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_list'],
                'uses' => 'regions\\HCCityPartsController@apiIndex',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.regions.parts.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_update'],
            'uses' => 'regions\\HCCityPartsController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.regions.parts.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_regions_regions_parts_create',
                'acl-apps:interactivesolutions_honeycomb_regions_regions_parts_update',
            ],
            'uses' => 'regions\\HCCityPartsController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.regions.parts.force.multi',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_force_delete'],
            'uses' => 'regions\\HCCityPartsController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.regions.parts.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_list'],
                'uses' => 'regions\\HCCityPartsController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_update'],
                'uses' => 'regions\\HCCityPartsController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_delete'],
                'uses' => 'regions\\HCCityPartsController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.regions.parts.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_update'],
                'uses' => 'regions\\HCCityPartsController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.regions.parts.duplicate',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_create'],
                'uses' => 'regions\\HCCityPartsController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.regions.parts.force',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_parts_force_delete'],
                'uses' => 'regions\\HCCityPartsController@apiForceDelete',
            ]);
        });
    });
});
