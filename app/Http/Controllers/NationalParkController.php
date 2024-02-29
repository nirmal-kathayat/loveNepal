<?php

namespace App\Http\Controllers;
use App\Repo\nationalpark\NationalParkRepo;

use App\Http\Controllers\Controller;
use App\Http\Requests\NationalParkRequest;
use App\Models\NationalPark;
use DataTables;
use Illuminate\Http\Request;

class NationalParkController extends Controller
{
    private $nationalParkRepo;
    public function __construct(NationalParkRepo $nationalParkRepo)
    {
        $this->nationalParkRepo = $nationalParkRepo;
    }

    public function index()
    {
        try {
    		if (request()->ajax()) {
	            $data = $this->nationalParkRepo->getAllNationalPark(); 
	            return DataTables::of($data)
	                ->addIndexColumn()
	                ->rawColumns([])
	                ->make(true);
	        }
    		return view('nationalPark.index');
    		
    	} catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while fetching menu data.']);	
    	}
    }

    public function create()
    {
        try{
            return view('nationalpark.form');
            
        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function store(NationalParkRequest $request)
    {
        // dd($request->all());
        try{
            $this->nationalParkRepo->storeNationalPark($request->validated());

            return redirect()->route('nationalPark.index')->with(['message'=>'National Park Added successfully!','type'=>'success']);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        try{
            $editData = $this->nationalParkRepo->findNationalPark($id);
            return view('nationalpark.form')->with(['editData'=>$editData]);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function update(NationalParkRequest $request,$id){
        try{
            $this->nationalParkRepo->updateNationalPark($request->validated(),$id);

            return redirect()->route('nationalPark.index')->with(['message'=>'National Park updated successfully!','type'=>'success']);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function delete($id){
        try{
            $this->nationalParkRepo->deleteNationalPark($id);
            return redirect()->back()->with(['message'=>'National Park deleted successfully!','type'=>'success']);

        }catch(\Exception $e)
        {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }
}
