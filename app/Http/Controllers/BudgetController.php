<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budget;

use Auth;

use PDF;


class BudgetController extends Controller
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

        $budget = Budget::latest()->get();

        $totalIncome = Budget::where('budget', 'income')->sum('amount');

        $totalExpense = Budget::where('budget', 'expense')->sum('amount');

        return view('budget.index', compact('budget', 'totalIncome', 'totalExpense'));
    }

    public function fetch(Request $request)
    {
        if($request->ajax()){
            $budgetType    = $request->budget;
            $from_date     = $request->from_date;
            $to_date       = $request->to_date;

            if($budgetType == 'all'){
                $budget = Budget::whereBetween('created_at', [$from_date, $to_date])->latest()->get();
            }else{
                $budget = Budget::where('budget', $budgetType)->whereBetween('created_at', [$from_date, $to_date])->latest()->get();
            }

            $totalIncome = Budget::where('budget', 'income')->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

            $totalExpense = Budget::where('budget', 'expense')->whereBetween('created_at', [$from_date, $to_date])->sum('amount');
            

            return view('budget.data', compact('budget', 'totalIncome', 'totalExpense'))->render();
        }
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
        if($request->ajax()){

            $input = $request->all();

            Auth::user()->budget()->create($input);
        }
    }

    public function generateBudgetPDF(Request $request){
        if($request->ajax()){

         $budgetType    = $request->budget;
         $from_date     = $request->from_date;
         $to_date       = $request->to_date;

         if($budgetType == 'all'){
            $budget = Budget::whereBetween('created_at', [$from_date, $to_date])->latest()->get();
        }else{
            $budget = Budget::where('budget', $budgetType)->whereBetween('created_at', [$from_date, $to_date])->latest()->get();
        }

        $totalIncome = Budget::where('budget', 'income')->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

        $totalExpense = Budget::where('budget', 'expense')->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

        $pdf = PDF::loadView('budget.template', [
            'budget' => $budget,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense
        ]); 

        return $pdf->download('DECRAFT_BUDGET.pdf');
    }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validates(Request $request)
    {

       if ($request->ajax()) {

        $validation = \Validator::make($request->all(),[
            'budget'  => 'required',
            'description'  => 'required',
            'amount'  => ['required', 'numeric', 'min:0']
        ],
        [
            'budget.required'  => 'Budget type field is required.',
            'description.required'  => 'Reference field is required.'
        ]);

        if (!$validation->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validation->errors()->toArray(),
                'error_length' => $validation->errors()->all(),
            ]);
        } 
    }
}
}
