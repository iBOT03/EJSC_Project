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
    List<ModelEvent> modelEventList;
    RecyclerView recyclerView;
    AdapterEvent adapterEvent;
    ProgressBar progressBar;
    JSONArray jsonArray;
    TextView dataKosong;
    private ArrayList<ModelEvent> arrayList;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_event, container, false);
        modelEventList = new ArrayList<>();
        arrayList = new ArrayList<>();
        loadData();
        progressBar = view.findViewById(R.id.progressbar);
        adapterEvent = new AdapterEvent(getContext(), modelEventList);
        layoutManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = view.findViewById(R.id.rvEvent);
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(adapterEvent);
        dataKosong = view.findViewById(R.id.dataKosong);
        return view;
    }

    private void loadData() {
        StringRequest sendData = new StringRequest(Request.Method.POST, ServerApi.IPServer + "...", new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
                    JSONObject jsonObject = res.getJSONObject("respon");
                    if (jsonObject.getBoolean("status")) {
                        jsonArray = res.getJSONArray("data");
                        for (int i = 0; i < jsonArray.length(); i++) {
                            try {
                                JSONObject jsonObject1 = jsonArray.getJSONObject(i);
                                ModelEvent modelEvent = new ModelEvent();
                                modelEvent.setId_event(jsonObject1.getString("ID_EVENT"));
                                modelEvent.setJudul(jsonObject1.getString("JUDUL"));
                                modelEvent.setFoto(jsonObject1.getString("FOTO"));
                                modelEvent.setKeterangan(jsonObject1.getString("KETERANGAN"));
                                modelEvent.setPenyelenggara(jsonObject1.getString("PENYELENGGARA"));
                                modelEvent.setNama_pengisi_acara(jsonObject1.getString("NAMA_PENGISI_ACARA"));
                                modelEvent.setTgl_mulai(jsonObject1.getString("TGL_MULAI"));
                                modelEvent.setTgl_selesai(jsonObject1.getString("TGL_SELESAI"));
                                modelEvent.setWaktu(jsonObject1.getString("WAKTU"));
                                modelEvent.setRuangan(jsonObject1.getString("RUANGAN"));
                                modelEvent.setAsal_peserta(jsonObject1.getString("ASAL_PESERTA"));
                                modelEvent.setJumlah_peserta(jsonObject1.getString("JUMLAH_PESERTA"));
                                modelEvent.setStatus(jsonObject1.getString("STATUS"));
                                modelEventList.add(modelEvent);

                            } catch (Exception ex) {
                                Log.e("erronya atas", "" + ex);
                                ex.printStackTrace();
                            }
                        }
                        progressBar.setVisibility(View.GONE);
                        adapterEvent.notifyDataSetChanged();
                        if (modelEventList.isEmpty()) {
                            dataKosong.setVisibility(View.VISIBLE);
                        } else {
                            dataKosong.setVisibility(View.GONE);
                        }
                    } else {
                        Toast.makeText(getActivity(), "cek login", Toast.LENGTH_SHORT).show();
                    }
                    Log.e("tes", res.toString());

                } catch (
                        JSONException e) {
                    e.printStackTrace();
                    Log.e("erronya ", "" + e);
                }
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
//                params.put("token", authdata.getInstance(getActivity()).getToken());
                return params;
            }
        };

        AppController.getInstance().addToRequestQueue(sendData);
    }

}