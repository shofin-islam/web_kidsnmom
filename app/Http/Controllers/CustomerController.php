<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::select(
            'id',
            'projectId',
            'name', 
            'address',
            'phoneNumber',
            'publicationStatus'
        )
        ->where('deletionStatus',0)
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
        return view('customers.create');
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
        $customer_id = $customer->id;
        $customerById = DB::table('customers')
                ->select('customers.*')
                ->where('customers.id', $customer_id)
                ->first();
                // dd($customerById);
        return view('customers.edit', ['customer' => $customerById]);
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
