<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer, Budget, Invoice, User, Order, Rating};
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware(['auth', 'admin.access']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $day = date('d');

        $month = date('m');

        $year = date('Y');

        $monthlyIncome = [];

        $monthlyExpense = [];

        $order = Order::latest()->where('status', '!=', 'completed')->get();

        for ($i = 0; $i < 12 ; $i++) { 
            $monthlyIncome[$i] = Budget::where('budget', 'income')->whereMonth('updated_at', $i + 1)->whereYear('updated_at', $year)->sum('amount');

            $monthlyExpense[$i] = Budget::where('budget', 'expense')->whereMonth('updated_at', $i + 1)->whereYear('updated_at', $year)->sum('amount');
        }

        $budgetIncomeToday = Budget::where('budget', 'income')->whereDay('updated_at', $day)->sum('amount');

        $budgetExpenseToday = Budget::where('budget', 'expense')->whereDay('updated_at', $day)->sum('amount');

        $budgetIncomeMonth = Budget::where('budget', 'income')->whereMonth('updated_at', $month)->sum('amount');

        $budgetExpenseMonth = Budget::where('budget', 'expense')->whereMonth('updated_at', $month)->sum('amount');

        $budgetIncomeYear = Budget::where('budget', 'income')->whereYear('updated_at', $year)->sum('amount');

        $budgetExpenseYear = Budget::where('budget', 'expense')->whereYear('updated_at', $year)->sum('amount');

        $budget = Budget::latest()->take(8)->get();

        $customers = User::where('role', 'Customer')->get();

        $reviews = Rating::latest()->get();

        $users = User::where('role','!=', 'Customer')->get();

        return view('home', compact('users', 'customers', 'budgetIncomeToday', 'budgetExpenseToday', 'monthlyIncome', 'monthlyExpense', 'budgetIncomeMonth', 'budgetExpenseMonth', 'budgetIncomeYear', 'budgetExpenseYear', 'budget', 'order', 'reviews'));
    }
}
