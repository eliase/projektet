<?php


echo $this->pagination->create_links();


echo '<h2>Restaurants</h2>';
echo $this->table->generate($results);
echo $this->pagination->create_links();
?>

