<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslationStoreRequest;
use App\Http\Requests\TranslationUpdateRequest;
use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::query()->paginate(10);

        return inertia('admin/Translation/Index', [
            "translations"      => $translations,
        ]);
    }

    public function create()
    {
        $count = Translation::query()->count();

        return inertia('admin/Translation/Create', [
            "count" => $count
        ]);
    }

    public function store(TranslationStoreRequest $request)
    {
        Translation::query()->create($request->all());

        return redirect()->back()->with("success", "Succeed!");
    }

    public function edit(Request $request, $id)
    {
        /** @var Translation $translation */
        $translation = Translation::query()->findOrFail($id);

        return inertia('admin/Translation/Edit', [
            "translation" => [
                'id'            => $translation->id,
                'english'       => $translation->english ?? '',
                'limbu'         => $translation->limbu ?? '',
                'pronunciation' => $translation->pronunciation ?? '',
            ]
        ]);
    }

    public function update(TranslationUpdateRequest $request, $id)
    {
        Translation::query()
            ->findOrFail($id)
            ->update($request->all());

        return redirect()->back()->with("success", "Succeed!");
    }
}
