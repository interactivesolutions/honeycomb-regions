<?php

//./packages/interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.continents.php

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/continents', ['as' => 'admin.regions.continents', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/continents', ['as' => 'admin.api.regions.continents', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@listData']);
        Route::get('regions/continents/search', ['as' => 'admin.api.regions.continents.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@search']);
        Route::get('regions/continents/{id}', ['as' => 'admin.api.regions.continents.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@getSingleRecord']);
        Route::post('regions/continents/{id}/duplicate', ['as' => 'admin.api.regions.continents.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_update'], 'uses' => 'regions\\HCContinentsController@duplicate']);
        Route::post('regions/continents/restore', ['as' => 'admin.api.regions.continents.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_update'], 'uses' => 'regions\\HCContinentsController@restore']);
        Route::post('regions/continents/merge', ['as' => 'admin.api.regions.continents.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_update'], 'uses' => 'regions\\HCContinentsController@merge']);
        Route::post('regions/continents', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_create'], 'uses' => 'regions\\HCContinentsController@create']);
        Route::put('regions/continents/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_update'], 'uses' => 'regions\\HCContinentsController@update']);
        Route::delete('regions/continents/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_delete'], 'uses' => 'regions\\HCContinentsController@delete']);
        Route::delete('regions/continents', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_delete'], 'uses' => 'regions\\HCContinentsController@delete']);
        Route::delete('regions/continents/{id}/force', ['as' => 'admin.api.regions.continents.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_force_delete'], 'uses' => 'regions\\HCContinentsController@forceDelete']);
        Route::delete('regions/continents/force', ['as' => 'admin.api.regions.continents.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_force_delete'], 'uses' => 'regions\\HCContinentsController@forceDelete']);
    });
});

