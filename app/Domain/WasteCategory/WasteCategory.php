<?php

namespace App\Domain\WasteCategory;

class WasteCategory
{
   
    public function __construct(
        private string $category_id,
        private string $category_name,
    )
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

}