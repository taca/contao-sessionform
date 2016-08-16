sessionform
===========

Create multi-step forms and confirmation pages with this extension.

## Introducion

When you submit a form in TYPOlight, all data is stored in the current
user session. This allows modules or other extensions to retrieve the
same data in a later stage. This extension makes use of this feature.

## Creating confirmation pages

To create a confirmation page using this extension, follow these steps:

* Duplicate your existing form and give it a matching name (green "+" button).
* Change existing text-like fields (textarea, ...) into field type "Text from session".
* Change existing option fields (checkbox, select, ...) into field type "Option from session". Make sure you have the same option values (and they should be unique).
* Add more information, headline... as appropriate.
* Create a new page in your site structure and place the form on this page.
* Adjust the initial form to 1: forward to the confirmation page on submit, 2: do not send mails or something thelike.
 

## Creating multi-page forms

The approach is almost the same as for confirmation pages, but you can have as many pages as you want, redirecting from one to the other. If you do not want to show the previous data, use the field type "hidden" and tick the checkbox "Load session data". Be aware that the field names must be identical!

For regular fields, check the "Load session data" checkbox. This will retrieve the data from session if the users steps back.

On the last page (thank you...), place a module of type "Delete form data". This will make sure the session data is dropped and the user will not see his previous data when opening the same form again.

## Additional features

Additionally theres a field type "Calculation from session". This can be used to calculate field data from session. If you have a text field "amount" and a select for products (with price), you can calculate the total on the confirmation page.

# Known problems

There seems to be a problem with using session data/session fields in EFG mails. I'm aware of that but have not yet taken the time to investigate this problem. 
This extension is a commissional work for goatweb webdesign (www.goatweb.de).
