Flash
=====

A simple Kohana 3 flash message module.

Installation
------------

Put the code in your KO3 modules/ dir and update your bootstrap.php file to include this module.

Usage
-----

To queue a message use: 

	Flash::factory()->add('Your record has been saved.');

To display the flash messages add this to your view/template:

	<?=Flash::factory()->render()?>
