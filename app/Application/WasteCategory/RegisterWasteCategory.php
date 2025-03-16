<?php

namespace App\Application\WasteCategory;
use App\Domain\WasteCategory\WasteCategory;
use App\Domain\WasteCategory\WasteCategoryRepository;

class RegisterWasteCategory
{
    private WasteCategoryRepository $wasteCategoryRepository;

    public function __construct($wasteCategoryRepository)
    {
        $this->wasteCategoryRepository = $wasteCategoryRepository;
    }

    public function AddWasteCategory(string $categoryId, string $categoryName)
    {
        $wasteCategory = new WasteCategory($categoryId, $categoryName);
        $this->wasteCategoryRepository->AddWasteCategory($wasteCategory);
    }
}