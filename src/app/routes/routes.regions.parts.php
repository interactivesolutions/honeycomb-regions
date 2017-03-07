<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/parts', ['as' => 'admin.regions.parts', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/parts', ['as' => 'admin.api.regions.parts', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@pageData']);
        Route::get('regions/parts/list', ['as' => 'admin.api.regions.parts.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@list']);
        Route::get('regions/parts/search', ['as' => 'admin.api.regions.parts.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@search']);
        Route::get('regions/parts/{id}', ['as' => 'admin.api.regions.parts.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_list'], 'uses' => 'regions\\HCCityPartsController@getSingleRecord']);
        Route::post('regions/parts/{id}/duplicate', ['as' => 'admin.api.regions.parts.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@duplicate']);
        Route::post('regions/parts/restore', ['as' => 'admin.api.regions.parts.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@restore']);
        Route::post('regions/parts/merge', ['as' => 'admin.api.regions.parts.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@merge']);
        Route::post('regions/parts', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_create'], 'uses' => 'regions\\HCCityPartsController@create']);
        Route::put('regions/parts/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@update']);
        Route::put('regions/parts/{id}/strict', ['as' => 'admin.api.regions.parts.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_update'], 'uses' => 'regions\\HCCityPartsController@updateStrict']);
        Route::delete('regions/parts/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_delete'], 'uses' => 'regions\\HCCityPartsController@delete']);
        Route::delete('regions/parts', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_delete'], 'uses' => 'regions\\HCCityPartsController@delete']);
        Route::delete('regions/parts/{id}/force', ['as' => 'admin.api.regions.parts.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_force_delete'], 'uses' => 'regions\\HCCityPartsController@forceDelete']);
        Route::delete('regions/parts/force', ['as' => 'admin.api.regions.parts.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_parts_force_delete'], 'uses' => 'regions\\HCCityPartsController@forceDelete']);
    });
});
