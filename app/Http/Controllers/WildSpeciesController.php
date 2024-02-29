<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WildSpeciesRequest;
use App\Repo\wildspecies\WildSpeciesRepo;
use App\Repo\wildlifelist\WildLifeListRepo;
use DataTables;
use Illuminate\Http\Request;

class WildSpeciesController extends Controller
{
    private $wildspeciesRepo, $wildlifeRepo;
    public function __construct(WildSpeciesRepo $wildspeciesRepo, WildLifeListRepo $wildlifeRepo)
    {
        $this->wildspeciesRepo = $wildspeciesRepo;
        $this->wildlifeRepo = $wildlifeRepo;
    }

    public function index()
    {
        try {
            if (request()->ajax()) {
                $data = $this->wildspeciesRepo->getAllSpecies();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->rawColumns([])
                    ->make(true);
            }
            return view('wildspecies.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while fetching menu data.']);
        }
    }
    public function create()
    {
        try {
            $lists = $this->wildlifeRepo->getWildLifeForSelect();
            return view('wildspecies.form')->with(['lists'=>$lists]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function store(WildSpeciesRequest $request)
    {
        // dd($request->all());
        try {
            $this->wildspeciesRepo->storeWildSpecies($request->validated());
            return redirect()->route('wildSpecies.index')->with(['message' => 'Wild Species Created Successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        try {
            $editData = $this->wildspeciesRepo->findWildSpecies($id);
            $lists = $this->wildlifeRepo->getWildLifeForSelect();
            return view('wildspecies.form')->with(['editData' => $editData, 'lists'=>$lists]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }
    public function update(WildSpeciesRequest $request, $id)
    {
        try {
            $this->wildspeciesRepo->updateWildSpecies($request->validated(), $id);
            return redirect()->route('wildSpecies.index')->with(['messsage' => 'Species updated successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }


    public function delete($id)
    {
        try {
            $this->wildspeciesRepo->deleteWildSpecies($id);
            return redirect()->back()->with(['message' => 'Species Deleted Successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }
}
