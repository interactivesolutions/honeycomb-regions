<?php

//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.cities.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/cities', ['as' => 'admin.regions.cities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/cities', ['as' => 'admin.api.regions.cities', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@pageData']);
        Route::get('regions/cities/list', ['as' => 'admin.api.regions.cities.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_cities_list'], 'uses' => 'regions\\HCCitiesController@list']);
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


//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.continents.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/continents', ['as' => 'admin.regions.continents', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/continents', ['as' => 'admin.api.regions.continents', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@pageData']);
        Route::get('regions/continents/list', ['as' => 'admin.api.regions.continents.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@list']);
        Route::get('regions/continents/search', ['as' => 'admin.api.regions.continents.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@search']);
        Route::get('regions/continents/{id}', ['as' => 'admin.api.regions.continents.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_continents_list'], 'uses' => 'regions\\HCContinentsController@getSingleRecord']);
    });
});


//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.countries.php


Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function ()
{
    Route::get('regions/countries', ['as' => 'admin.regions.countries', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@adminView']);

    Route::group(['prefix' => 'api'], function ()
    {
        Route::get('regions/countries', ['as' => 'admin.api.regions.countries', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@pageData']);
        Route::get('regions/countries/list', ['as' => 'admin.api.regions.countries.list', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@list']);
        Route::get('regions/countries/search', ['as' => 'admin.api.regions.countries.search', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@search']);
        Route::get('regions/countries/{id}', ['as' => 'admin.api.regions.countries.single', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_list'], 'uses' => 'regions\\HCCountriesController@getSingleRecord']);
        Route::post('regions/countries/{id}/duplicate', ['as' => 'admin.api.regions.countries.duplicate', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@duplicate']);
        Route::post('regions/countries/restore', ['as' => 'admin.api.regions.countries.restore', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@restore']);
        Route::post('regions/countries/merge', ['as' => 'admin.api.regions.countries.merge', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@merge']);
        Route::post('regions/countries', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_create'], 'uses' => 'regions\\HCCountriesController@create']);
        Route::put('regions/countries/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_update'], 'uses' => 'regions\\HCCountriesController@update']);
        Route::delete('regions/countries/{id}', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@delete']);
        Route::delete('regions/countries', ['middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_delete'], 'uses' => 'regions\\HCCountriesController@delete']);
        Route::delete('regions/countries/{id}/force', ['as' => 'admin.api.regions.countries.force', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@forceDelete']);
        Route::delete('regions/countries/force', ['as' => 'admin.api.regions.countries.force.multi', 'middleware' => ['acl:interactivesolutions_honeycomb_regions_regions_countries_force_delete'], 'uses' => 'regions\\HCCountriesController@forceDelete']);
    });
});


//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.municipalities.php


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


//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.parts.php


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


//interactivesolutions/honeycomb-regions/src/app/routes/routes.regions.streets.php


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

