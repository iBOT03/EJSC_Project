package com.bakorwil.ejsc.botnav.booking;

import android.graphics.Color;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.adapter.AdapterBooking;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.Preferences;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.configfile.Util;
import com.bakorwil.ejsc.model.ModelBooking;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class RiwayatFragment extends Fragment {
    RecyclerView.LayoutManager mManager;
    List<ModelBooking> mItems;
    RecyclerView recyclerView;
    AdapterBooking mAdapter;
    ProgressBar pb;
    JSONArray arr;
    TextView dataKosong;
    private ArrayList<ModelBooking> arrayList;
    String nik;
    String[]status_booking = {"", "Aktif", "Pending", "Selesai", "Batal"};
    RelativeLayout layout_status;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_riwayat, container, false);

        nik = Preferences.getInstance(getContext()).getNik();
        mItems = new ArrayList<>();
        arrayList = new ArrayList<>();
        pb = view.findViewById(R.id.progressbar);
        mAdapter = new AdapterBooking(getContext(), mItems);
        mManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = view.findViewById(R.id.rv_riwayat);
        recyclerView.setLayoutManager(mManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(mAdapter);
        dataKosong = view.findViewById(R.id.dataKosong);

        loadRiwayat();

        return view;
    }

    private void loadRiwayat() {
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_RIWAYAT_BOOKING + "?NIK=" + nik, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
                    if (res.getBoolean("status")) {
                        arr = res.getJSONArray("data_riwayat");
                        for (int i = 0; i < arr.length(); i++) {
                            try {
                                JSONObject data = arr.getJSONObject(i);
                                ModelBooking md = new ModelBooking();

                                md.setId_booking(data.getString("ID_BOOKING"));
                                md.setNik(data.getString("NIK"));
                                md.setNama(data.getString("NAMA"));
                                md.setNomor_telepon(data.getString("NOMOR_TELEPON"));
                                md.setId_komunitas(data.getString("ID_KOMUNITAS"));
                                md.setNama_ruangan(data.getString("NAMA_RUANGAN"));
                                md.setId_ruangan(data.getString("ID_RUANGAN"));
                                md.setJumlah_orang(data.getString("JUMLAH_ORANG"));
                                md.setDeskripsi_kegiatan(data.getString("DESKRIPSI_KEGIATAN"));
                                md.setTujuan(data.getString("TUJUAN"));
                                md.setTanggal_mulai(Util.settanggal(data.getString("TANGGAL_MULAI")));
                                md.setDurasi(data.getString("DURASI"));
                                md.setJam_mulai(data.getString("JAM_MULAI"));
                                md.setStatus(data.getString("STATUS"));
                                Log.e("STATUSNYAAAAAAAA", "" + data.getString("STATUS"));
                                md.setJam_selesai(data.getString("JAM_SELESAI"));
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