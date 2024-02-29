<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repo\category\CategoryRepo;
use App\Http\Requests\CategoryRequest;
use DataTables;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepo;
    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        try {
    		if (request()->ajax()) {
	            $data = $this->categoryRepo->getAllCategory(); 
	            return DataTables::of($data)
	                ->addIndexColumn()
	                ->rawColumns([])
	                ->make(true);
	        }
    		return view('Category.index');
    		
    	} catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while fetching menu data.']);	
    	}
    }

    // create
    public function create()
    {

        try {
            return view('Category.form');
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function store(CategoryRequest $request)
    {
        // dd($request->all());
        try {
            $this->categoryRepo->storeCategory($request->validated());
            return redirect()->route('Category.index')->with(['message' => 'Category Created Successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        try {
            $editData = $this->categoryRepo->findCategory($id);
            return view('Category.form')->with(['editData' => $editData]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryRepo->updateCategory($request->validated(), $id);
            return redirect()->route('Category.index')->with(['message' => 'Category Updated Successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function delete($id)
    {

        try {
            $this->categoryRepo->deleteCategory($id);
            return redirect()->back()->with(['message' => 'Category deleted successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }
}
