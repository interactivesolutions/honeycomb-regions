<?php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/municipalities', ['as' => 'admin.regions.municipalities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/municipalities', ['as' => 'admin.api.regions.municipalities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@pageData']);
        Route::get('regions/municipalities/list', ['as' => 'admin.api.regions.municipalities.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@list']);
        Route::get('regions/municipalities/search', ['as' => 'admin.api.regions.municipalities.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@search']);
        Route::get('regions/municipalities/{id}', ['as' => 'admin.api.regions.municipalities.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_list'], 'uses' => 'regions\\HCMunicipalitiesController@getSingleRecord']);
        Route::post('regions/municipalities/{id}/duplicate', ['as' => 'admin.api.regions.municipalities.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@duplicate']);
        Route::post('regions/municipalities/restore', ['as' => 'admin.api.regions.municipalities.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@restore']);
        Route::post('regions/municipalities/merge', ['as' => 'admin.api.regions.municipalities.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@merge']);
        Route::post('regions/municipalities', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_create'], 'uses' => 'regions\\HCMunicipalitiesController@create']);
        Route::put('regions/municipalities/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@update']);
        Route::put('regions/municipalities/{id}/strict', ['as' => 'admin.api.regions.municipalities.update.strict', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_update'], 'uses' => 'regions\\HCMunicipalitiesController@updateStrict']);
        Route::delete('regions/municipalities/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_delete'], 'uses' => 'regions\\HCMunicipalitiesController@delete']);
        Route::delete('regions/municipalities', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_delete'], 'uses' => 'regions\\HCMunicipalitiesController@delete']);
        Route::delete('regions/municipalities/{id}/force', ['as' => 'admin.api.regions.municipalities.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_force_delete'], 'uses' => 'regions\\HCMunicipalitiesController@forceDelete']);
        Route::delete('regions/municipalities/force', ['as' => 'admin.api.regions.municipalities.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_municipalities_force_delete'], 'uses' => 'regions\\HCMunicipalitiesController@forceDelete']);
    });
});
