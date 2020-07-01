package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.main.BottomNavigation;

public class InvoiceActivity extends AppCompatActivity {
    TextView tanggal, jam_mulai, jam_selesai, status, nama_lengkap, komunitas, nama_ruangan, jumlah_peserta, tujuan, deskripsi;
    String id_booking, id_ruangan, id_komunitas, nik;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String[] status_booking = {"", "Aktif", "Pending", "Selesai", "Batal"};
    String xid_komunitas, xnama, xtelepon, xid_ruangan, xtanggal_mulai, xjam_mulai, xjam_selesai, xjumlah_orang, xtujuan, xdeskripsi, xdurasi, xstatus;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_invoice);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        //Get intent parsing data dari FormBooking
        xnama = getIntent().getStringExtra("nama");
        xtelepon = getIntent().getStringExtra("no_telepon");
        xid_komunitas = getIntent().getStringExtra("id_komunitas");
        xid_ruangan = getIntent().getStringExtra("id_ruangan");
        xjumlah_orang = getIntent().getStringExtra("jumlah_orang");
        xdeskripsi = getIntent().getStringExtra("deskripsi");
        xtujuan = getIntent().getStringExtra("tujuan");
        xtanggal_mulai = getIntent().getStringExtra("tanggal_mulai");
        xdurasi = getIntent().getStringExtra("durasi");
        xjam_mulai = getIntent().getStringExtra("jam_mulai");
        xjam_selesai = getIntent().getStringExtra("jam_selesai");
        xstatus = getIntent().getStringExtra("status");

        Log.e("NAMA", "" + xnama);
        Log.e("TELEPON", "" + xtelepon);
        Log.e("KOMUNITAS", "" + xid_komunitas);
        Log.e("RUANGAN", "" + xid_ruangan);
        Log.e("JUMLAHORANG", "" + xjumlah_orang);
        Log.e("DESKRIPSI", "" + xdeskripsi);
        Log.e("TUJUAN", "" + xtujuan);
        Log.e("TANGGAL", "" + xtanggal_mulai);
        Log.e("DURASI", "" + xdurasi);
        Log.e("JAMMULAI", "" + xjam_mulai);
        Log.e("JAMSELESAI", "" + xjam_selesai);
        Log.e("STATUS", "" + xstatus);

        tanggal = findViewById(R.id.tv_tanggal_mulai);
        jam_mulai = findViewById(R.id.tv_jam_mulai);
        jam_selesai = findViewById(R.id.tv_jam_selesai);
        status = findViewById(R.id.tv_status);
        nama_lengkap = findViewById(R.id.tv_nama_pemesan);
        komunitas = findViewById(R.id.tv_nama_komunitas);
        nama_ruangan = findViewById(R.id.tv_nama_ruangan);
        jumlah_peserta = findViewById(R.id.tv_jumlah_orang);
        tujuan = findViewById(R.id.tv_tujuan);
        deskripsi = findViewById(R.id.tv_deskripsi_kegiatan);

        tanggal.setText(xtanggal_mulai);
        jam_mulai.setText(xjam_mulai);
        jam_selesai.setText(xjam_selesai);
        status.setText(xstatus);
        nama_lengkap.setText(xnama);
        komunitas.setText(xid_komunitas);
        nama_ruangan.setText(xid_ruangan);
        jumlah_peserta.setText(xjumlah_orang);
        tujuan.setText(xtujuan);
        deskripsi.setText(xdeskripsi);
    }
}