<?php 
function get_field($table,$where,$select){
    $ci=& get_instance();
	if(!empty($select)){
		$ci->db->select($select);
	}
	$ci->db->where($where);
	return $ci->db->get($table)->row();
}
function get_all_field($table,$where,$select,$order_name,$order_type){
    $ci=& get_instance();
	if(!empty($select)){
		$ci->db->select($select);
	}
	if(!empty($order_name)){
		$ci->db->order_by($order_name,$order_type);
	}
	$ci->db->where($where);
	return $ci->db->get($table)->result();
}
function maintenance(){
	$table = 'admin';
    $ci=& get_instance();
 	$data = $ci->db->get($table)->row();
	if($data){
		if($data->maintenance == 1){
		   return 1;	
		}else{
			return 0;
		}
	} 
}
?>