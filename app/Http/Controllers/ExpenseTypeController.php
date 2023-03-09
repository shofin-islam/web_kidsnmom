<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extypes = ExpenseType::select(
            'id',
            'projectId',
            'name', 
            'details',
            'publicationStatus'
        )
        ->where('deletionStatus',0)
        ->paginate(100);
    // dd($extypes);
    return view('expenseType.index',compact('extypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenseType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required',
            'projectId' => 'required|not_in:0',
            'publicationStatus' => 'required|not_in:0',
        ]);

        // Product::create($request->all());

        $extype = new ExpenseType();

        $extype->name = $request->name;
        $extype->projectId = $request->projectId;
        $extype->details = $request->details;
        $extype->publicationStatus = $request->publicationStatus;
        $extype->save();
        
        return redirect()->route('expenseType.index')->with('success','Expense added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenceType  $expenceType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenceType $expenceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenceType  $expenceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenceType $expenceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenceType  $expenceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenceType $expenceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenceType  $expenceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenceType $expenceType)
    {
        //
    }
}
