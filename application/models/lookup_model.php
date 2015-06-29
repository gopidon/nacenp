<?php 

class Lookup_model extends CI_Model
{
    function get_lookup_vals($type){
        $db_str = 'select lookup_val, lookup_display_val from nacenp_lookups where lookup_code = ? order by lookup_val_display_order';
        $query = $this->db->query($db_str, array($type));
        return $query->result();
    }



}