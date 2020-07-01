package com.bakorwil.ejsc.botnav.booking;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.adapter.AdapterRuangan;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelRuangan;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class RuanganFragment extends Fragment {
    RecyclerView.LayoutManager mManager;
    List<ModelRuangan> mItems;
    RecyclerView recyclerView;
    AdapterRuangan mAdapter;
    ProgressBar pb;
    JSONArray arr;
    TextView dataKosong;
    private ArrayList<ModelRuangan> arrayList;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_ruangan, container, false);

        mItems = new ArrayList<>();
        arrayList = new ArrayList<>();
        pb = view.findViewById(R.id.progressbar);
        mAdapter = new AdapterRuangan(getContext(), mItems);
        mManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = view.findViewById(R.id.rv_ruangan);
        recyclerView.setLayoutManager(mManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(mAdapter);
        dataKosong = view.findViewById(R.id.dataKosong);

        loadJSON();

        return view;
    }

    private void loadJSON() {
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_RUANGAN, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
                    if (res.getBoolean("status")) {
                        arr = res.getJSONArray("data_ruangan");
                        for (int i = 0; i < arr.length(); i++) {
                            try {
                                JSONObject data = arr.getJSONObject(i);
                                ModelRuangan mr = new ModelRuangan();

                                mr.setId_ruangan(data.getString("ID_RUANGAN"));
                                mr.setFoto_ruangan(data.getString("FOTO_RUANGAN"));
                                mr.setNama_ruangan(data.getString("NAMA_RUANGAN"));
                                mr.setKapasitas(data.getString("KAPASITAS"));
                                mItems.add(mr);
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
                        Toast.makeText(getActivity(), "cek_login", Toast.LENGTH_SHORT).show();
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
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(sendData);
    }
}