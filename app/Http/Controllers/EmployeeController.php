<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveApplication;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.dashboard');
    }

   

    public function fileLeave(Request $request)
    {
       
    }

     /**
     * Show the form for creating a new resource.
     */

     
    public function create()
    {
         $leaves = LeaveApplication::where('user_id', auth()->id())->select('*')->get();
         return view('employees.create-leave',compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
             'leave_from_date' => ['required', 'date', 'after_or_equal:today'],
              'leave_to_date' => ['required', 'date', 'after_or_equal:leave_from_date'],
             'reason' =>'required',
        ]);

        LeaveApplication::create([
            'user_id' => auth()->id(),
            'leave_from_date' => $request->leave_from_date,
            'leave_to_date' => $request->leave_to_date,
            'reason' => $request->reason,
        ]);



      

        return redirect()->back()->with('message', 'Leave application submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
