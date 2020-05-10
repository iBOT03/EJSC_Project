package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
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

public class ResetPasswordActivity extends AppCompatActivity implements View.OnClickListener{
    Button btnSubmit;
    TextView daftar;
    EditText edt_password_baru, edt_kofirmasi_password_baru;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String cmail;
    String kode,respas,conrespas;
    int success;
    JSONArray jsonArray = null;
    private static final String TAG_SUCCESS = "success";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reset_password);
        PrefensiKodeReset();
        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(ResetPasswordActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_password_baru = findViewById(R.id.edt_password_baru);
        edt_kofirmasi_password_baru = findViewById(R.id.edt_confirm_password_daftar);
        btnSubmit = findViewById(R.id.buttonSubmit);
        daftar = findViewById(R.id.btnDaftarSekarang);

        btnSubmit.setOnClickListener(this);
        daftar.setOnClickListener(this);

    }
    class resetpw extends AsyncTask<String, String, String>{
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }

        @Override
        protected String doInBackground(String... strings) {
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("email",cmail));
            params.add(new BasicNameValuePair("pass",respas));
            params.add(new BasicNameValuePair("type","respass"));
            System.out.println(params);
            JSONObject json = JSONParser.makeHttpRequest(ServerApi.URL_LUPAPW, "POST", params);
            if(json != null){
                try {
                    jsonArray = json.getJSONArray("Hasil");
                    success = json.getInt(TAG_SUCCESS);
                    if(jsonArray != null) {
                        if (success == 1) {
                            startActivity(new Intent(getApplicationContext(), LoginActivity.class));
                            finish();
                            System.out.println("Success");
                        } else {
                            System.out.println("Failed");
                        }
                    } else {
                        System.out.println("JSONArray Null !!");
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
            if (success == 1) {
                Toast.makeText(ResetPasswordActivity.this, "Password Berhasil di ganti !", Toast.LENGTH_SHORT).show();
            } else {
                Toast.makeText(ResetPasswordActivity.this, "Password gagal di ganti", Toast.LENGTH_SHORT).show();
            }
        }
    }
    @Override
    public void onClick(View view){
        switch (view.getId()){
            case R.id.buttonSubmit:
                respas = edt_password_baru.getText().toString();
                conrespas = edt_kofirmasi_password_baru.getText().toString();
                if (respas.equals("")){
                    edt_password_baru.setError("Tidak Boleh kosong!");
                    edt_password_baru.requestFocus();
                } else if(conrespas.equals("")){
                    edt_kofirmasi_password_baru.setError("Tidak boleh kosong!");
                    edt_kofirmasi_password_baru.requestFocus();
                } else if(!conrespas.equals(respas)){
                    edt_kofirmasi_password_baru.setError("Konfirmasi Password tidak sama !");
                    edt_kofirmasi_password_baru.requestFocus();
                } else {
                    new resetpw().execute();
                }
                break;
            case R.id.btnDaftarSekarang:
                Intent i = new Intent(ResetPasswordActivity.this, DaftarActivity.class);
                startActivity(i);
                finish();
                break;
        }
    }
    private void PrefensiKodeReset() {
        SharedPreferences pref = getSharedPreferences("kodres", MODE_PRIVATE);
        cmail = pref.getString("email", "0");
    }
}
