<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\UomsRequest;
use App\Models\Uom;

interface UomsRepositoryInterface
{
    public function allUoms();
    public function createUoms();
    public function storeUoms(UomsRequest $request);
    public function showUoms(Uom $treasury);
    public function editUoms(Uom $store);
    public function updateUoms(UomsRequest $request, $id);
    public function deleteUoms($id);
}
