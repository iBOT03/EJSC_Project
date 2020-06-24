package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.BottomNavigation;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.JSONParser;
import com.bakorwil.ejsc.configfile.ServerApi;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    TextView btn_daftar, btn_lupa_password;
    ProgressDialog pd;
    EditText email, password;
    Button btn_login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        pd = new ProgressDialog(this);
        email = findViewById(R.id.edt_email);
        password = findViewById(R.id.edt_kata_sandi);

        btn_lupa_password = findViewById(R.id.btnLupaPassword);
        btn_lupa_password.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent lp = new Intent(LoginActivity.this, LupaPasswordActivity.class);
                startActivity(lp);
            }
        });

        btn_daftar = findViewById(R.id.btnDaftarSekarang);
        btn_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent daftar = new Intent(LoginActivity.this, DaftarActivity.class);
                startActivity(daftar);
            }
        });

        btn_login = findViewById(R.id.buttonMasuk);
        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pd.setMessage("Mohon Tunggu Sebentar");
                pd.show();
                if (email.getText().toString().isEmpty()) {
                    Toast.makeText(LoginActivity.this, "Email tidak boleh kosong", Toast.LENGTH_LONG).show();
                    pd.dismiss();
                } else if (password.getText().toString().isEmpty()) {
                    Toast.makeText(LoginActivity.this, "Kata sandi tidak boleh kosong", Toast.LENGTH_LONG).show();
                    pd.dismiss();
                } else {
                    StringRequest login = new StringRequest(Request.Method.POST, ServerApi.URL_LOGIN, new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            JSONObject res = null;
                            try {
                                pd.dismiss();
                                res = new JSONObject(response);
                                Log.d("error di ", response);
                                if (res.getBoolean("status")) {
                                    Toast.makeText(LoginActivity.this, res.getString("message"), Toast.LENGTH_SHORT).show();
                                    Intent login = new Intent(LoginActivity.this, BottomNavigation.class);
                                    startActivity(login);
                                } else {
                                    Toast.makeText(LoginActivity.this, res.getString("message"), Toast.LENGTH_SHORT).show();
                                }
                            } catch (JSONException e) {
                                pd.dismiss();
                                Log.e("errorgan", e.getMessage());
                            }
                        }
                    },
                            new Response.ErrorListener() {
                                @Override
                                public void onErrorResponse(VolleyError error) {
                                    pd.dismiss();
                                    Log.e("errornyaa ", "" + error);
                                    Toast.makeText(LoginActivity.this, "Gagal Login, " + error, Toast.LENGTH_SHORT).show();
                                }
                            }) {
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            Map<String, String> params = new HashMap<>();
                            params.put("email", email.getText().toString());
                            params.put("password", password.getText().toString());
                            return params;
                        }
                    };
                    AppController.getInstance().addToRequestQueue(login);
                }
            }
        });
    }

    public void onBackPressed() {
        new AlertDialog.Builder(this)
                .setIcon(R.drawable.logo_ejsc)
                .setTitle("Keluar Aplikasi")
                .setMessage("Apakah Anda ingin keluar dari EJSC?")
                .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        ActivityCompat.finishAffinity(LoginActivity.this);
                        finish();
                    }
                })
                .setNegativeButton("Tidak", null)
                .show();
    }
}
