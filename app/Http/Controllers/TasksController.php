<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User,Customer, Budget, Invoice, Order};
use Auth;
use Validator;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $task = Order::where('status', '!=', 'completed')->latest()->get();

        return view('tasks.index', compact('task'));
    }

    public function fetch(Request $request)
    {
     if ($request->ajax()) {
         $orderStatus = $request->orderStatus;

         $search = $request->search;

         $search = str_replace(" ", "%", $search);

         $task = Order::where('status', $orderStatus)->latest()->where('orderNumber', 'LIKE', '%'. $search. '%')->get();

         return view('tasks.data', compact('task'))->render();
     }
 }


 public function orderActions(Request $request)
 {    
     if ($request->ajax()) {

         $action = $request->actions;

         $orderStatus = $request->orderStatus;

         if(count(request('task')) == 1){
            $row = 'Order';
        }
        else{
            $row = 'Orders';
        }


        for ($i=0; $i < count(request('task')); $i++) { 

            if ($action == 'completed') {
                Order::find($request->task[$i])->update(['status' => 'completed']);
            }

            elseif ($action == 'delivering') {
                Order::find($request->task[$i])->update(['status' => 'delivering']);
            }
            elseif ($action == 'in-process') {
                Order::find($request->task[$i])->update(['status' => 'in-process']);
            }
            elseif ($action == 'cancelled') {
              Order::find($request->task[$i])->update(['status' => 'cancelled']);
          }
      }

      $msg = $row . " status updated";

      $task = Order::where('status', $orderStatus)->latest()->get();

      $view = view('tasks.data', compact('task'))->render();

      return response()->json([
        'status' => 1,
        'msg' => $msg,
        'view'  => $view,
        'numberOfRows'  => count($task)
    ]);
  }
}

public function services(Request $request)
{
    $search = $request->input('q');
    if($search){
        $complete = Services::latest()->whereDate('updated_at',$search)->where('status', 'complete')->get();
    }
    else{
        $complete = Services::latest()->where('status', 'complete')->get();
    }

    return view('tasks.services', compact('complete'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tasks)
    {
        $invoice = Invoice::where('services_id', $tasks)->first();
        $services = Services::where('id', $tasks)->first();
        $customers = Customer::orderBy('id', 'asc')->where('name', '!=', 'Removed Customer')->get();
        $wash = Wash::orderBy('price', 'asc')->get();
        $vehicles = DB::table('vehicles')->orderBy('type', 'asc')->get();
        return view('tasks.edit', compact('customers', 'wash', 'invoice', 'tasks', 'services', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tasks)
    {
//        

        $this->validates($request);

        Services::find($tasks)->update([
            'customer_id' => $request->input('customer_id'),
            'wash_id' => $request->input('wash_id'),
            'vehicleModel' => $request->input('vehicleModel'),
            'vehicleRegNo' => $request->input('vehicleRegNo'),
            'amount' => $request->input('amount'),
            'payMethod' => $request->input('payMethod'),
        ]);

        Budget::where('services_id', $tasks)->update(['amount' => $request->input('amount')]);

        return back()->withStatus(__('Task completed successfully.'));
    }



    public function complete($tasks)
    {
        Order::where('id', $tasks)->update(['status' => 5]);

        return back()->withStatus(__('Order successfully completed.'));
    }

    public function pend($tasks)
    {
        Order::where('id', $tasks)->update(['status'=> 3]);

        return back()->withStatus(__('Order successfully in-process.'));
    }

    public function delivering($tasks)
    {
        Order::where('id', $tasks)->update(['status'=> 4]);

        return back()->withStatus(__('Order successfully out for delivery.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tasks)
    {
        Order::where('id', $tasks)->update(['status' => 1]);

        Budget::where('invoice', $tasks)->delete();

        return back()->withStatus(__('Order successfully cancelled.'));
    }

}
