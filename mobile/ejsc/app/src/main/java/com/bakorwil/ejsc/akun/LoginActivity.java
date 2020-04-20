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
import android.widget.Toast;

import com.bakorwil.ejsc.BottomNavigation;
import com.bakorwil.ejsc.R;

public class LoginActivity extends AppCompatActivity {
    Button btnMasuk;
    TextView daftar, lupaPassword;
    EditText edt_email, edt_kata_sandi;
    ProgressBar progressBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(LoginActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_email = findViewById(R.id.edt_email);
        edt_kata_sandi = findViewById(R.id.edt_kata_sandi);
        lupaPassword = findViewById(R.id.btnLupaPassword);
        btnMasuk = findViewById(R.id.buttonMasuk);
        daftar = findViewById(R.id.btnDaftarSekarang);

        btnMasuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                progressDialog.setMessage("Tunggu Beberapa Saat");
                progressDialog.show();
                progressBar.setVisibility(View.VISIBLE);

                if (edt_email.getText().toString().isEmpty()) {
                    Toast.makeText(LoginActivity.this, "Email Tidak Boleh Kosong", Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_kata_sandi.getText().toString().isEmpty()) {
                    Toast.makeText(LoginActivity.this, "Kata Sandi Tidak Boleh Kosong", Toast.LENGTH_LONG).show();
                }
                Intent bottomnavigation = new Intent(LoginActivity.this, BottomNavigation.class);
                startActivity(bottomnavigation);
            }
        });

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent daftarakun = new Intent(LoginActivity.this, DaftarActivity.class);
                startActivity(daftarakun);
            }
        });

        lupaPassword.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent lupaPass = new Intent(LoginActivity.this, LupaPasswordActivity.class);
                startActivity(lupaPass);
            }
        });
    }
}
