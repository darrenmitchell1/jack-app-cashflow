<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCashflowItemRequest;
use App\Models\CashflowItem;
use App\Models\CashflowType;
use App\Enums\RecurringPeriod;
use App\Enums\IncomeExpenditure;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\CashflowItemCollection;
use App\Http\Resources\CashflowTypeCollection;

class CashflowItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Cashflow/Index', ['cashflow_items' => (new CashflowItemCollection(CashflowItem::with(['cashflowType'])->get()))->collection]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Cashflow/Create', [
            'cashflow_types' => (new CashflowTypeCollection(CashflowType::get()))->collection,
            'recurring_periods' => RecurringPeriod::cases(),
            'income_expenditure' => IncomeExpenditure::cases()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashflowItemRequest $request)
    {
        CashflowItem::create(array_merge($request->validated(), ['uuid' => Str::orderedUuid()]));

        return Redirect::route('cashflow.index');
    }
}
