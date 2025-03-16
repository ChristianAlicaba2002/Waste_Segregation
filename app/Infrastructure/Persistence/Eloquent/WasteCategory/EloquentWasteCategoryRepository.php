<?php

namespace App\Infrastructure\Persistence\Eloquent\WasteCategory;
use App\Domain\WasteCategory\WasteCategory;
use App\Models\WasteCategory as WasteCategoryModel;
use App\Application\WasteCategory\RegisterWasteCategory;


class EloquentWasteCategoryRepository implements RegisterWasteCategory
{

    public function AddWsateCategory(WasteCategory $wasteCategory)
    {
        $WasteCategory = WasteCategoryModel::find($wasteCategory->getCategoryId()) ?? new WasteCategoryModel();
        $WasteCategory->category_id = $wasteCategory->getCategoryId();
        $WasteCategory->category_name = $wasteCategory->getCategoryName();
        $WasteCategory->save();
    }
   
}