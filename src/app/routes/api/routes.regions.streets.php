<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function() {
    Route::group(['prefix' => 'v1/regions/streets'], function() {
        Route::get('/', [
            'as' => 'api.v1.regions.streets',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_list'],
            'uses' => 'regions\\HCStreetsController@apiIndexPaginate',
        ]);
        Route::post('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_create'],
            'uses' => 'regions\\HCStreetsController@apiStore',
        ]);
        Route::delete('/', [
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_delete'],
            'uses' => 'regions\\HCStreetsController@apiDestroy',
        ]);

        Route::group(['prefix' => 'list'], function() {
            Route::get('list/{timestamp}', [
                'as' => 'api.v1.regions.streets.list.update',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_list'],
                'uses' => 'regions\\HCStreetsController@apiIndexSync',
            ]);
            Route::get('list', [
                'as' => 'api.v1.regions.streets.list',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_list'],
                'uses' => 'regions\\HCStreetsController@apiIndex',
            ]);
        });

        Route::post('restore', [
            'as' => 'api.v1.regions.streets.restore',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_update'],
            'uses' => 'regions\\HCStreetsController@apiRestore',
        ]);
        Route::post('merge', [
            'as' => 'api.v1.regions.streets.merge',
            'middleware' => [
                'acl-apps:interactivesolutions_honeycomb_regions_regions_streets_create',
                'acl-apps:interactivesolutions_honeycomb_regions_regions_streets_update',
            ],
            'uses' => 'regions\\HCStreetsController@apiMerge',
        ]);
        Route::delete('force', [
            'as' => 'api.v1.regions.streets.force.multi',
            'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_force_delete'],
            'uses' => 'regions\\HCStreetsController@apiForceDelete',
        ]);

        Route::group(['prefix' => '{id}'], function() {
            Route::get('/', [
                'as' => 'api.v1.regions.streets.single',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_list'],
                'uses' => 'regions\\HCStreetsController@apiShow',
            ]);
            Route::put('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_update'],
                'uses' => 'regions\\HCStreetsController@apiUpdate',
            ]);
            Route::delete('/', [
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_delete'],
                'uses' => 'regions\\HCStreetsController@apiDestroy',
            ]);

            Route::put('strict', [
                'as' => 'api.v1.regions.streets.update.strict',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_update'],
                'uses' => 'regions\\HCStreetsController@apiUpdateStrict',
            ]);
            Route::post('duplicate', [
                'as' => 'api.v1.regions.streets.duplicate',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_create'],
                'uses' => 'regions\\HCStreetsController@apiDuplicate',
            ]);
            Route::delete('force', [
                'as' => 'api.v1.regions.streets.force',
                'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_streets_force_delete'],
                'uses' => 'regions\\HCStreetsController@apiForceDelete',
            ]);
        });
    });
});
