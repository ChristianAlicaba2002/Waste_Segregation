<?php

namespace App\Application\WasteDisposal;
use App\Domain\WasteDisposal\WasteDisposal;
use App\Domain\WasteDisposal\WasteDisposalRepository;

class RegisterWasteDisposal
{
    private WasteDisposalRepository $wasteDisposalRepository;
    public function __construct(WasteDisposalRepository $wasteDisposalRepository)
    {
        $this->wasteDisposalRepository = $wasteDisposalRepository;
    }

    public function getWasteDisposal(
        string $disposal_id,
        string $item_id,
        string $record_id,
        string $facility_id,
        string $disposal_time
    )
    {

        $getWasteDisposal = new WasteDisposal($disposal_id, $item_id , $record_id, $facility_id, $disposal_time);
        return $this->wasteDisposalRepository->getWasteDisposal($getWasteDisposal); 

    }

}