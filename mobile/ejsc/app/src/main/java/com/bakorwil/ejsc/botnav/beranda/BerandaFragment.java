package com.bakorwil.ejsc.botnav.beranda;

import android.content.DialogInterface;
import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;
import androidx.viewpager2.widget.CompositePageTransformer;
import androidx.viewpager2.widget.MarginPageTransformer;
import androidx.viewpager2.widget.ViewPager2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.adapter.AdapterEvent;
import com.bakorwil.ejsc.adapter.SlideAdapter;
import com.bakorwil.ejsc.adapter.SliderItem;
import com.bakorwil.ejsc.botnav.event.EventActivity;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelEvent;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.app.ActivityCompat;
import androidx.fragment.app.Fragment;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import com.bakorwil.ejsc.R;
import com.squareup.picasso.Picasso;
import com.synnapps.carouselview.CarouselView;
import com.synnapps.carouselview.ImageClickListener;
import com.synnapps.carouselview.ImageListener;

public class BerandaFragment extends Fragment {
    RecyclerView.LayoutManager mManager;
    List<ModelEvent> mItems;
    RecyclerView recyclerView;
    AdapterEvent mAdapter;
    ProgressBar pb;
    ImageView btnNotifikasi;
    JSONArray arr;
    TextView dataKosong, show;
    String cmail, cnama;
    TextView tes;
    CarouselView foto;
    private ArrayList<ModelEvent> arrayList;

    private ViewPager2 viewPager2;
    private Handler sliderHandler = new Handler();

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_beranda, container, false);

        bacaPreferensi(); //ini lupa
        tes = view.findViewById(R.id.tv_nama_user);
        tes.setText(cnama); //set nama
        mItems = new ArrayList<>();
        arrayList = new ArrayList<>();
        pb = view.findViewById(R.id.progressbar);
        mAdapter = new AdapterEvent(getContext(), mItems);
        mManager = new LinearLayoutManager(getContext(), LinearLayoutManager.VERTICAL, false);
        recyclerView = view.findViewById(R.id.rvEvent);
        recyclerView.setLayoutManager(mManager);
        recyclerView.setHasFixedSize(true);
        recyclerView.setAdapter(mAdapter);
        dataKosong = view.findViewById(R.id.dataKosong);
        show = view.findViewById(R.id.tampilkan_semua);
        viewPager2 = view.findViewById(R.id.viewPagerImageSlider);
        //foto = view.findViewById(R.id.carousel);

        show.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getContext(), EventActivity.class);
                startActivity(intent);
            }
        });

        loadJSON();

        btnNotifikasi = view.findViewById(R.id.btn_notifikasi);
        btnNotifikasi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent notifikasi = new Intent(getContext(), NotifikasiActivity.class);
                startActivity(notifikasi);
            }
        });

//        CarouselView carouselView = view.findViewById(R.id.carousel);
//        //Picasso.get()
//                //.load(ServerApi.URL_RUANGAN + "../../../" + "uploads/ruangan/" + data.getString("FOTO_RUANGAN"))
//                //.into(foto);
//        carouselView.setPageCount(mImages.length);
//        carouselView.setImageListener(new ImageListener() {
//            @Override
//            public void setImageForPosition(int position, ImageView imageView) {
//                imageView.setImageResource(mImages[position]);
//            }
//        });
//        carouselView.setImageClickListener(new ImageClickListener() {
//            @Override
//            public void onClick(int position) {
//                Toast.makeText(getContext(), mImagesTitle[position], Toast.LENGTH_SHORT).show();
//            }
//        });
        //viewPager2 = findViewById(R.id.viewPagerImageSlider);

        //disini tempat mempersiapkan list foto dari drawable
        //kita juga bisa mendapatkannya dari api

        List<SliderItem> sliderItems = new ArrayList<>();
        sliderItems.add(new SliderItem(R.drawable.conferenceroom));
        sliderItems.add(new SliderItem(R.drawable.coworkingspace));
        sliderItems.add(new SliderItem(R.drawable.meetingroom));
        sliderItems.add(new SliderItem(R.drawable.trainingroom));

        viewPager2.setAdapter(new SlideAdapter(sliderItems, viewPager2));
        viewPager2.setClipToPadding(false);
        viewPager2.setClipChildren(false);
        viewPager2.setOffscreenPageLimit(3);
        viewPager2.getChildAt(0).setOverScrollMode(RecyclerView.OVER_SCROLL_NEVER);

        CompositePageTransformer compositePageTransformer = new CompositePageTransformer();
        compositePageTransformer.addTransformer(new MarginPageTransformer(40));
        compositePageTransformer.addTransformer(new ViewPager2.PageTransformer() {
            @Override
            public void transformPage(@NonNull View page, float position) {
                float r = 1 - Math.abs(position);
                page.setScaleY(0.85f + r * 0.15f);
            }
        });

        viewPager2.setPageTransformer(compositePageTransformer);
        viewPager2.registerOnPageChangeCallback(new ViewPager2.OnPageChangeCallback() {
            @Override
            public void onPageSelected(int position) {
                super.onPageSelected(position);
                sliderHandler.removeCallbacks(sliderRunnable);
                sliderHandler.postDelayed(sliderRunnable, 3000); //durasi slide 3 detik
            }
        });

        return view;
    }

    private Runnable sliderRunnable = new Runnable() {
        @Override
        public void run() {
            viewPager2.setCurrentItem(viewPager2.getCurrentItem() + 1);
        }
    };

    @Override
    public void onPause() {
        super.onPause();
        sliderHandler.removeCallbacks(sliderRunnable);
    }

    @Override
    public void onResume() {
        super.onResume();
        sliderHandler.postDelayed(sliderRunnable, 3000);
    }

    private void loadJSON() {
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_GET_EVENT_BERANDA, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;

                try {
                    res = new JSONObject(response);
//                    JSONObject arr2 = res.getJSONObject("response");
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
//                params.put("token" , authdata.getInstance(getActivity()).getToken());
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(sendData);

    }

    private void bacaPreferensi(){
        SharedPreferences pref = getActivity().getSharedPreferences("akun", Context.MODE_PRIVATE);
        cmail = pref.getString("email", "0"); //email
        cnama = pref.getString("nama", "0"); // get nama buat ditampilkan
    }

//    private int[] mImages = new int[]{
//            R.drawable.coworkingspace, R.drawable.conferenceroom, R.drawable.trainingroom, R.drawable.meetingroom
//    };
//
//    private String[] mImagesTitle = new String[]{
//            "Meeting Room", "Training Room", "Conference Room", "Co-Working Space"
//    };
}
