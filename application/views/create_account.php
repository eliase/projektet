<?php
$username_data = array(
			'name'        => 'username',
			'id'          => 'username',
			'value'       => '',
			'maxlength'   => '100',
			'size'        => '40',
            );

$password_data = array(
			'name'        => 'password',
			'id'          => 'password',
			'value'       => '',
			'maxlength'   => '100',
			'size'        => '40',
            );

$email_data = array(
			'name'        => 'email',
			'id'          => 'email',
			'value'       => '',
			'maxlength'   => '100',
			'size'        => '40',
            );
			
$email_data2 = array(
			'name'        => 'email2',
			'id'          => 'email2',
			'value'       => '',
			'maxlength'   => '100',
			'size'        => '40',
            );

$attributes = array('class' => 'asdf', 'id' => 'create_account');
echo form_open('welcome/insert_account', $attributes);

echo "<table border='0' align='center'>";
echo "<tr><td width = '100'>";
echo "Username</td><td width = '50'>";
echo form_input($username_data);
echo "</td></tr>";

echo "<tr><td>";
echo "Password</td><td>";
echo form_password($password_data);
echo "</td></tr>";

echo "<tr><td>";
echo "Email</td><td>";
echo form_input($email_data);
echo "</td></tr>";

echo "<tr><td>";
echo "Repeat email</td><td>";
echo form_input($email_data2);
echo "</td></tr>";

echo "<tr><td></td><td align='right'>";
echo form_submit('submit', 'Create');
echo form_close();
echo "</td></tr>";
echo "</table>";
?>