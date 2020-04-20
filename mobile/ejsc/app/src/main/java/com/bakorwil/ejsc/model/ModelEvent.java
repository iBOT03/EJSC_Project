package com.bakorwil.ejsc.model;

public class ModelEvent {
    String id_event;
    String judul;
    String keterangan;
    String foto;
    String penyelenggara;
    String nama_pengisi_acara;
    String tgl_mulai;
    String tgl_selesai;
    String waktu;
    String ruangan;
    String asal_peserta;
    String jumlah_peserta;
    String status;

    public String getId_event() {
        return id_event;
    }

    public void setId_event(String id_event) {
        this.id_event = id_event;
    }

    public String getJudul() {
        return judul;
    }

    public void setJudul(String judul) {
        this.judul = judul;
    }

    public String getKeterangan() {
        return keterangan;
    }

    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }

    public String getFoto() {
        return foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }

    public String getPenyelenggara() {
        return penyelenggara;
    }

    public void setPenyelenggara(String penyelenggara) {
        this.penyelenggara = penyelenggara;
    }

    public String getNama_pengisi_acara() {
        return nama_pengisi_acara;
    }

    public void setNama_pengisi_acara(String nama_pengisi_acara) {
        this.nama_pengisi_acara = nama_pengisi_acara;
    }

    public String getTgl_mulai() {
        return tgl_mulai;
    }

    public void setTgl_mulai(String tgl_mulai) {
        this.tgl_mulai = tgl_mulai;
    }

    public String getTgl_selesai() {
        return tgl_selesai;
    }

    public void setTgl_selesai(String tgl_selesai) {
        this.tgl_selesai = tgl_selesai;
    }

    public String getWaktu() {
        return waktu;
    }

    public void setWaktu(String waktu) {
        this.waktu = waktu;
    }

    public String getRuangan() {
        return ruangan;
    }

    public void setRuangan(String ruangan) {
        this.ruangan = ruangan;
    }

    public String getAsal_peserta() {
        return asal_peserta;
    }

    public void setAsal_peserta(String asal_peserta) {
        this.asal_peserta = asal_peserta;
    }

    public String getJumlah_peserta() {
        return jumlah_peserta;
    }

    public void setJumlah_peserta(String jumlah_peserta) {
        this.jumlah_peserta = jumlah_peserta;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public ModelEvent() {
        this.id_event = id_event;
        this.judul = judul;
        this.keterangan = keterangan;
        this.foto = foto;
        this.penyelenggara = penyelenggara;
        this.nama_pengisi_acara = nama_pengisi_acara;
        this.tgl_mulai = tgl_mulai;
        this.tgl_selesai = tgl_selesai;
        this.waktu = waktu;
        this.ruangan = ruangan;
        this.asal_peserta = asal_peserta;
        this.jumlah_peserta = jumlah_peserta;
        this.status = status;
    }
}
