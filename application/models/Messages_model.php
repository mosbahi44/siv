<?php

/**
 * Class Messages_model
 */
class Messages_model extends CI_Model {
    /**
     * @var string
     */
    public $table = 'messages';

    /**
     * Messages_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id_shelter
     * @return mixed
     */
    public function getOneByShelter($id_shelter){
        $this->db->where('id_shelter', $id_shelter);
        $query = $this->db->get($this->table);
        return $query->row();
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