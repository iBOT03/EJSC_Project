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

public class KodeResetActivity extends AppCompatActivity implements View.OnClickListener {
    Button btnSubmit;
    TextView daftar;
    EditText edt_kode_reset;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String cmail;
    String kode;
    int success;
    JSONArray jsonArray = null;
    private static final String TAG_SUCCESS = "success";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_kode_reset);
        PrefensiLupaPw();
        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(KodeResetActivity.this);
        progressBar.setVisibility(View.GONE);

        edt_kode_reset = findViewById(R.id.edt_kode_reset);
        btnSubmit = findViewById(R.id.buttonSubmit);
        daftar = findViewById(R.id.btnDaftarSekarang);

        btnSubmit.setOnClickListener(this);
        daftar.setOnClickListener(this);
    }
    class codereset extends AsyncTask<String, String, String>{
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
        }
        @Override
        protected String doInBackground(String... strings) {
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("email",cmail));
            params.add(new BasicNameValuePair("kode",kode));
            params.add(new BasicNameValuePair("type","verifkode"));
            System.out.println(params);
            JSONObject json = JSONParser.makeHttpRequest(ServerApi.URL_LUPAPW, "POST", params);
            if(json != null){
                try {
                    jsonArray = json.getJSONArray("Hasil");
                    success = json.getInt(TAG_SUCCESS);
                    if(jsonArray != null) {
                        if (success == 1) {
                            runOnUiThread(new Runnable() {
                                public void run() {
                                    try {
                                        JSONObject object = jsonArray.getJSONObject(0);
                                        String emel = object.getString("email");
                                        startActivity(new Intent(getApplicationContext(), ResetPasswordActivity.class));
                                        SharedPreferences pref = getSharedPreferences("kodres", MODE_PRIVATE);
                                        SharedPreferences.Editor editor = pref.edit();
                                        editor.putString("email", emel.toString());
                                        editor.commit();
                                        finish();
                                    } catch (Exception e) {
                                        e.printStackTrace();
                                    }
                                }
                            });
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
                Toast.makeText(KodeResetActivity.this, "Kode Valid", Toast.LENGTH_SHORT).show();
            } else {
                Toast.makeText(KodeResetActivity.this, "Kode Tidak Valid !", Toast.LENGTH_SHORT).show();
            }
        }

    }
    @Override
    public void onClick(View view){
        switch (view.getId()){
            case R.id.buttonSubmit:
                kode = edt_kode_reset.getText().toString();
                if(kode.equals("")){
                    edt_kode_reset.setError("Kode tidak boleh kosong!");
                    edt_kode_reset.requestFocus();
                } else {
                    new codereset().execute();
                }
                break;
            case R.id.btnDaftarSekarang:
                Intent i = new Intent(KodeResetActivity.this, ResetPasswordActivity.class);
                startActivity(i);
                finish();
                break;
        }
    }

    private void PrefensiLupaPw() {
        SharedPreferences pref = getSharedPreferences("lupapw", MODE_PRIVATE);
        cmail = pref.getString("email", "0");
    }
}
