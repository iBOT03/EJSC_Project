<?php
    class DataModel extends CI_Model { //extends CI_Model
        public function getData() {
            $Data = array(
                'nama' => 'Yudha',
                'status' => 'Mahasiswa',
                'website' => 'bimatech.co.id'
            );
            return $Data;
        }
    }
?>