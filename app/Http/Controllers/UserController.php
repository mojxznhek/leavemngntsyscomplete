<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users = User::all();
       
       return view('users.index', compact('users'));

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function changeRole(Request $request, string $id)
{
    $request->validate([
        'role' => ['required'],
    ]);

    $user = User::findOrFail($id);
    $user->role = $request->role; // Assuming 'role' is a column in your `users` table.
    $user->save();

    return redirect()->back()->with('message', 'User role updated successfully.');
}

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

     switch ($request->status) {
        case 'active':
            if ($user->status == 'pending' || $user->status == 'disapproved' || $user->status == 'deactivated') {
                $user->status = 'active';
            }
            break;

        case 'disapproved':
            if ($user->status == 'pending') {
                $user->status = 'disapproved';
            }
            break;

        case 'deactivated':
            if ($user->status == 'active') {
                $user->status = 'deactivated';
            }
            break;
    }

    $user->save();
    return redirect()->back()->with('message', 'User status updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
