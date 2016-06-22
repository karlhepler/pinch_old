<?php

return [

    'account_types' => [
        'asset'        => App\Models\Account\Asset::class,
        'contra_asset' => App\Models\Account\ContraAsset::class,
        'equity'       => App\Models\Account\Equity::class,
        'expense'      => App\Models\Account\Expense::class,
        'income'       => App\Models\Account\Income::class,
        'liability'    => App\Models\Account\Liability::class,
    ],

    'split_types' => [
        'credit' => App\Models\Split\Credit::class,
        'debit'  => App\Models\Split\Debit::class,
    ],
    
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