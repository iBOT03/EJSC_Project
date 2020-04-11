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

public class KodeResetActivity extends AppCompatActivity {
    Button btnSubmit;
    TextView daftar;
    EditText edt_kode_reset;
    ProgressBar progressBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kode_reset);

        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(KodeResetActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_kode_reset = findViewById(R.id.edt_kode_reset);
        btnSubmit = findViewById(R.id.buttonSubmit);
        daftar = findViewById(R.id.btnDaftarSekarang);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent reset = new Intent(KodeResetActivity.this, ResetPasswordActivity.class);
                startActivity(reset);
            }
        });

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent daftar = new Intent(KodeResetActivity.this, DaftarActivity.class);
                startActivity(daftar);
            }
        });
    }
}
