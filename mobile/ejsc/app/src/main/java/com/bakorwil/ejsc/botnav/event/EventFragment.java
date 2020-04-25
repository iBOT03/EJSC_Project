package com.bakorwil.ejsc.botnav.event;

import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

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

public class EventFragment extends Fragment {
    RecyclerView.LayoutManager layoutManager;
    List<ModelEvent> mItem;
    RecyclerView recyclerView;
    AdapterEvent adapterEvent;
    ProgressBar pb;
    JSONArray jsonArray;
    TextView dataKosong;


    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_event, container, false);

        pb =view.findViewById(R.id.progressbar);
        adapterEvent = new AdapterEvent(getContext(), mItem);
        layoutManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = view.findViewById(R.id.rvEvent);
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(adapterEvent);
        dataKosong = view.findViewById(R.id.dataKosong);

        loadJSON();

        return view;
    }

    private void loadJSON() {

        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_EVENT, null, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;

                try {
                    res = new JSONObject(response);
                    JSONObject arr2 = res.getJSONObject("respon");
                    if (arr2.getBoolean("status")) {
                        jsonArray = res.getJSONArray("data_event");
                        for (int i = 0; i < response.length(); i++) {
                            try {
                                JSONObject data = jsonArray.getJSONObject(i);
                                ModelEvent md = new ModelEvent();
                                md.setId_event(data.getString("id_event"));
                                md.setJudul(data.getString("judul"));
                                md.setFoto(data.getString("foto"));
                                md.setPenyelenggara(data.getString("penyelenggara"));
                                md.setNama_pengisi_acara(data.getString("nama_pengisi_acara"));
                                md.setTgl_mulai(data.getString("tanggal_mulai"));
                                md.setTgl_selesai(data.getString("tanggal_selesai"));
                                md.setWaktu(data.getString("waktu"));
                                md.setRuangan(data.getString("id_ruangan"));
                                md.setAsal_peserta(data.getString("asal_peserta"));
                                md.setJumlah_peserta(data.getString("jumlah_peserta"));
                                md.setKeterangan(data.getString("keterangan"));
                                md.setStatus(data.getString("status"));
                                mItem.add(md);
                            } catch (JSONException e) {
                                Log.e("erronya atas", "" + e);
                                e.printStackTrace();
                            }
                        }
                        pb.setVisibility(View.GONE);
                        adapterEvent.notifyDataSetChanged();
                        if (mItem.isEmpty()) {
                            dataKosong.setVisibility(View.VISIBLE);
                        } else {
                            dataKosong.setVisibility(View.GONE);
                        }
                    } else {
                        Toast.makeText(getActivity(), "cek login", Toast.LENGTH_SHORT).show();
                    }
                    Log.e("tes", res.toString());
                } catch (JSONException e) {
                    e.printStackTrace();
                    Log.e("erronya ", "" + e);
                }
            }

        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.d("volley", "errornya : " + error.getMessage());
            }
        }) {
            @Override
            public Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(senddata);
    }
}