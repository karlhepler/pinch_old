BUDGET
======

## Money
* value (cents)
* other formatting functions
* different currency representations

## Account
This is the base account object that all accounts descend from
List of Splits/Ledger Entries that pertain to it
name
code number?
description
notes
Points to the commodity (aka. vendor/payer) used for all splits in this Ledger/Account
the currency that all child splits exist in ('USD')

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
List of splits/ledger entries - Transaction Ledger
transacted_at
currency to calculate all splits in
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