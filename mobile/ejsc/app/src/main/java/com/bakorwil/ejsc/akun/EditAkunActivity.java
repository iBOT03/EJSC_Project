package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.Preferences;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.main.BottomNavigation;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class EditAkunActivity extends AppCompatActivity {
    EditText nik, email, nama, telepon, alamat, password, password2, password3;
    Button simpan, batal;
    ProgressDialog progressDialog;
    String xnik, xnama, xemail, xtelepon, xalamat;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_akun);

        nik = findViewById(R.id.edt_nik);
        email = findViewById(R.id.edt_email);
        nama = findViewById(R.id.edt_nama);
        telepon = findViewById(R.id.edt_telepon);
        alamat = findViewById(R.id.edt_alamat);
        password = findViewById(R.id.edt_password_lama);
        password2 = findViewById(R.id.edt_password_baru);
        password3 = findViewById(R.id.edt_confirm_password_baru);

        xnik = Preferences.getInstance(getApplicationContext()).getNik();
        nik.setText(xnik);
        xnama = Preferences.getInstance(getApplicationContext()).getNama();
        nama.setText(xnama);
        xemail = Preferences.getInstance(getApplicationContext()).getEmail();
        email.setText(xemail);
        xtelepon = Preferences.getInstance(getApplicationContext()).getTelepon();
        telepon.setText(xtelepon);
        xalamat = Preferences.getInstance(getApplicationContext()).getAlamat();
        alamat.setText(xalamat);

        simpan = findViewById(R.id.buttonSimpan);
        simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (!password2.getText().toString().equals(password3.getText().toString())) {
                    Toast.makeText(EditAkunActivity.this, "Kata sandi tidak sama", Toast.LENGTH_SHORT).show();
                } else if (password.getText().toString().isEmpty()) {
                    Toast.makeText(EditAkunActivity.this, "Kata sandi lama wajib diisi", Toast.LENGTH_SHORT).show();
                } else {
                    StringRequest senddata = new StringRequest(Request.Method.PUT, ServerApi.URL_UPDATE, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            JSONObject res = null;
                            try {
                                res = new JSONObject(response);
                                Log.d("error di ", response);
                                if (res.getBoolean("status")) {
                                    Toast.makeText(getApplicationContext(), res.getString("message"), Toast.LENGTH_SHORT).show();
                                    Intent moving = new Intent(EditAkunActivity.this, BottomNavigation.class);
                                    startActivity(moving);
                                } else {
                                    Toast.makeText(getApplicationContext(), res.getString("pesan"), Toast.LENGTH_SHORT).show();
                                }
                            } catch (JSONException e) {
                                Log.e("errorgan", e.getMessage());
                            }
                        }
                    }, new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Log.e("errornyaa ", "" + error);
                            Toast.makeText(getApplicationContext(), "Gagal, " + error, Toast.LENGTH_SHORT).show();
                        }
                    }) {
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            Map<String, String> params = new HashMap<>();
//                            params.put("token", Preferences.getInstance(getApplicationContext()).getToken());
                            params.put("email", email.getText().toString());
                            params.put("no_telepon", telepon.getText().toString());
                            params.put("alamat", alamat.getText().toString());
                            params.put("nama_pengguna", nama.getText().toString());
                            params.put("password", password.getText().toString());
//                            params.put("password", password2.getText().toString());
//                            params.put("password", pass.getText().toString());

                            return params;
                        }
                    };
                    AppController.getInstance().addToRequestQueue(senddata);
                }
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

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            finish();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
