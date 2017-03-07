<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/cities', ['as' => 'admin.regions.cities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/cities', ['as' => 'admin.api.regions.cities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@listData']);
        Route::get('regions/cities/search', ['as' => 'admin.api.regions.cities.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@search']);
        Route::get('regions/cities/{id}', ['as' => 'admin.api.regions.cities.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@getSingleRecord']);
        Route::post('regions/cities/{id}/duplicate', ['as' => 'admin.api.regions.cities.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@duplicate']);
        Route::post('regions/cities/restore', ['as' => 'admin.api.regions.cities.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@restore']);
        Route::post('regions/cities/merge', ['as' => 'admin.api.regions.cities.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@merge']);
        Route::post('regions/cities', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_create'], 'uses' => 'regions\\HCCitiesController@create']);
        Route::put('regions/cities/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@update']);
        Route::put('regions/cities/{id}/strict', ['as' => 'admin.api.regions.cities.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_update'], 'uses' => 'regions\\HCCitiesController@updateStrict']);
        Route::delete('regions/cities/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@delete']);
        Route::delete('regions/cities', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_delete'], 'uses' => 'regions\\HCCitiesController@delete']);
        Route::delete('regions/cities/{id}/force', ['as' => 'admin.api.regions.cities.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@forceDelete']);
        Route::delete('regions/cities/force', ['as' => 'admin.api.regions.cities.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_force_delete'], 'uses' => 'regions\\HCCitiesController@forceDelete']);
    });
});
