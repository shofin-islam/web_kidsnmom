<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ExpenseType;
use App\Classes\UserProjectInfo;
use DB;

class ExpenseController extends Controller
{
    function __construct()

    {

         $this->middleware('permission:expense-list|expense-create|expense-edit|expense-delete', ['only' => ['index','show']]);

         $this->middleware('permission:expense-create', ['only' => ['create','store']]);

         $this->middleware('permission:expense-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:expense-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfo = new UserProjectInfo;

        $expenses = Expense::select(
            'expenses.id', 
            'expenses.type',
            'expenses.details',
            'expenses.amount',
            'expenses.projectId',
            'expense_types.name',
            'projects.name as projectName'
        )
        ->join('expense_types', 'expenses.type', '=', 'expense_types.id')
        ->join('projects', 'expenses.projectId', '=', 'projects.id')
        ->whereIn('expenses.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->where('expenses.deletionStatus',0)
        ->paginate(2000);

    return view('expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectInfo = new UserProjectInfo;
        $extypes = ExpenseType::where('deletionStatus',0)->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))->get();

        return view('expense.create',['extypes'=>$extypes ,'Projects'=>$projectInfo->getUserProjectName()]);
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
        $projectInfo = new UserProjectInfo;

        $expenseId = $expense->id;
        $expenseById = DB::table('expenses')
                ->join('expense_types', 'expenses.type', '=', 'expense_types.id')
                ->join('projects', 'expenses.projectId', '=', 'projects.id')
                ->select('expenses.*','expense_types.name as name','projects.name as projectName')
                ->where('expenses.id', $expenseId)
                ->first();

        $extypes = ExpenseType::where('deletionStatus', 0)->whereIn('projectId', $projectInfo->getUserProjectId()->pluck('project_id'))->get();
        
        // dd($expenseById);

        return view('expense.edit',['expenseById' => $expenseById,'extypes' => $extypes,'Projects'=>$projectInfo->getUserProjectName()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'details' => 'required',
            'projectId' => 'required|not_in:0',
            'type' => 'required|not_in:0',
            'amount' => 'required|numeric|gt:0',
        ]);
        // dd($request);
        $expenseById = Expense::find($id);
        $expenseById->type = $request->type;
        $expenseById->details = $request->details;
        $expenseById->projectId = $request->projectId;
        $expenseById->amount = $request->amount;
        $expenseById->save();
        // dd($expenseById);
        return redirect()->route('expense.index')->with('success','Expense updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->deletionStatus = 1;
        $expense->save();
        return redirect()->route('expense.index')->with('success','Expense deleted successfully') ;

    }
}
