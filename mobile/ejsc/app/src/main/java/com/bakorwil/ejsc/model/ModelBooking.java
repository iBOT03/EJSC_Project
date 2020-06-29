package com.bakorwil.ejsc.model;

public class ModelBooking {
    String id_booking;
    String nik;
    String nama;
    String nomor_telepon;
    String id_komunitas;
    String id_ruangan;
    String jumlah_orang;
    String deskripsi_kegiatan;
    String tujuan;
    String tanggal_mulai;
    String durasi;
    String jam_mulai;
    String jam_selesai;
    String status;

    public String getId_booking() {
        return id_booking;
    }

    public void setId_booking(String id_booking) {
        this.id_booking = id_booking;
    }

    public String getNik() {
        return nik;
    }

    public void setNik(String nik) {
        this.nik = nik;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getNomor_telepon() {
        return nomor_telepon;
    }

    public void setNomor_telepon(String nomor_telepon) {
        this.nomor_telepon = nomor_telepon;
    }

    public String getId_komunitas() {
        return id_komunitas;
    }

    public void setId_komunitas(String id_komunitas) {
        this.id_komunitas = id_komunitas;
    }

    public String getId_ruangan() {
        return id_ruangan;
    }

    public void setId_ruangan(String id_ruangan) {
        this.id_ruangan = id_ruangan;
    }

    public String getJumlah_orang() {
        return jumlah_orang;
    }

    public void setJumlah_orang(String jumlah_orang) {
        this.jumlah_orang = jumlah_orang;
    }

    public String getDeskripsi_kegiatan() {
        return deskripsi_kegiatan;
    }

    public void setDeskripsi_kegiatan(String deskripsi_kegiatan) {
        this.deskripsi_kegiatan = deskripsi_kegiatan;
    }

    public String getTujuan() {
        return tujuan;
    }

    public void setTujuan(String tujuan) {
        this.tujuan = tujuan;
    }

    public String getTanggal_mulai() {
        return tanggal_mulai;
    }

    public void setTanggal_mulai(String tanggal_mulai) {
        this.tanggal_mulai = tanggal_mulai;
    }

    public String getDurasi() {
        return durasi;
    }

    public void setDurasi(String durasi) {
        this.durasi = durasi;
    }

    public String getJam_mulai() {
        return jam_mulai;
    }

    public void setJam_mulai(String jam_mulai) {
        this.jam_mulai = jam_mulai;
    }

    public String getJam_selesai() {
        return jam_selesai;
    }

    public void setJam_selesai(String jam_selesai) {
        this.jam_selesai = jam_selesai;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public ModelBooking() {
        this.id_booking = id_booking;
        this.nik = nik;
        this.nama = nama;
        this.nomor_telepon = nomor_telepon;
        this.id_komunitas = id_komunitas;
        this.id_ruangan = id_ruangan;
        this.jumlah_orang = jumlah_orang;
        this.deskripsi_kegiatan = deskripsi_kegiatan;
        this.tujuan = tujuan;
        this.tanggal_mulai = tanggal_mulai;
        this.jam_mulai = jam_mulai;
        this.jam_selesai = jam_selesai;
        this.status = status;
    }

}
