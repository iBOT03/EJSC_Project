<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_Model extends CI_Model {
    protected $booking_table = 'booking';

    /*
    * Tambah Booking Baru
    *------------------------------
    * @param: {array} Booking Data
    */
    public function tambah_booking(array $data) {
        $this->db->insert($this->booking_table, $data);
        return $this->db->insert_id();
    }

    /*
    * Delete Booking
    *------------------------------
    * @param: {array} Booking Data
    */
    public function delete_booking(array $data) {
        // Cek Booking Exists dengan ID Booking dan NIK
        $query = $this->db->get_where($this->booking_table, $data);
        if ($this->db->affected_rows() > 0) {
            
            // Delete Booking
            $this->db->delete($this->booking_table, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
            return false;
        }
        return false;
    }

    /*
    * Update Booking
    *------------------------------
    * @param: {array} Booking Data
    */
    public function update_booking(array $data) {
        // Cek Booking Exists dengan ID Booking dan NIK
        $query = $this->db->get_where($this->booking_table, [
            'ID_BOOKING' => $data['id_booking'],
            'NAMA' => $data['nama'],
            'NOMOR_TELEPON' => $data['nomor_telepon'],
            'ID_KOMUNITAS' => $data['id_komunitas'],
            'ID_RUANGAN' => $data['id_ruangan'],
            'JUMLAH_ORANG' => $data['jumlah_orang'],
            'DESKRIPSI_KEGIATAN' => $data['deskripsi_kegiatan'],
            'TUJUAN' => $data['tujuan'],
            'TANGGAL_MULAI' => $data['tanggal_mulai'],
            'DURASI' => $data['durasi'],
            'JAM_MULAI' => $data['jam_mulai'],
            'JAM_SELESAI' => $data['jam_selesai'],
            'STATUS' => $data['status'],
        ]);
        if ($this->db->affected_rows() > 0) {
            // Update Booking
            $update_data = [
                'NAMA' => $data['nama'],
                'NOMOR_TELEPON' => $data['nomor_telepon'],
                'ID_KOMUNITAS' => $data['id_komunitas'],
                'ID_RUANGAN' => $data['id_ruangan'],
                'JUMLAH_ORANG' => $data['jumlah_orang'],
                'DESKRIPSI_KEGIATAN' => $data['deskripsi_kegiatan'],
                'TUJUAN' => $data['tujuan'],
                'TANGGAL_MULAI' => $data['tanggal_mulai'],
                'DURASI' => $data['durasi'],
                'JAM_MULAI' => $data['jam_mulai'],
                'JAM_SELESAI' => $data['jam_selesai'],
                'STATUS' => $data['status'],
            ];
            return $this->db->update($this->booking_table, $update_data, ['id_booking' => $query->row('ID_BOOKING')]);
        }
        return false;
    }

    /*
    * GET Riwayat Booking
    *------------------------------
    * @param: {array} Riwayat Booking Data
    */
    public function getRiwayat($id = null) {
        // if ($id === null) {
        // return $this->db->get('booking')->result_array();
        // } else {
            return $this->db->get_where('booking', ['NIK' => $id])->result_array();
        //}
    }
}
