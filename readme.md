Simple Paypal for Bolt
======================

This extension allows you to add simple paypal integration to bolt.

Just configure your settings in the config.yml and then put the following in your template where you want to have a pay button:

{{ paypalbutton(record.title, record.price, record.tax, record.shipping) }}

The record.tax and record.shipping are not required (but if you enabled shipping and taxes its worth using them)

Notes
-----

* You need an email address set in the config.yml (a merchant account id can also be used)

* If enabling tax, your products must have a field named tax
* If enabling shipping, your products must have a field named shipping

* There is a sandbox option in the config.yml for testing
