<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::latest()->paginate(5);
        return view('teams', compact('teams'));
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
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:32',
            'university' => 'required|max:255',
            'email' => 'required|email|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Team::create($input);

        return redirect()->route('team')
            ->with('success', 'Team Member created successfully.');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $teams)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:32',
            'university' => 'required|max:255',
            'email' => 'required|email|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $input = $request->all();

        if($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $teams->update($input);

        return redirect()->route('team')
            ->with('success', 'Team Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $teams)
    {
        $teams->delete();
        return redirect()->route('team')
            ->with('danger', 'Team Member deleted successfully.');
    }
}
