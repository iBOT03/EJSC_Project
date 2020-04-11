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

public class LupaPasswordActivity extends AppCompatActivity {
    Button btnSubmit;
    TextView daftar;
    EditText edt_email;
    ProgressBar progressBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lupa_password);

        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(LupaPasswordActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_email = findViewById(R.id.edt_email);
        btnSubmit = findViewById(R.id.buttonSubmit);
        daftar = findViewById(R.id.btnDaftarSekarang);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent kodereset = new Intent(LupaPasswordActivity.this, KodeResetActivity.class);
                startActivity(kodereset);
            }
        });

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent daftar = new Intent(LupaPasswordActivity.this, DaftarActivity.class);
                startActivity(daftar);
            }
        });
    }
}
