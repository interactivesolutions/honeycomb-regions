<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function ()
{
    Route::group(['prefix' => 'v1/regions/municipalities'], function ()
    {
        Route::get('/', ['as' => 'api.v1.regions.municipalities', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@apiIndexPaginate']);
        Route::post('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_create'], 'uses' => 'regions\\HCMunicipalitiesController@apiStore']);
        Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_delete'], 'uses' => 'regions\\HCMunicipalitiesController@apiDestroy']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.municipalities.list', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@apiIndex']);
            Route::get('{timestamp}', ['as' => 'api.v1.regions.municipalities.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@apiIndexSync']);
        });

        Route::post('restore', ['as' => 'api.v1.regions.municipalities.restore', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@apiRestore']);
        Route::post('merge', ['as' => 'api.v1.regions.municipalities.merge', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_create', 'acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@apiMerge']);
        Route::delete('force', ['as' => 'api.v1.regions.municipalities.force.multi', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_force_delete'], 'uses' => 'regions\\HCMunicipalitiesController@apiForceDelete']);

        Route::group(['prefix' => '{id}'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.municipalities.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@apiShow']);
            Route::put('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@apiUpdate']);
            Route::delete('/', ['middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_delete'], 'uses' => 'regions\\HCMunicipalitiesController@apiDestroy']);

            Route::put('strict', ['as' => 'api.v1.regions.municipalities.update.strict', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@apiUpdateStrict']);
            Route::post('duplicate', ['as' => 'api.v1.regions.municipalities.duplicate', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_create'], 'uses' => 'regions\\HCMunicipalitiesController@apiDuplicate']);
            Route::delete('force', ['as' => 'api.v1.regions.municipalities.force', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_municipalities_force_delete'], 'uses' => 'regions\\HCMunicipalitiesController@apiForceDelete']);
        });
    });
});