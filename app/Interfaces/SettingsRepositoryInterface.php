<?php

namespace App\Interfaces;

use App\Http\Requests\Admin\SettingsRequest;

interface SettingsRepositoryInterface
{
    public function index();
    public function edit();
    public function update(SettingsRequest $request);
}
