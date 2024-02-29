<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityRequest;
use App\Repo\activity\ActivityRepo;
use Illuminate\Http\Request;
use DataTables;

class ActivityController extends Controller
{
    private $activityRepo;
    public function __construct(ActivityRepo $activityRepo)
    {
        $this->activityRepo = $activityRepo;
    }

    public function index()
    {

        try {
            if (request()->ajax()) {
                $data = $this->activityRepo->getAllActivity();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->rawColumns([])
                    ->make(true);
            }
            return view('activity.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while fetching menu data.']);
        }
    }
    public function create()
    {
        try {
            return view('activity.form');
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function store(ActivityRequest $request)
    {
        // dd($request->all());
        try {
            $this->activityRepo->storeActivity($request->validated());
            return redirect()->route('activity.index')->with(['message' => 'Activity created successfully', 'type' => 'success']);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        try {
            $editActivity = $this->activityRepo->findActivity($id);
            return view('activity.form')->with(['editActivity' => $editActivity]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function update(ActivityRequest $request, $id)
    {
        try {
            $this->activityRepo->updateActivity($request->validated(), $id);
            return redirect()->route('activity.index')->with(['message' => 'Activity updated successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }

    public function delete($id)
    {
        try {
            $this->activityRepo->deleteActivity($id);
            return redirect()->back()->with(['message' => 'Activity deleted successfully!', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['message' => 'Something went wrong', 'type' => 'error']);
        }
    }
}
