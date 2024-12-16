<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $issues = Issue::with('computer')->paginate(10);
        return view('home', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        $computers = Computer::all();
        $issues = Issue::all();
        return view('form', compact('computers', 'issues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        Issue::create($validatedData);
        return redirect('/')->with('success', 'Issue created successfully');
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
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('form', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required'
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($validatedData);
        return redirect('/')->with('success', 'Issue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect('/')->with('success', 'Issue deleted successfully');
    }
}
