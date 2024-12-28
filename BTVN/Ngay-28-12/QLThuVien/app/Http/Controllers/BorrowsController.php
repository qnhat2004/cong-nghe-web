<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Borrows;
use App\Models\Readers;
use Illuminate\Http\Request;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $borrows = Borrows::with(['book', 'reader'])->paginate(5);
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $books = Books::all();
        $readers = Readers::all();
        return view('borrows.form', compact('books', 'readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'reader_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|in:Borrowed,Returned'
        ]);
        Borrows::create($validateData);
        return redirect('/')->with('success', 'Borrowed book successfully');
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
        $borrow = Borrows::findOrFail($id);
        $books = Books::all();
        $readers = Readers::all();
        return view('borrows.form', compact('borrow', 'books', 'readers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData = $request->validate([
            'reader_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
            'status' => 'required|in:Borrowed,Returned'
        ]);
        $borrow = Borrows::findOrFail($id);
        $borrow->update($validateData);
        return redirect('/')->with('success', 'Borrowed book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $borrow = Borrows::findOrFail($id);
        $borrow->delete();
        return redirect('/')->with('success', 'Borrowed book deleted successfully');
    }
}
