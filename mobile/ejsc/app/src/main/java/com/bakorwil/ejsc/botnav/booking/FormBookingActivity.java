package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.bakorwil.ejsc.R;

public class FormBookingActivity extends AppCompatActivity {
    EditText nama, telepon, komunitas, nama_ruangan, tanggal, jam_mulai, durasi, jam_selesai, jumlah_peserta, tujuan, deskripsi;
	String ex_nama_ruangan, ex_kapasitas;
	Button btn_booking_sekarang;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.form_booking);

		//Get intent parsing data dari DetailRuangan
		ex_nama_ruangan = getIntent().getStringExtra("nama_ruangan");
		ex_kapasitas = getIntent().getStringExtra("kapasitas");

        nama = findViewById(R.id.edt_nama);
        telepon = findViewById(R.id.edt_telepon);
        komunitas = findViewById(R.id.edt_komunitas);
        nama_ruangan = findViewById(R.id.edt_nama_ruangan);
        tanggal = findViewById(R.id.edt_tanggal);
        jam_mulai = findViewById(R.id.edt_jam_mulai);
        durasi = findViewById(R.id.edt_durasi);
        jam_selesai = findViewById(R.id.edt_jam_selesai);
        jumlah_peserta = findViewById(R.id.edt_jumlah_peserta);
        tujuan = findViewById(R.id.edt_tujuan);
        deskripsi = findViewById(R.id.edt_deskripsi_kegiatan);
    }
}
