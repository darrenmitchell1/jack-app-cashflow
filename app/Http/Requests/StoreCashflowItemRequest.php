<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\RecurringPeriod;
use App\Enums\IncomeExpenditure;

class StoreCashflowItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cashflow_type_id' => 'required|exists:App\Models\CashflowType,uuid',
            'description' => 'required|string',
            'applied_from' => 'required|date:Y-m-d',
            'applied_to' => 'nullable|date:Y-m-d',
            'recurring_period' => ['required', 'string', Rule::enum(RecurringPeriod::class)],
            'income_or_expenditure'=> ['required', 'string', Rule::enum(IncomeExpenditure::class)],
            'value' => 'required|numeric:strict'
        ];        
    }
}
