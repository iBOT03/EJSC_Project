<?php
class DataModel extends CI_Model {
    public function getData () {
        $data = array(
            'nama' => 'Andrea',
            'status' => 'Mahasiswa',
            'website' => 'http://andrea.com'
        );
        return $data;
    }
}
?>