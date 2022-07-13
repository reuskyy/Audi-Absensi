<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function get_employeeprofile()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        ";
        return $this->db->query($que)->result_array();
    }
    public function select_idprofile(){
        $userlogin = $this -> session ->userdata ('id_employee');
        $table = "SELECT user.*, gender.gender, agama.agama
        FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        ";
        $query=$this->db->query($table);
        return $query->result_array();
}

    public function get_agama()
    {
        $query = "SELECT * FROM agama";
        return $this->db->query($query)->result_array();
    }

    public function get_gender()
    {
        $query = "SELECT * FROM gender";
        return $this->db->query($query)->result_array();
    }

}