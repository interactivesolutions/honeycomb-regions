<?php namespace interactivesolutions\honeycombregions\app\http\controllers\regions;

use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Http\Controllers\HCBaseController;
use interactivesolutions\honeycombregions\app\models\regions\HCContinents;

class HCContinentsController extends HCBaseController
{

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminIndex()
    {
        $config = [
            'title' => trans('HCRegions::regions_continents.page_title'),
            'listURL' => route('admin.api.regions.continents'),
            'newFormUrl' => route('admin.api.form-manager', ['regions-continents-new']),
            'editFormUrl' => route('admin.api.form-manager', ['regions-continents-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        $config['actions'][] = 'search';

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
            'name' => [
                "type" => "text",
                "label" => trans('HCRegions::regions_continents.name'),
            ],
        ];
    }

    /**
     * @return mixed
     */
    protected function createQuery()
    {
        $with = [];
        $select = HCContinents::getFillableFields();

        $list = HCContinents::with($with)->select($select)
            // add filters
            ->where(function($query) use ($select) {
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
     * List search elements
     * @param Builder $query
     * @param string $phrase
     * @return Builder
     */
    protected function searchQuery(Builder $query, string $phrase)
    {
        return $query->where(function(Builder $query) use ($phrase) {
            $query->where('translation_key', 'LIKE', '%' . $phrase . '%');
        });
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

        $select = HCContinents::getFillableFields();

        $record = HCContinents::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }
}
