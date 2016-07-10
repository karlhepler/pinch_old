<?php

return [

    'accountTypes' => [
        'asset'        => App\Models\Account\Asset::class,
        'equity'       => App\Models\Account\Equity::class,
        'expense'      => App\Models\Account\Expense::class,
        'income'       => App\Models\Account\Income::class,
        'liability'    => App\Models\Account\Liability::class,
    ],

    'splitTypes' => [
        'credit' => App\Models\Split\Credit::class,
        'debit'  => App\Models\Split\Debit::class,
    ],
    
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