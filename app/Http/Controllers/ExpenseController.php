<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ExpenseType;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $expenses = Expense::select(
            'expenses.id', 
            'expenses.type',
            'expenses.details',
            'expenses.amount',
            'expenses.projectId',
            'expense_types.name',
        )
        ->join('expense_types', 'expenses.type', '=', 'expense_types.id')
        ->paginate(100);

        // $expenses = Expense::where('deletionStatus',0)->get();

    // dd($expenses);
    return view('expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extypes = ExpenseType::where('deletionStatus',0)->get();
    // dd($extypes);

        return view('expense.create',compact('extypes'));
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

            'details' => 'required',
            'projectId' => 'required|not_in:0',
            'type' => 'required|not_in:0',
            'amount' => 'required|numeric|gt:0',
        ]);

        // Product::create($request->all());

        $expense = new Expense();

        $expense->type = $request->type;
        $expense->details = $request->details;
        $expense->projectId = $request->projectId;
        $expense->amount = $request->amount;
        $expense->save();
        
        return redirect()->route('expense.index')->with('success','expense added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
