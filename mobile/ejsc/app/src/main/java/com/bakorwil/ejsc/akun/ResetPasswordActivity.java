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

public class ResetPasswordActivity extends AppCompatActivity {
    Button btnSubmit;
    TextView daftar;
    EditText edt_password_baru, edt_kofirmasi_password_baru;
    ProgressBar progressBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reset_password);

        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(ResetPasswordActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_password_baru = findViewById(R.id.edt_password_baru);
        edt_kofirmasi_password_baru = findViewById(R.id.edt_confirm_password_daftar);
        btnSubmit = findViewById(R.id.buttonSubmit);
        daftar = findViewById(R.id.tvDaftarSekarang);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent kodereset = new Intent(ResetPasswordActivity.this, LoginActivity.class);
                startActivity(kodereset);
            }
        });

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent daftar = new Intent(ResetPasswordActivity.this, DaftarActivity.class);
                startActivity(daftar);
            }
        });
    }
}
