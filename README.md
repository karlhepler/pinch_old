PINCH
======

## Money
* value (cents)
* other formatting functions
* different currency representations

## Account
This is the base account object that all accounts descend from
List of Splits/Ledger Entries that pertain to it
name
description
<!-- notes -->
<!-- Points to the commodity (aka. vendor/payer) used for all splits in this Ledger/Account -->
<!-- the currency that all child splits exist in ('USD') -->

## Credit > Account
This is a credit account type
A debit decreases the balance
A credit increases the balance

## Debit > Account
This is a debit account type
A debit increases the balance
A credit decreases the balance

Permanent Accounts
## Liability > Credit
## Equity > Credit
## Asset > Debit

Temporary/Nominal Accounts
## Expense > Debit
## Income > Credit

# Equation
Assets = Liability + Equity
Assets - Liabilities = Equity + (Income - Expenses)

-------

## Journal
List of transactions in chronological order

## Transaction
List of splits/ledger entries
transacted_at
<!-- currency to calculate all splits in -->
description
id number
sum of all splits must be 0

## Ledger
group/book/collection of related accounts

## LedgerEntry (aka. Split / Record)
amount / MONEY
Points to one account
Points to one parent transaction
memo
reconciled flag & timestamp - possibly a RECONCILITION object

## Commodity (aka. vendor/payer)

## Reconcilition



-------

Income Statement Accounts
**Revenue** is what you earn
**Expense** is a bill you must pay

Balance Sheet Accounts
**Asset** is what you own
**Liability** is what you owe
**Equity** is your investment in the company

Basically, the journal entry describes which accounts are affected with debits & credits
The transaction itself is the facilitator, which creates the journal entry
A ledger entry must also be created that matches the journal entry
This can be done at the same time with computer systems

At the end of the year, we make an income statement & a balance sheet
However, the balance sheet won't balance unless:
1. We flush the income statement accounts into "retained earnings" (Income - Expenses)
2. We put "retained earnings" under equity and this balances the balance sheet
