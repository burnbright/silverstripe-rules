# SilverStripe business rules module

This module forms a basis for defining business rules, each with varying
conditions, and the actions to perform when rule conditions are met.

The module makes use of the [Ruler](https://github.com/bobthecow/Ruler) php
rules library.

## Database representation

Store rules in database representation:
Rule dataobject
Each rule has a conditions tree, that is conditions can be nested.

## Evaluating rules

Evalulate rules - check if rule applies


## Perfoming actions

Each rule will have actions to perform when the rule matches.



## CMS rules interface

Rules can be added to an ordered GridField.
Each rule has the folowing tabs: Main, Conditions, Actions

Main tab contains general info about the rule (name, isactive, description),
and some high-level conditions: valid period, coupon code, max uses,
customer group etc.

The conditions tab will have a specialised interface,
for defining the conditions associated to the rule. These conditions can take
many different forms, and apply to different aspects of a product, order, or the
environment.