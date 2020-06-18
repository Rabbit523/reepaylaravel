<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AddInvoiceStatusesSeeder extends Seeder
{
    const STATUSES = [
        'created',
        'pending',
        'dunning',
        'settled',
        'cancelled',
        'authorized',
        'failed'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::STATUSES as $item) {
            DB::table('invoice_statuses')->insert([
                'name' => $item,
            ]);
        }
    }
}
