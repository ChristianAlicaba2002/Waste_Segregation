<?php

namespace App\Domain\WasteDisposal;

class WasteDisposal
{
    public function __construct(
       private string $disposal_id,
       private string $item_id,
       private string $record_id,
       private string $facility_id,
       private string $disposal_time
    )
    {
        $this->disposal_id = $disposal_id;
        $this->item_id = $item_id;
        $this->record_id = $record_id;
        $this->facility_id = $facility_id;
        $this->disposal_time = $disposal_time;
    }

    public function getDisposalId()
    {
        return $this->disposal_id;
    }

    public function getItemId()
    {
        return $this->item_id;
    }

    public function getRecordId()
    {
        return $this->record_id;
    }

    public function getFacilityId()
    {
        return $this->facility_id;
    }

    public function getDisposalTime()
    {
        return $this->disposal_time;
    }
}