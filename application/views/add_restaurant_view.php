<?php
//lals
$name_data = array(
			'name' => 'name',
			'type' => 'text',
			'maxlength' => '128',
			'size' => '40'
			);
$address_street_data = array(
			'name' => 'address_street',
			'type' => 'text',
			'maxlength' => '128',
			'size' => '40'
			);
$name_data = array(
			'name' => 'name',
			'maxlength' => '128',
			'size' => '40'
			);
			
$this->form_validation->set_rules('name', 'Restaurant name', 'required');

echo validation_errors();
echo form_open();
echo '
<h5>Username</h5>
<input type="text" name="name" value="" size="50" />

<h5>address_street</h5>
<input type="text" name="address_street" value="" size="50" />

<h5>address_zipcode</h5>
<input type="text" name="address_zipcode" value="" size="50" />

<h5>address_city</h5>
<input type="text" name="address_city" value="" size="50" />

<h5>address_city</h5>
<input type="text" name="opening_hours" value="" size="50" />
<h5>address_city</h5>
<input type="text" name="fastfood" value="" size="50" />
<h5>address_city</h5>
<input type="text" name="vegetarian" value="" size="50" />
<h5>address_city</h5>
<input type="text" name="takeaway" value="" size="50" />
<h5>address_city</h5>
<input type="text" name="alcohol" value="" size="50" />
<h5>address_city</h5>
<input type="text" name="kitchen" value="" size="50" />

';
echo form_submit('submit', 'Create');
echo form_close();

?>