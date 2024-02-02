<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TotalAmount;

class TotalAmountController extends Controller
{
    public function index()
    {
        $totalAmounts = TotalAmount::all();

        return view('totalAmount.index', compact('totalAmounts'));
    }
}
