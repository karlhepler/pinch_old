<?php

return [
    
    'balanceSheetAccounts' => [
        App\Models\Account\Asset::class,
        App\Models\Account\Equity::class,
        App\Models\Account\Liability::class,
    ],

    'incomeStatementAccounts' => [
        App\Models\Account\Income::class,
        App\Models\Account\Expense::class,
    ],

];
