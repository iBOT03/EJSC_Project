package com.bakorwil.ejsc.model;

public class ModelRuangan {
    String id_ruangan;
    String foto_ruangan;
    String nama_ruangan;
    String kapasitas;

    public String getId_ruangan() {
        return id_ruangan;
    }

    public void setId_ruangan(String id_ruangan) {
        this.id_ruangan = id_ruangan;
    }

    public String getFoto_ruangan() {
        return foto_ruangan;
    }

    public void setFoto_ruangan(String foto_ruangan) {
        this.foto_ruangan = foto_ruangan;
    }

    public String getNama_ruangan() {
        return nama_ruangan;
    }

    public void setNama_ruangan(String nama_ruangan) {
        this.nama_ruangan = nama_ruangan;
    }

    public String getKapasitas() {
        return kapasitas;
    }

    public void setKapasitas(String kapasitas) {
        this.kapasitas = kapasitas;
    }

    public ModelRuangan() {
        this.id_ruangan = id_ruangan;
        this.foto_ruangan = foto_ruangan;
        this.nama_ruangan = nama_ruangan;
        this.kapasitas = kapasitas;
    }
}
