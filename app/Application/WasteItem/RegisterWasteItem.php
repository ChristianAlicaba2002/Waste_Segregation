<?php

namespace App\Application\WasteItem;
use App\Domain\WasteItem\WasteItem;
use App\Domain\WasteItem\WasteItemRepository;


class RegisterWasteItem
{

    private WasteItemRepository $wasteItemRepository;
    public function __construct(WasteItemRepository $wasteItemRepository)
    {
        $this->wasteItemRepository = $wasteItemRepository;
    }

    public function AddWasteItem(string $itemId, string $categoryId, string $item_category, string $itemSegregated)
    {
        $wasteItem = new WasteItem($itemId, $categoryId, $item_category, $itemSegregated);
        $this->wasteItemRepository->AddWasteItem($wasteItem);
    }


}