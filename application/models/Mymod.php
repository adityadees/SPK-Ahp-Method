<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model {

    public function ViewData($table){
        $res=$this->db->get($table);
        return $res->result_array();
    }

    public function InsertData($table,$data){
        $res = $this->db->insert($table, $data);
        return $res;
    }


    public function getJoinWhere($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $j=1;
        foreach($table as $table_name=>$table_id){ 
            if($j==1){$this->db->from(''.$table1.' t1');} else {
                $this->db->join(''.${'table'.$j}.' t'.$j,'t1.'.${'t'.$j.'id'}.'=t'.$j.'.'.${'t'.$j.'id'});
            }
            $j++;
        }
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }

    
    public function ViewDataWhere($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        return $res;
    }

    public function CountWhere($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        $count=$res->result();
        return count($count);
    }

    public function DeleteData($where,$table){
        $this->db->where($table);
        $res = $this->db->delete($where);
        return $res;
    }

}

?>
