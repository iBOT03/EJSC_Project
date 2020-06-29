package com.bakorwil.ejsc.botnav.akun;


import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.EditAkunActivity;
import com.bakorwil.ejsc.akun.LoginActivity;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.Preferences;
import com.bakorwil.ejsc.configfile.ServerApi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class AkunFragment extends Fragment {
    TextView editAkun, txt_nama, txt_email, keluar, kontakkami;
    ProgressDialog progressDialog;
    JSONArray arr;
    String cmail, cnama;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_akun, container, false);

//        bacaPreferensi();
//        loadDetailUser();
        txt_nama = view.findViewById(R.id.txt_nama);
//        txt_nama.setText(cnama);
        txt_email = view.findViewById(R.id.txt_email);
//        txt_email.setText(cmail);
        return view;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {

        editAkun = view.findViewById(R.id.txt_edit_akun);
        editAkun.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getActivity(), EditAkunActivity.class);
                startActivity(intent);
            }
        });

        keluar = view.findViewById(R.id.txt_keluar_lainnya);
        keluar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                new AlertDialog.Builder(getContext())
                        .setIcon(R.drawable.logo_ejsc)
                        .setTitle("Log Out")
                        .setMessage("Apakah Anda ingin log out dari aplikasi EJSC?")
                        .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Preferences.clearLoginInEmail(getContext());
                                startActivity(new Intent(getContext(), LoginActivity.class));
                            }
                        })
                        .setNegativeButton("Tidak", null)
                        .show();
            }
        });

        kontakkami = view.findViewById(R.id.txt_hubungi_kami);
        kontakkami.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DialogKontak kontak = new DialogKontak();
                kontak.show(getChildFragmentManager(), "Show Kontak Kami");
            }
        });
    }

//    private void loadDetailUser() {
//        StringRequest detailUser = new StringRequest(Request.Method.POST, ServerApi.URL_LOGIN, new Response.Listener<String>() {
//            @Override
//            public void onResponse(String response) {
//                JSONObject res = null;
//                try {
//                    res = new JSONObject(response);
//                    Log.e("responnya ", "" + response);
//                    JSONObject arr = res.getJSONObject("data");
//                    txt_email.setText(arr.getString("email"));
//                    txt_nama.setText(arr.getString("nama_lengkap"));
//                } catch (JSONException e) {
//                    e.printStackTrace();
//                    Log.e("erronya ", "" + e);
//                }
//            }
//        },
//                new Response.ErrorListener() {
//                    @Override
//                    public void onErrorResponse(VolleyError error) {
//                        Log.d("volley", "errornya : " + error.getMessage());
//                    }
//                }) {
//
//            @Override
//            public Map<String, String> getParams() throws AuthFailureError {
//                Map<String, String> params = new HashMap<String, String>();
//                return params;
//            }
//        };
//        AppController.getInstance().addToRequestQueue(detailUser);
//    }

//    private void bacaPreferensi() {
//        SharedPreferences pref = getActivity().getSharedPreferences("akun", MODE_PRIVATE);
//        cmail = pref.getString("email", "0");
//        cnama = pref.getString("nama", "0");
//    }
}

