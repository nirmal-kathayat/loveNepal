<?php

namespace App\Http\Controllers;

use App\Repo\wildlifelist\WildLifeListRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\WildLifeListRequest;
use DataTables;
use Illuminate\Http\Request;

class WildlifeListController extends Controller
{
    private $wildlifelistRepo;
    public function __construct(WildLifeListRepo $wildlifelistRepo)
    {
       $this->wildlifelistRepo = $wildlifelistRepo;
    }

    public function index()
    {
        try {
    		if (request()->ajax()) {
	            $data = $this->wildlifelistRepo->getAllWildlifelist(); 
	            return DataTables::of($data)
	                ->addIndexColumn()
	                ->rawColumns([])
	                ->make(true);
	        }
    		return view('wildlifelist.index');
    		
    	} catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while fetching menu data.']);	
    	}
    }

    public function create()
    {
        try{
            return view('wildlifelist.form');
        }catch(\Exception $e){
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function store(WildLifeListRequest $request)
    {
        // dd($request->all());
        try{
            $this->wildlifelistRepo->storeWildLife($request->validated());
            return redirect()->route('wildLife.index')->with(['message'=>'Wildlifelist Created Successfully!','type'=>'success']);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        try{
            $editData = $this->wildlifelistRepo->findWildLifeList($id);
            return view('wildlifelist.form')->with(['editData'=>$editData]);

        }catch(\Exception $e){
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function update(WildLifeListRequest $request,$id)
    {
        try{
            $this->wildlifelistRepo->updateWildLifeList($request->validated(),$id);
            return redirect()->route('wildLife.index')->with(['message'=>'WildlifeList updated successfully!','type'=>'success']);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function delete($id)
    {
        try{
            $this->wildlifelistRepo->deleteWildLifeList($id);
            return redirect()->back()->with(['message'=>'WildLifeList deleted successfully!','type'=>'success']);
        }catch(\Exception $e){
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

}
