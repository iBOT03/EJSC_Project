package com.bakorwil.ejsc.botnav.event;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelEvent;
import com.squareup.picasso.Picasso;

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
        progressDialog = new ProgressDialog(this);
        foto = findViewById(R.id.ivPosterEvent);
        judul = findViewById(R.id.tvJudulEvent);
        penyelenggara = findViewById(R.id.tvPenyelenggara);
        tgl_mulai = findViewById(R.id.tvTglMulai);
        keterangan = findViewById(R.id.tvKeteranganEvent);
        selesai = findViewById(R.id.eventSelesai);

        loadDetail();
    }

    private void loadDetail() {
        progressDialog.setMessage("Sedang Memuat Data");
//        progressDialog.setCancelable(false);
        progressDialog.show();

        StringRequest sendData = new StringRequest(Request.Method.POST, ServerApi.URL_GET_DETAIL_EVENT + idEvent, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    progressDialog.cancel();
                    res = new JSONObject(response);
                    JSONObject data = res.getJSONObject("datadetailevent");
                    judul.setText(data.getString("JUDUL"));
                    penyelenggara.setText(data.getString("PENYELENGGARA"));
                    tgl_mulai.setText(data.getString("TANGGAL_MULAI"));
                    keterangan.setText(data.getString("KETERANGAN"));
                    if (data.getString("STATUS").equals("1")) {
                        selesai.setVisibility(View.GONE);
                    } else {
                        selesai.setVisibility(View.VISIBLE);
                    }
                    Picasso.get()
                            .load(ServerApi.URL_GET_EVENT + data.getString("FOTO"))
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

        AppController.getInstance().addToRequestQueue(sendData);
    }
}
