<?php
class browse_restaurants_model extends CI_Model {
	
	function get_restaurants($num, $offset)
	{
		$query = $this->db->get('restaurants', $num, $offset);
		return $query;
	}
	
}
?>