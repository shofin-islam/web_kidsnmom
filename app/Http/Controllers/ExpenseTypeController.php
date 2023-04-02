<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;
use App\Classes\UserProjectInfo;
use DB;
use Auth;

class ExpenseTypeController extends Controller
{

    function __construct()

    {

         $this->middleware('permission:expense-type-list|expense-type-create|expense-type-edit|expense-type-delete', ['only' => ['index','show']]);

         $this->middleware('permission:expense-type-create', ['only' => ['create','store']]);

         $this->middleware('permission:expense-type-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:expense-type-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfo = new UserProjectInfo;

        $extypes = ExpenseType::select(
            'expense_types.id',
            'expense_types.projectId',
            'expense_types.name', 
            'expense_types.details',
            'expense_types.publicationStatus',
            'projects.name as projectName'
        )
        ->join('projects', 'expense_types.projectId', '=', 'projects.id')
        ->where('expense_types.deletionStatus',0)
        ->whereIn('expense_types.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->paginate(500);
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
        $projectInfo = new UserProjectInfo;
        return view('expenseType.create',['Projects'=>$projectInfo->getUserProjectName()]);
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
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseType $expenseType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $ext = ExpenseType::find($id);
        // dd($ext);
        $ext->deletionStatus = 1;
        $ext->save();
        return redirect()->route('expenseType.index')->with('success','Expense Deleted.');
    }
}
