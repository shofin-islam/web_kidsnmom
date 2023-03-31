<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Classes\UserProjectInfo;
use DB;

class CustomerController extends Controller
{

    function __construct()

    {

         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','show']]);

         $this->middleware('permission:customer-create', ['only' => ['create','store']]);

         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectInfo = new UserProjectInfo;
        $customers = Customer::select(
            'customers.*',
            'projects.name as projectName'
        )
        ->join('projects', 'customers.projectId', '=', 'projects.id')
        ->whereIn('customers.projectId', $projectInfo->getUserProjectId()->pluck('project_id'))
        ->where('customers.deletionStatus',0)
        ->paginate(100);
    // dd($customers);
    return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectInfo = new UserProjectInfo;

        return view('customers.create',['Projects'=>$projectInfo->getUserProjectName()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',
            'phoneNumber' => 'required|numeric|digits:11',
            'projectId' => 'required|not_in:0',
            'address' => 'required',
            'publicationStatus' => 'required|not_in:0',
        ]);

        // Product::create($request->all());

        $customer = new Customer();

        $customer->name = $request->name;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->projectId = $request->projectId;
        $customer->address = $request->address;
        $customer->publicationStatus = $request->publicationStatus;
        $customer->save();
        
        return redirect()->route('customers.index')->with('success','Customer addes successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer_id = $customer->id;
        $customerById = DB::table('customers')
                ->select('customers.*')
                ->where('customers.id', $customer_id)
                ->first();
                // dd($customerById);
        return view('customers.show', ['customer' => $customerById]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $projectInfo = new UserProjectInfo;

        $customer_id = $customer->id;
        $customerById = DB::table('customers')
                ->select('customers.*')
                ->where('customers.id', $customer_id)
                ->first();
                // dd($customerById);
        return view('customers.edit', ['customer' => $customerById,'Projects'=>$projectInfo->getUserProjectName()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([

            'name' => 'required',
            'phoneNumber' => 'required|numeric|digits:11',
            'projectId' => 'required|not_in:0',
            'address' => 'required',
            'publicationStatus' => 'required|not_in:0',
        ]);

        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->projectId = $request->projectId;
        $customer->address = $request->address;
        $customer->publicationStatus = $request->publicationStatus;
        $customer->save();
        return redirect()->route('customers.index')->with('success','Customer updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->deletionStatus = 1;
        $customer->save();
        return redirect()->route('customers.index')->with('success','Customer deleted successfully') ;
    }
}
