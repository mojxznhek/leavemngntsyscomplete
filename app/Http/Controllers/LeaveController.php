<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveApplication;

use App\Mail\LeaveStatusNotification;
use Illuminate\Support\Facades\Mail;


class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = LeaveApplication::all();

        return view('leaves.index',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming data
        $validated = $request->validate([
            'remarks' => 'required|string|max:255',
            'details' => 'required|string|max:255',
        ]);

        // Find the leave application
        $leave = LeaveApplication::findOrFail($id);

        // Update the fields
        $leave->remarks = $validated['remarks'];
        $leave->details = $validated['details'];
        $leave->save();


        // send mail to our employee email.
        Mail::to($leave->user->email)->send(new LeaveStatusNotification($leave));

        // Redirect back with a success message 
        return redirect()->back()->with('message', 'Leave application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
