<?php

namespace App\Repositories;

use App\Http\Controllers\Admin\Uploader;
use App\Http\Requests\Admin\SettingsRequest;
use App\Interfaces\SettingsRepositoryInterface;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SettingsRepository implements SettingsRepositoryInterface
{

    public function index(): View
    {
        $collection = Setting::all();

         $settings = $collection->flatMap(function ($values){
             return [$values->key => $values->value, 'updated_at' => $values->updated_at];
         });

        return view('admin.settings.index', compact('settings'));
    }

    public function edit(): View
    {
        $collection = Setting::all();

        $settings = $collection->flatMap(function ($values){
            return [$values->key => $values->value];
        });

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(SettingsRequest $request): RedirectResponse
    {

        DB::beginTransaction();

        $oldImage = Setting::where('key', 'image')->first();

        try {

            $info = $request->except('_token', 'image');

            foreach ($info as $key => $value) {
                Setting::where('key', $key)->update(['value' => $value]);
            }

            Setting::where('key', 'added_by')->update(['value' => auth()->user()->name]);

            if ($request->image) {
                Setting::where('key', 'image')->update(['value' => Uploader::upload($request, 'admin/settings')]);
                Uploader::deleteFile('admin/settings/' . $oldImage->value);

            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back();
    }
}
