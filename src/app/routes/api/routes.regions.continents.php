<?php

Route::group(['prefix' => 'api', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/continents', ['as' => 'api.v1.regions.continents', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@adminIndex']);

    Route::group(['prefix' => 'v1/regions/continents'], function ()
    {
        Route::get('/', ['as' => 'api.v1.regions.continents', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@apiIndexPaginate']);

        Route::group(['prefix' => 'list'], function ()
        {
            Route::get('/', ['as' => 'api.v1.regions.continents.list', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@apiIndex']);
            Route::get('{timestamp}', ['as' => 'api.v1.regions.continents.list.update', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@apiIndexSync']);
        });

        Route::get('{id}', ['as' => 'api.v1.regions.continents.single', 'middleware' => ['acl-apps:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@apiShow']);
    });
});




