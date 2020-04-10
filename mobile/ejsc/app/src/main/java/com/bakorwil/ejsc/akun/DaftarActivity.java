package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bakorwil.ejsc.R;

import java.util.HashMap;
import java.util.Map;

public class DaftarActivity extends AppCompatActivity {
    Button btnDaftar, btnPilihKomunitas;
    TextView masuk;
    EditText edt_nik, edt_nama, edt_email, edt_nomor_telepon,  edt_alamat, edt_password, edt_kofirmasi_password;
    String NIKHolder, NamaHolder, EmailHolder, TeleponHolder, AlamatHolder, PasswordHolder, ConfirmPasswordHolder;
    RequestQueue requestQueue;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.1.5/ejsc/user_registration.php";
    Boolean CheckEditText;

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
                progressDialog.setMessage("Tunggu Beberapa Saat");
                progressDialog.show();
                progressBar.setVisibility(View.VISIBLE);

                CheckEditTextIsEmptyOrNot();

                if (CheckEditText) {
                    UserRegistration();
                } else if (edt_nik.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "NIK Tidak Boleh Kosong",
                            Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_nama.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Nama Tidak Boleh Kosong",
                            Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_email.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Email Tidak Boleh Kosong",
                            Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_nomor_telepon.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Nomor Telepon Tidak Boleh Kosong",
                            Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_alamat.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Alamat Tidak Boleh Kosong",
                            Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                } else if (edt_password.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Kata Sandi Tidak Boleh Kosong",
                            Toast.LENGTH_SHORT).show();
                    progressDialog.dismiss();
                } else if (!edt_password.getText().toString().equals(edt_kofirmasi_password.getText().toString())) {
                    Toast.makeText(DaftarActivity.this, "Kata Sandi Harus sama",
                            Toast.LENGTH_SHORT).show();
                    progressDialog.dismiss();
                }
            }
        });

        masuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent masuk = new Intent(DaftarActivity.this, LoginActivity.class);
                startActivity(masuk);
            }
        });
    }

    public void UserRegistration() {
        progressDialog.setMessage("Harap Tunggu");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {
                        progressDialog.dismiss();
                        Toast.makeText(DaftarActivity.this, ServerResponse,
                                Toast.LENGTH_LONG).show();
                        Intent daftar = new Intent(DaftarActivity.this, LoginActivity.class);
                        startActivity(daftar);
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();
                        Toast.makeText(DaftarActivity.this, volleyError.toString(),
                                Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("NIK", NIKHolder);
                params.put("NAMA", NamaHolder);
                params.put("EMAIL", EmailHolder);
                params.put("NO_TELEPON", TeleponHolder);
                params.put("ALAMAT", AlamatHolder);
                params.put("User_Password", PasswordHolder);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(DaftarActivity.this);
        requestQueue.add(stringRequest);
    }

    public void CheckEditTextIsEmptyOrNot() {
        NIKHolder = edt_nik.getText().toString().trim();
        NamaHolder = edt_nama.getText().toString().trim();
        EmailHolder = edt_email.getText().toString().trim();
        TeleponHolder = edt_nomor_telepon.getText().toString().trim();
        AlamatHolder = edt_alamat.getText().toString().trim();
        PasswordHolder = edt_password.getText().toString().trim();
        ConfirmPasswordHolder = edt_kofirmasi_password.getText().toString().trim();

        if (TextUtils.isEmpty(NIKHolder) || TextUtils.isEmpty(NamaHolder) ||
                TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(TeleponHolder) ||
                TextUtils.isEmpty(AlamatHolder) || TextUtils.isEmpty(PasswordHolder) ||
                TextUtils.isEmpty(ConfirmPasswordHolder)) {
            CheckEditText = false;
        } else {
            CheckEditText = true;
        }
    }

    public void onBackPressed() {
        new AlertDialog.Builder(this)
                .setIcon(R.drawable.logo_ejsc)
                .setTitle("Keluar Aplikasi")
                .setMessage("Apakah Anda ingin keluar dari EJSC?")
                .setPositiveButton("Ya", new DialogInterface.OnClickListener()
                {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        ActivityCompat.finishAffinity(DaftarActivity.this);
                        finish();
                    }

                })
                .setNegativeButton("Tidak", null)
                .show();
    }
}
