<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\CashflowItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CashflowItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var CashflowItem $this */

        return [
            'uuid' => $this->uuid,
            'cashflow_type' => $this->whenLoaded('cashflowType', fn () => $this->cashflowType->toResource()),
            'description' => $this->description,
            'applied_from' => $this->applied_from->format('Y-m-d'),
            'applied_to' => $this->applied_to->format('Y-m-d'),
            'recurring_period' => $this->recurring_period,
            'income_or_expenditure' => $this->income_or_expenditure,
            'value' => $this->value,
        ];
    }
}
