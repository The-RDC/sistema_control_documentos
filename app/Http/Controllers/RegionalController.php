<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\regional;
use App\Models\empresa;
use Illuminate\Http\Request;
use App\Http\Requests\Regional\StoreRequest;
use App\Http\Requests\Regional\UpdateRequest;

class RegionalController extends Controller
{
    function __construct()
    {
        $this->middleware('CheckPermissions:regional-list', ['only' => ['index','show']]);
        $this->middleware('CheckPermissions:regional-create', ['only' => ['create','store']]);
        $this->middleware('CheckPermissions:regional-edit', ['only' => ['edit','update']]);
        $this->middleware('CheckPermissions:regional-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $regional = regional::get()
                    ->whereNull("deleted_at");
        $empresa = empresa::get()
                    ->whereNull("deleted_at");

        return view('regional.index', compact('regional','empresa'));
    }

    public function create()
    {
        $regional = new regional();
        $empresa = empresa::get();
        return view('regional.create', compact('regional','empresa'));
    }

    public function store(StoreRequest $request)
    {
        $sql=DB::table('empresas') -> selectRaw('*')->get();
        dd($request->id_regional);
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
