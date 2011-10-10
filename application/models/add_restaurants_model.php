<?php
class add_restaurants_model extends CI_Model {
	
	function restaurant_exists($name)
	{
		$this->db->select('name');
		$query = $this->db->get('restaurants');
		
		foreach($query->result() as $row)
		{
			if($row['name'] == $name)
				return true;
		}
		return false;
	}
	
	function add_restaurant($data)
	{
		if(restaurant_exists($data['name']) == true)
			return false;
		
		$insert_data = array
		       ('name' => $data['name'],
			'author' => $data['author'],
			'date' => date('Y-m-d'),
			'address_street' = $data['address_street'],
			'address_zipcode' = $data['address_zipcode'],
			'address_city' = $data['address_city'],
			'opening_hours',  = $data['opening_hours'],
			'fastfood' =  = $data['fastfood'],
			'vegetarian' = $data['vegetarian'],
			'takeaway' = $data['takeaway'],
			'alcohol' = $data['alcohol'],
			'kitchen' = $data['kitchen']);
			
		$this->db->insert('restaurants', $insert_data);
		
		return true;
		//insert userID and restaurantID
		//$this->db->insert('favorite_restaurants', )
	}
	
}
?>