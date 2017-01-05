<?php

/**
 * Class Users_model
 */
class Users_model extends CI_Model {
    /**
     * @var string
     */
    public $table = 'users';

    /**
     * Users_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email){
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function getByRole($id_role){
        $this->db->where('id_role', $id_role);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * @param $data
     */
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    /**
     * @param $id
     * @param $data
     */
    public function update($id, $data)
    {
        $this->db->update($this->table, $data, array('id' => $id));
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->db->delete($this->table, array('id' => $id));
    }

}