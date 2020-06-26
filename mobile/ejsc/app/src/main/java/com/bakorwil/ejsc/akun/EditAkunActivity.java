package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.bakorwil.ejsc.R;

public class EditAkunActivity extends AppCompatActivity {
    EditText email, nama, password, password2, password3;
    Button simpan, batal;
    ProgressDialog progressDialog;
    String cnama, cmail, cpass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_akun);

        email = findViewById(R.id.edt_email);
        nama = findViewById(R.id.edt_nama);
        password = findViewById(R.id.edt_password_lama);
        password2 = findViewById(R.id.edt_password_baru);
        password3 = findViewById(R.id.edt_confirm_password_baru);

        bacaPreferensi();
        email.setText(cmail);
        nama.setText(cnama);
        password.setText(cpass);

        simpan = findViewById(R.id.buttonSimpan);
        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        });

        batal = findViewById(R.id.buttonBatal);
        batal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }

    private void bacaPreferensi() {
        SharedPreferences pref = getSharedPreferences("akun", MODE_PRIVATE);
        cmail = pref.getString("email", "0");
        cnama = pref.getString("nama", "0");
        cpass = pref.getString("password", "0");
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            finish();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
