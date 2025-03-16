<?php

namespace App\Domain\WasteItem;

class WasteItem
{
    public function  __construct( 
        private string $item_id,
        private string $category_id,
        private string $item_category,
        private string $item_segregated
    ){
        $this->item_id = $item_id;
        $this->category_id = $category_id;
        $this->item_category = $item_category;
        $this->item_segregated = $item_segregated;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getItemCategory()
    {
        return $this->item_category;
    }

    public function getItemSegregated()
    {
        return $this->item_segregated;
    }
}