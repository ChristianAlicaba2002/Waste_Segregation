<?php

namespace App\Domain\WasteDisposal;

interface WasteDisposalRepository
{
   
    public function getWasteDisposal(WasteDisposal $wasteDisposal): WasteDisposal;

}
