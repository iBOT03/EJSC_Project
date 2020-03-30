package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.bakorwil.ejsc.R;

public class DaftarActivity extends AppCompatActivity {
    Button btnDaftar, btnPilihKomunitas;
    TextView masuk;
    EditText edt_password, edt_kofirmasi_password, edt_nik, edt_nama, edt_email,
            edt_nomor_telepon, edt_alamat;
    ProgressBar progressBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar);

        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(DaftarActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_nik = findViewById(R.id.edt_nik);
        edt_nama = findViewById(R.id.edt_nama);
        edt_email = findViewById(R.id.edt_email);
        btnPilihKomunitas = findViewById(R.id.btnPilihKomunitas);
        edt_nomor_telepon = findViewById(R.id.edt_nomor_telepon);
        edt_alamat = findViewById(R.id.edt_alamat);
        edt_password = findViewById(R.id.edt_password);
        edt_kofirmasi_password = findViewById(R.id.edt_confirm_password_daftar);
        btnDaftar = findViewById(R.id.buttonDaftar);
        masuk = findViewById(R.id.btnMasuk);

        btnDaftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent kodereset = new Intent(DaftarActivity.this, LoginActivity.class);
                startActivity(kodereset);
            }
        });

        masuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent kodereset = new Intent(DaftarActivity.this, LoginActivity.class);
                startActivity(kodereset);
            }
        });
    }
}
