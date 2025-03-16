<?php

namespace App\Infrastructure\Persistence\Eloquent\WasteItem;

use App\Models\WasteItem as WasteItemModel;
use App\Domain\WasteItem\WasteItem;
use App\Application\WasteItem\RegisterWasteItem;

class EloquentWasterItemRepository implements RegisterWasteItem
{
    public function addWasteItem(WasteItem $wasteItem)
    {
        $WasteItem = WasteItemModel::find($wasteItem->getItemId()) ?? new WasteItemModel();
        $WasteItem->item_id = $wasteItem->getItemId();
        $WasteItem->category_id = $wasteItem->getCategoryId();
        $WasteItem->item_category = $wasteItem->getItemCategory();
        $WasteItem->item_segregated = $wasteItem->getItemSegregated();
        $WasteItem->save();
    }
}