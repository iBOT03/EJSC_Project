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
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.bakorwil.ejsc.BottomNavigation;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.JSONParser;
import com.bakorwil.ejsc.configfile.ServerApi;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class LoginActivity extends AppCompatActivity implements View.OnClickListener {
    Button btnMasuk;
    TextView daftar, lupaPassword;
    EditText edt_email, edt_kata_sandi;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    // new code added by gen z
    String username,password;
    String cmail, cnama;
    int success;
    JSONArray _JSONarray = null;
    JSONObject jobtes = null;
    private static final String TAG_SUCCESS = "success";
    //String tested;
    boolean tested;
    //end of new code
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

        bacaPreferensi();
        btnMasuk.setOnClickListener(this);
        lupaPassword.setOnClickListener(this);
        daftar.setOnClickListener(this);
        if (cmail.equals("0")) {
            // do something la
        } else {
            startActivity(new Intent(getApplicationContext(), BottomNavigation.class));
            finish();
        }
    }
    class login extends AsyncTask<String, String, String> {
        protected void onPreExecute() {
            super.onPreExecute();
            progressDialog = ProgressDialog.show(LoginActivity.this, "Login ..", "Please Wait", false, false);
        }
        @Override
        protected String doInBackground(String... arg0) {
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("email", username));
            params.add(new BasicNameValuePair("password", password));
            System.out.println(params);
            JSONObject json = JSONParser.makeHttpRequest(ServerApi.URL_LOGIN, "POST", params);
            if (json != null) {
                try {
                    tested = json.getBoolean("status");
                    if (tested == true) {
                        _JSONarray = json.getJSONArray("data");
                        if (_JSONarray != null) {
                            runOnUiThread(new Runnable() {
                                public void run() {
                                    // TODO Auto-generated method stub
                                    try {
                                        JSONObject object = _JSONarray.getJSONObject(0);
                                        String emel = object.getString("email");
                                        String nama = object.getString("nama_lengkap");
                                        startActivity(new Intent(getApplicationContext(), BottomNavigation.class));
                                        SharedPreferences pref = getSharedPreferences("akun", MODE_PRIVATE);
                                        SharedPreferences.Editor editor = pref.edit();
                                        editor.putString("email", emel.toString());
                                        editor.putString("nama", nama.toString());
                                        editor.commit();
                                        finish();
                                    } catch (JSONException e) {
                                        e.printStackTrace();
                                    }
                                }
                            });
                            System.out.println("Data Telah Ditampilkan");
                        } else {
                            System.out.println("JSONArray Null !!");
                        }
                    } else {
                        System.out.println("Data Gagal Ditampilkan");
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            } else {

            }
            return null;
        }
        protected void onProgressUpdate(String... progress) {
            super.onProgressUpdate(progress);
        }
        protected void onPostExecute(String file_url) {
            new Handler().postDelayed(new Runnable() {
                @Override
                public void run() {
                }
            }, 5000);
            if (tested == true) {
                Toast.makeText(LoginActivity.this, "Login Berhasil", Toast.LENGTH_SHORT).show();
                progressDialog.dismiss();
            } else {
                Toast.makeText(LoginActivity.this, "Gagal Login silahkan daftar akun", Toast.LENGTH_SHORT).show();
                progressDialog.dismiss();
            }
        }
    }
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.buttonMasuk:
                username = edt_email.getText().toString();
                password = edt_kata_sandi.getText().toString();
                if (username.equals("")) {
                    edt_email.setError("Belum diisi");
                    edt_email.requestFocus();
                } else if (password.equals("")) {
                    edt_kata_sandi.setError("Belum diisi");
                    edt_kata_sandi.requestFocus();
                } else {
                    new login().execute();
                }
                break;
            case R.id.btnDaftarSekarang:
                startActivity(new Intent(getApplicationContext(),DaftarActivity.class));
                break;
            case R.id.btnLupaPassword:
                startActivity(new Intent(getApplicationContext(),LupaPasswordActivity.class));
                break;
        }
    }
    private void bacaPreferensi() {
        SharedPreferences pref = getSharedPreferences("akun", MODE_PRIVATE);
        cmail = pref.getString("email", "0");
        cnama = pref.getString("nama", "0");
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
