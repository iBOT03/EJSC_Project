package com.bakorwil.ejsc.botnav.event;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.adapter.AdapterEvent;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelEvent;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class EventFragment extends Fragment {
//    private static final String data_url = "http://192.168.1.6/EJSC_Project/mobile/api/event.php";
    RecyclerView recyclerView;
    RecyclerView.Adapter rvAdapter;
    RecyclerView.LayoutManager layoutManager;
    ArrayList<ModelEvent> arrayList;
    ProgressDialog pd;
    TextView dataKosong;


    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_event, container, false);

        pd = new ProgressDialog(getContext());
        recyclerView = view.findViewById(R.id.rvEvent);
        arrayList = new ArrayList<>();
        layoutManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView.setLayoutManager(layoutManager);
        rvAdapter = new AdapterEvent(getContext(), arrayList);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(rvAdapter);
        dataKosong = view.findViewById(R.id.dataKosong);

        loadJSON();

        return view;
    }

    private void loadJSON() {
        pd.setMessage("Memuat Daftar Event");
        pd.setCancelable(false);
        pd.show();

        JsonArrayRequest arrayRequest = new JsonArrayRequest(Request.Method.POST, ServerApi.URL_GET_EVENT, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                pd.cancel();
                Log.d("volley", "response : " + response.toString());
                for (int i = 0; i < response.length(); i++) {
                    try {
                        JSONObject data = response.getJSONObject(i);
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
                        arrayList.add(md);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
                rvAdapter.notifyDataSetChanged();
                if (arrayList.isEmpty()) {
                    dataKosong.setVisibility(View.VISIBLE);
                } else {
                    dataKosong.setVisibility(View.GONE);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                pd.cancel();
                Log.d("volley", "error : " + error.getMessage());
            }
        });
        AppController.getInstance().

                addToRequestQueue(arrayRequest);
    }
}