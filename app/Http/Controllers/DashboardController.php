<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Expense;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // sales total salled in last 30 days
        $salesTotal = Sale::where('created_at', '>=', now()->subDays(30))->sum('price');

        // expenses total in last 30 days
        $expensesTotal = Expense::where('created_at', '>=', now()->subDays(30))->sum('amount');

        // last 5 sales
        $lastSales = Sale::latest()->take(5)->get();

        // last 5 expenses
        $lastExpenses = Expense::latest()->take(5)->get();

        // most seled products by quantity
        $mostSelledProducts = Bill::select('products.name as name', DB::raw('sum(quantity) as total'))
            ->leftJoin('products', 'bills.product_id', '=', 'products.id')
            ->where('bills.created_at', '>=', now()->subDays(30))
            ->groupBy('products.name')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // most seled products by category
        $mostSelledByCategory = Bill::select('categories.name as name', DB::raw('sum(quantity) as total'))
            ->leftJoin('products', 'bills.product_id', '=', 'products.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->where('bills.created_at', '>=', now()->subDays(30))
            ->groupBy('categories.name')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // users who selled the most by sales count
        $mostSelledByUser = Sale::select('users.name as name', DB::raw('count(*) as total'))
            ->leftJoin('users', 'sales.created_by', '=', 'users.id')
            ->where('sales.created_at', '>=', now()->subDays(30))
            ->groupBy('users.name')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'salesTotal',
            'expensesTotal',
            'lastSales',
            'lastExpenses',
            'mostSelledProducts',
            'mostSelledByCategory',
            'mostSelledByUser'
        ));
    }
}
