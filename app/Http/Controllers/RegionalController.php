<?php

namespace App\Http\Controllers;

use App\Models\regional;
use Illuminate\Http\Request;
use App\Http\Requests\Regional\StoreRequest;
use App\Http\Requests\Regional\UpdateRequest;

class RegionalController extends Controller
{
    public function index()
    {
        $regional = regional::get();
        return view('layouts.admin.categories.index', compact('regional'));
    }

    public function create()
    {
        $regional = new regional();

        return view('layouts.admin.categories.create', compact('regional'));
    }

    public function store(StoreRequest $request)
    {
        regional::create($request->all());
        return redirect()->route('regional.index');
    }

    public function show(regional $regional)
    {
        return view('layouts.admin.regional.show', compact('regional'));
    }

    public function edit(regional $regional)
    {
        return view('layouts.admin.regional.edit', compact('regional'));
    }

    public function update(UpdateRequest $request, regional $regional)
    {
        $regional->update($request->all());
        return redirect()->route('regional.index');
    }

    public function destroy(regional $regional)
    {
        $regional->delete();
        return redirect()->route('regional.index');
    }
}