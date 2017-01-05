<?php

/**
 * Class Notifications_model
 */
class Notifications_model extends CI_Model {
    /**
     * @var string
     */
    public $table = 'logs';

    /**
     * Notifications_model constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $id_shelter
     * @param $message
     */
    public function push($id_shelter, $message){

        $this->db->where('id', $id_shelter);
        $query = $this->db->get('shelters');
        $shelter = $query->row();
        if($shelter):
            $data = array(
                'mac' => $shelter->mac,
                'message' => $message,
                'response' => 2,
                'date' => date('Y-m-d H:i:s')
            );
            $this->db->insert($this->table, $data);
            $id = $this->db->insert_id();

            Notifications_model::sendGCM($id, $message);
        
        endif;

    }

    /**
     * @return mixed
     */
    public function getAll(){
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * @param $message
     * @param $id
     */
    function sendGCM($message, $id) {

        $key = 'AIzaSyDudhv0pgSoMOYhBpJtsSAKp3jM-QeEe54';

        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array (
            'registration_ids' => array (
                $id
            ),
            'data' => array (
                "message" => $message
            )
        );
        $fields = json_encode ( $fields );

        $headers = array (
            'Authorization: key=' . $key,
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        curl_close ( $ch );
        $this->load->helper('file');
        write_file('./log.txt', json_encode($result));
    }
}