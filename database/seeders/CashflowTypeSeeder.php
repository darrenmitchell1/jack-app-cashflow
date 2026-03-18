<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\CashflowType;

class CashflowTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'code' => 'equipment_purchase',
                'name' => 'Equipment Purchase',
                'description' => 'Purchase of Equipment',
            ], [
                'code' => 'equipment_hire',
                'name' => 'Equipment Hire',
                'description' => 'Hire of Equipment',
            ], [
                'code' => 'labour',
                'name' => 'Labour',
                'description' => 'Labour Hire',
            ], [
                'code' => 'permit',
                'name' => 'Permit',
                'description' => 'Permit Cost',
            ], [
                'code' => 'equipment_sale',
                'name' => 'Sale of Equipment',
                'description' => 'Sale of Equipment',
            ], [
                'code' => 'equipment_lease',
                'name' => 'Lease of Equipment',
                'description' => 'Lease of Equipment to Third Paty',
            ]
        ];

        foreach ($types as $type) {
            $cashflowType = CashflowTYpe::where('code', $type['code'])
                ->orWhere('name', $type['name'])
                ->first();

            if (!($cashflowType instanceof CashflowType)) {
                CashflowType::factory()->create($type);
            }
        }
    }
}
