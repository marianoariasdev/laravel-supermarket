<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('expenses.create', compact('suppliers'));
    }

    public function store(StoreExpenseRequest $request)
    {
        Expense::create($request->validated());
        return redirect()->route('expenses.index');
    }

    public function edit(Expense $expense)
    {
        $suppliers = Supplier::all();
        return view('expenses.edit', compact('expense', 'suppliers'));
    }

    public function update(StoreExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());
        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index');
    }
}
