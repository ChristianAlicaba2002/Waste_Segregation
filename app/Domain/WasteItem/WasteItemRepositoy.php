<?php

namespace App\Domain\WasteItem;

interface WasteItemRepository 
{
    public function addWasteItem(WasteItem $wasteItem): void;
}