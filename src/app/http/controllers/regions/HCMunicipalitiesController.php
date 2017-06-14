<?php namespace interactivesolutions\honeycombregions\app\http\controllers\regions;

use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use interactivesolutions\honeycombregions\app\models\regions\HCMunicipalities;
use interactivesolutions\honeycombregions\app\validators\regions\HCMunicipalitiesValidator;

class HCMunicipalitiesController extends HCBaseController
{

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex()
    {
        $config = [
            'title' => trans('HCRegions::regions_municipalities.page_title'),
            'listURL' => route('admin.api.regions.municipalities'),
            'newFormUrl' => route('admin.api.form-manager', ['regions-municipalities-new']),
            'editFormUrl' => route('admin.api.form-manager', ['regions-municipalities-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        $config['actions'][] = 'search';

        if (auth()->user()->can('interactivesolutions_honeycomb_regions_regions_municipalities_create'))
            $config['actions'][] = 'new';

        if (auth()->user()->can('interactivesolutions_honeycomb_regions_regions_municipalities_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if (auth()->user()->can('interactivesolutions_honeycomb_regions_regions_municipalities_delete'))
            $config['actions'][] = 'delete';

        return hcview('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    public function getAdminListHeader()
    {
        return [
            'country_id' => [
                "type" => "text",
                "label" => trans('HCRegions::regions_municipalities.country_id'),
            ],
            'name' => [
                "type" => "text",
                "label" => trans('HCRegions::regions_municipalities.name'),
            ],
            'translation' => [
                "type" => "text",
                "label" => trans('HCRegions::regions_municipalities.translation'),
            ],

        ];
    }

    /**
     * Creating data query
     *
     * @return $this|mixed
     */
    protected function createQuery()
    {
        $with = [];
        $select = HCMunicipalities::getFillableFields();

        $list = HCMunicipalities::with($with)->select($select)
            // add filters
            ->where(function ($query) use ($select) {
                $query = $this->getRequestParameters($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted($list);

        // add search items
        $list = $this->search($list);

        // ordering data
        $list = $this->orderData($list, $select);

        return $list;
    }

    /**
     * Creating data list
     * @return mixed
     */
    public function pageData()
    {
        return $this->createQuery()->paginate($this->recordsPerPage);
    }

    /**
     * Creating data list
     * @return mixed
     */
    public function list()
    {
        return $this->createQuery()->get();
    }

    /**
     * List search elements
     * @param Builder $query
     * @param string $phrase
     * @return Builder
     */
    protected function searchQuery(Builder $query, string $phrase)
    {
        return $query->where (function (Builder $query) use ($phrase) {
            $query->where ('country_id', 'LIKE', '%' . $phrase . '%')
                  ->orWhere('name', 'LIKE', '%' . $phrase . '%')
                  ->orWhere('translation_key', 'LIKE', '%' . $phrase . '%');
        });
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData()
    {
        (new HCMunicipalitiesValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.country_id', array_get($_data, 'country_id'));
        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.translation_key', array_get($_data, 'translation_key'));

        return $data;
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function apiShow(string $id)
    {
        $with = [];

        $select = HCMunicipalities::getFillableFields();

        $record = HCMunicipalities::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }
}
