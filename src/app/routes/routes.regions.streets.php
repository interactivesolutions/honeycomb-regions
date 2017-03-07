<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/streets', ['as' => 'admin.regions.streets', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/streets', ['as' => 'admin.api.regions.streets', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@pageData']);
        Route::get('regions/streets/list', ['as' => 'admin.api.regions.streets.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@list']);
        Route::get('regions/streets/search', ['as' => 'admin.api.regions.streets.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@search']);
        Route::get('regions/streets/{id}', ['as' => 'admin.api.regions.streets.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_list'], 'uses' => 'regions\\HCStreetsController@getSingleRecord']);
        Route::post('regions/streets/{id}/duplicate', ['as' => 'admin.api.regions.streets.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@duplicate']);
        Route::post('regions/streets/restore', ['as' => 'admin.api.regions.streets.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@restore']);
        Route::post('regions/streets/merge', ['as' => 'admin.api.regions.streets.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@merge']);
        Route::post('regions/streets', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_create'], 'uses' => 'regions\\HCStreetsController@create']);
        Route::put('regions/streets/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@update']);
        Route::put('regions/streets/{id}/strict', ['as' => 'admin.api.regions.streets.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_update'], 'uses' => 'regions\\HCStreetsController@updateStrict']);
        Route::delete('regions/streets/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_delete'], 'uses' => 'regions\\HCStreetsController@delete']);
        Route::delete('regions/streets', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_delete'], 'uses' => 'regions\\HCStreetsController@delete']);
        Route::delete('regions/streets/{id}/force', ['as' => 'admin.api.regions.streets.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_force_delete'], 'uses' => 'regions\\HCStreetsController@forceDelete']);
        Route::delete('regions/streets/force', ['as' => 'admin.api.regions.streets.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_streets_force_delete'], 'uses' => 'regions\\HCStreetsController@forceDelete']);
    });
});
