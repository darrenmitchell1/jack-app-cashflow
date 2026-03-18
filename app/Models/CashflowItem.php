<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\RecurringPeriod;
use App\Enums\IncomeExpenditure;

class CashflowItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'cashflow_type_id',
        'description',
        'applied_from',
        'applied_to',
        'recurring_period',
        'income_or_expenditure',
        'value'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'applied_from' => 'datetime',
            'applied_to' => 'datetime',
            'recurring_period' => RecurringPeriod::class,
            'income_or_expenditure' => IncomeExpenditure::class,
        ];
    }

    /**
     * Get the Cashflow Type for the Item
     */
    public function cashflowType(): BelongsTo
    {
        return $this->belongsTo(CashflowType::class);
    }
}
