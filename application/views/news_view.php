<?php
echo '<h3>Newly added restaurants!</h3>';
echo '<a href='.site_url('welcome/browse_restaurants').'>Browse Restaurants</a>';

echo '<table border="1px" style="border-radius:3px">';
echo '<tr><td>Name</td><td>Address</td><td>Opening Hours</td></tr>';
foreach ($query->result() as $row)
{
    echo '<tr><td>'.$row->name.'</td><td>'.$row->address_street.$row->address_zipcode.$row->address_city.'</td><td>'.$row->opening_hours.'</td></tr>';
}
echo '</table>'

?>