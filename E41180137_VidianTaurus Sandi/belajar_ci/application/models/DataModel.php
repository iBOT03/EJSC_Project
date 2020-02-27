<?php
class DataModel extends CI_Model { //mengextends CI_Model
    public function getData () {
        $data = array(
            'nama' => 'Frengki',
            'status' => 'Mahasiswa',
            'website' => 'http://frengki.com'
        );
        return $data;
    }
}
?>