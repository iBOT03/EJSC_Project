

package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
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
import com.bakorwil.ejsc.configfile.Preferences;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.configfile.Util;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DetailRiwayatBooking extends AppCompatActivity {
    TextView tanggal, jam_mulai, jam_selesai, nama_lengkap, jumlah_peserta, tujuan, deskripsi, status;
    String id_booking, id_ruangan, id_komunitas, nik;
    ProgressBar progressBar;
    ProgressDialog progressDialog;
    String[] status_booking = {"", "Aktif", "Pending", "Selesai", "Batal"};
    String xnama_komunitas, xnama, xnama_ruangan, xtanggal_mulai, xjam_mulai, xjumlah_orang, xtujuan, xdeskripsi;

	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_riwayat_booking);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        //Get intent parsing data dari AdapterBooking
        xnama_komunitas = getIntent().getStringExtra("nama_komunitas");
        xnama = getIntent().getStringExtra("nama");
        xnama_ruangan = getIntent().getStringExtra("nama_ruangan");
        xtanggal_mulai = getIntent().getStringExtra("tanggal_mulai");
        xjam_mulai = getIntent().getStringExtra("jam_mulai");
        xjumlah_orang = getIntent().getStringExtra("jumlah_orang");
        xtujuan = getIntent().getStringExtra("tujuan");
        xdeskripsi = getIntent().getStringExtra("deskripsi");

        nik = Preferences.getInstance(getApplicationContext()).getNik();
        Log.e("NIK", "" + nik);
        progressDialog = new ProgressDialog(this);
        progressBar = findViewById(R.id.progressbar);
        tanggal = findViewById(R.id.tv_tanggal_mulai);
        jam_mulai = findViewById(R.id.tv_jam_mulai);
        nama_lengkap = findViewById(R.id.tv_nama_pemesan);
        jumlah_peserta = findViewById(R.id.tv_jumlah_orang);
        tujuan = findViewById(R.id.tv_tujuan);
        deskripsi = findViewById(R.id.tv_deskripsi_kegiatan);
        status = findViewById(R.id.tv_status);

        tanggal.setText(xtanggal_mulai);
        jam_mulai.setText(xjam_mulai);
        nama_lengkap.setText(xnama);
        jumlah_peserta.setText(xjumlah_orang);
        tujuan.setText(xtujuan);
        deskripsi.setText(xdeskripsi);

        loadDetail();
    }

    private void loadDetail() {
        progressDialog.setMessage("Sedang Memuat Data");
        progressDialog.show();

        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_RIWAYAT_BOOKING + "?NIK=" + nik, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    progressDialog.cancel();
                    res = new JSONObject(response);
                    JSONArray arr = res.getJSONArray("data_riwayat");
                    JSONObject data = arr.getJSONObject(0);

//                    tanggal.setText(Util.settanggal(data.getString("TANGGAL_MULAI")));
//                    jam_mulai.setText(data.getString("JAM_MULAI"));
//                    nama_lengkap.setText(data.getString("NAMA"));
//                    jumlah_peserta.setText(data.getString("JUMLAH_ORANG"));
//                    tujuan.setText(data.getString("TUJUAN"));
//                    deskripsi.setText(data.getString("DESKRIPSI_KEGIATAN"));
                    status.setText(status_booking[Integer.parseInt(data.getString("STATUS"))]);
                    Log.e("STATUUSSS", "" + data.getString("STATUS"));
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
                params.put("NIK", nik);
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
