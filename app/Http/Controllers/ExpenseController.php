<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Transaction;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function edit(){
        $wp_expense = Expense::find(1)->price;
        $np_expense = Expense::find(2)->price;
        return view('panel.expenses.edit',compact('wp_expense','np_expense'));
    }

    public function update(Request $request){

        $this->validate($request,[
            'wp_expense' => 'required',
            'np_expense' => 'required'
        ],[
            'wp_expense.required' => 'وارد کردن هزینه برنامه تمرینی الزامی است.',
            'np_expense.required' => 'وارد کردن هزینه برنامه غذایی الزامی است.',
        ]);

        $wp_expense = Expense::find(1);
        $wp_expense->price = $request->wp_expense;
        $wp_expense->save();

        $np_expense = Expense::find(2);
        $np_expense->price = $request->np_expense;
        $np_expense->save();

        return redirect()->back();
    }

    public function transactions(){
        $transactions = Transaction::all();
        return view('panel.expenses.transactions',compact('transactions'));
    }
}
