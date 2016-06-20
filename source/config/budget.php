<?php

return [
    
    'balance_sheet_accounts' => [
        App\Models\Account\Asset::class,
        App\Models\Account\ContraAsset::class,
        App\Models\Account\Equity::class,
        App\Models\Account\Liability::class,
    ],

    'income_statement_accounts' => [
        App\Models\Account\Income::class,
        App\Models\Account\Expense::class,
    ],

];