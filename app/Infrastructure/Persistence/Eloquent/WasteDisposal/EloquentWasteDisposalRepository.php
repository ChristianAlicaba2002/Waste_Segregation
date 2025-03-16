<?php

namespace App\Infrastructure\Persistence\Eloquent\WasteDisposal;
use App\Application\WasteDisposal\RegisterWasteDisposal;
use App\Domain\WasteDisposal\WasteDisposalRepository;
use App\Domain\WasteDisposal\WasteDisposal;
use App\Models\WasteDisposal as WasteDisposalModel;

class EloquentWasteDisposalRepository
{
    public function getWasteDisposal(WasteDisposal $wasteDisposal)
    {
        $WasteDisposalModel = WasteDisposalModel::find($wasteDisposal->getDisposalId()) ?? new WasteDisposalModel();
        $WasteDisposalModel->disposal_id = $wasteDisposal->getDisposalId();
        $WasteDisposalModel->item_id = $wasteDisposal->getItemId();
        $WasteDisposalModel->record_id = $wasteDisposal->getRecordId();
        $WasteDisposalModel->facility_id = $wasteDisposal->getFacilityId();
        $WasteDisposalModel->disposal_time = $wasteDisposal->getDisposalTime();
        $WasteDisposalModel->save();
    }
}



