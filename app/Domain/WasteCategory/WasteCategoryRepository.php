<?php

namespace App\Domain\WasteCategory;

interface WasteCategoryRepository
{
    public function AddWasteCategory(WasteCategory $WasteCategory);
}