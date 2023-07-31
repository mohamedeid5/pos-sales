<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsRequest;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct(protected SettingsRepository $settingsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->settingsRepository->index();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return $this->settingsRepository->edit();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingsRequest $request)
    {
        return $this->settingsRepository->update($request);
    }

}
