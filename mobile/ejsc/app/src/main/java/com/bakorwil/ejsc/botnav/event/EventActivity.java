package com.bakorwil.ejsc.botnav.event;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.adapter.AdapterEvent;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelEvent;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class EventActivity extends AppCompatActivity {
    RecyclerView.LayoutManager mManager;
    List<ModelEvent> mItems;
    RecyclerView recyclerView;
    AdapterEvent mAdapter;
    ProgressBar pb;
    JSONArray arr;
    TextView dataKosong;
    private ArrayList<ModelEvent> arrayList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_event);

        mItems = new ArrayList<>();
        arrayList = new ArrayList<>();
        pb = findViewById(R.id.progressbar);
        mAdapter = new AdapterEvent(getApplicationContext(), mItems);
        mManager = new LinearLayoutManager(getApplicationContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = findViewById(R.id.rvEvent);
        recyclerView.setLayoutManager(mManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(mAdapter);
        dataKosong = findViewById(R.id.dataKosong);

        loadJSON();
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            finish();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    private void loadJSON() {
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_EVENT, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
//                    JSONObject arrr = res.getJSONObject("respon");
                    if (res.getBoolean("status")) {
                        arr = res.getJSONArray("data_event");
                        for (int i = 0; i < arr.length(); i++) {
                            try {
                                JSONObject data = arr.getJSONObject(i);
                                ModelEvent md = new ModelEvent();

                                md.setId_event(data.getString("ID_EVENT"));
                                md.setJudul(data.getString("JUDUL"));
                                md.setFoto(data.getString("FOTO"));
                                md.setPenyelenggara(data.getString("PENYELENGGARA"));
                                md.setNama_pengisi_acara(data.getString("NAMA_PENGISI_ACARA"));
                                md.setTgl_mulai(data.getString("TANGGAL_MULAI"));
                                md.setTgl_selesai(data.getString("TANGGAL_SELESAI"));
                                md.setWaktu(data.getString("WAKTU"));
                                md.setRuangan(data.getString("ID_RUANGAN"));
                                md.setAsal_peserta(data.getString("ASAL_PESERTA"));
                                md.setJumlah_peserta(data.getString("JUMLAH_PESERTA"));
                                md.setKeterangan(data.getString("KETERANGAN"));
                                md.setStatus(data.getString("STATUS"));
                                mItems.add(md);
                            } catch (Exception ex) {
                                Log.e("Error", "" + ex);
                                ex.printStackTrace();
                            }
                        }
                        pb.setVisibility(View.GONE);
                        mAdapter.notifyDataSetChanged();
                        if (mItems.isEmpty()) {
                            dataKosong.setVisibility(View.VISIBLE);
                        } else {
                            dataKosong.setVisibility(View.GONE);
                        }
                    } else {
                        Toast.makeText(EventActivity.this, "cek_login", Toast.LENGTH_SHORT).show();
                    }
                    Log.e("tes", res.toString());
                } catch (JSONException e) {
                    e.printStackTrace();
                    Log.e("Error", "" + e);
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.d("Volley", "Error : " + error.getMessage());
                    }
                }) {
            @Override
            public Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
//                params.put("token" , authdata.getInstance(getActivity()).getToken());
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(sendData);
    }
}
