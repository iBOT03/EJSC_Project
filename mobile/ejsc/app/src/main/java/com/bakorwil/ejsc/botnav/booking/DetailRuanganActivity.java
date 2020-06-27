package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.DaftarActivity;
import com.bakorwil.ejsc.akun.UploadFotoKtpActivity;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DetailRuanganActivity extends AppCompatActivity {
    ImageView foto;
    TextView nama, kapasitas, deskripsi;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String id_ruangan;
    Button btn_booking;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_ruangan);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        id_ruangan = getIntent().getStringExtra("ID_RUANGAN");
        Log.e("id_ruangan", "IDnya:" + id_ruangan);
        progressDialog = new ProgressDialog(this);
        progressBar = findViewById(R.id.progressbar);
        foto = findViewById(R.id.iv_foto_ruangan);
        nama = findViewById(R.id.tv_nama_ruangan);
        kapasitas = findViewById(R.id.tv_kapasitas_ruangan);
        deskripsi = findViewById(R.id.tv_deskripsi_ruangan);

        btn_booking = findViewById(R.id.btn_booking);
        btn_booking.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent move_data = new Intent(DetailRuanganActivity.this, FormBookingActivity.class);
                move_data.putExtra("nama_ruangan", nama.getText().toString());
                move_data.putExtra("kapasitas", kapasitas.getText().toString());
                startActivity(move_data);
                Log.e("MOVE DATA: ", "" + move_data);
            }
        });

        loadDetail();

    }

    private void loadDetail() {
        progressDialog.setMessage("Sedang Memuat Data");
        progressDialog.show();
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_RUANGAN + "?ID_RUANGAN=" + id_ruangan, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    progressDialog.cancel();
                    res = new JSONObject(response);
                    JSONArray arr = res.getJSONArray("data_ruangan");
                    JSONObject data = arr.getJSONObject(0);
                    nama.setText(data.getString("NAMA_RUANGAN"));
                    kapasitas.setText(data.getString("KAPASITAS"));
                    deskripsi.setText(data.getString("DESKRIPSI"));
                    Picasso.get()
                            .load(ServerApi.URL_GET_RUANGAN + "../../../" + "uploads/ruangan/" + data.getString("FOTO_RUANGAN"))
                            .into(foto);
                } catch (JSONException ex) {
                    ex.printStackTrace();
                }
                progressBar.setVisibility(View.GONE);
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.d("volley", "errornya : " + error.getMessage());
                    }
                }) {
            @Override
            public Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("ID_RUANGAN", id_ruangan);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(getApplication().getApplicationContext());
        requestQueue.add(sendData);
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