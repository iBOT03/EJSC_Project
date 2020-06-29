package com.bakorwil.ejsc.botnav.event;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
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
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DetailEventActivity extends AppCompatActivity {
    ImageView foto;
    TextView judul, penyelenggara, tgl_mulai, keterangan, selesai;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String idEvent;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_event);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        idEvent = getIntent().getStringExtra("ID_EVENT");
        Log.e("idEvent", "IDnya:" + idEvent);
        progressDialog = new ProgressDialog(this);
        foto = findViewById(R.id.ivPosterEvent);
        judul = findViewById(R.id.tvJudulEvent);
        progressBar = findViewById(R.id.progressbar);
        penyelenggara = findViewById(R.id.tvPenyelenggara);
        tgl_mulai = findViewById(R.id.tvTglMulai);
        keterangan = findViewById(R.id.tvKeteranganEvent);
        selesai = findViewById(R.id.eventSelesai);

        loadDetail();
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            finish();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    private void loadDetail() {
        progressDialog.setMessage("Sedang Memuat Data");
        progressDialog.show();

        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_EVENT + "?ID_EVENT=" + idEvent, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    progressDialog.cancel();
                    res = new JSONObject(response);
                    JSONArray arr = res.getJSONArray("data_event");
                    JSONObject data = arr.getJSONObject(0);
                    judul.setText(data.getString("JUDUL"));
                    penyelenggara.setText(data.getString("PENYELENGGARA"));
                    tgl_mulai.setText(data.getString("TANGGAL_MULAI"));
                    keterangan.setText(data.getString("KETERANGAN"));
                    if (data.getString("STATUS").equals("1")) {
                        selesai.setVisibility(View.GONE);
                    } else if (data.getString("STATUS").equals("3")) {
                        selesai.setVisibility(View.VISIBLE);
                    }
                    Picasso.get()
                            .load(ServerApi.URL_GET_EVENT + "../../../" + "uploads/event/" + data.getString("FOTO"))
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
                params.put("ID_EVENT", idEvent);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(getApplication().getApplicationContext());
        requestQueue.add(sendData);
    }
}
