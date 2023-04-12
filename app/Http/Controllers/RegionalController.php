<?php

namespace App\Http\Controllers;

use App\Models\regional;
use Illuminate\Http\Request;
use App\Http\Requests\Regional\StoreRequest;
use App\Http\Requests\Regional\UpdateRequest;

class RegionalController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:regional-list|regional-create|regional-edit|regional-delete', ['only' => ['index','show']]);
        $this->middleware('permission:regional-create', ['only' => ['create','store']]);
        $this->middleware('permission:regional-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:regional-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $regional = regional::get();
        return view('regional.index', compact('regional'));
    }

    public function create()
    {
        $regional = new regional();

        return view('regional.create', compact('regional'));
    }

    public function store(StoreRequest $request)
    {
        regional::create($request->all());
        return redirect()->route('regional.index');
    }

    public function show(regional $regional)
    {
        return view('regional.show', compact('regional'));
    }

    public function edit(regional $regional)
    {
        return view('regional.edit', compact('regional'));
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
