package com.bakorwil.ejsc.botnav.akun;

import android.os.Bundle;
import android.text.Html;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DialogKontak extends BottomSheetDialogFragment {

    TextView whatsapp, alamat, email, telepon, instagram, facebook;
    RelativeLayout relative_email, relative_telepon, relative_whatsapp, relative_facebook, relative_instagram, relative_alamat;

    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.bottom_sheet_kontak_kami, container, false);

        whatsapp = view.findViewById(R.id.tvWhatsappKami);
        telepon = view.findViewById(R.id.tvTeleponKami);
        alamat = view.findViewById(R.id.tvAlamatKami);
        email = view.findViewById(R.id.tvEmailKami);
        instagram = view.findViewById(R.id.tvInstagramKami);
        facebook = view.findViewById(R.id.tvFacebookKami);

        relative_email = view.findViewById(R.id.relative_email);
        relative_telepon = view.findViewById(R.id.relative_telepon);
        relative_whatsapp = view.findViewById(R.id.relative_whatsapp);
        relative_facebook = view.findViewById(R.id.relative_facebook);
        relative_instagram = view.findViewById(R.id.relative_instagram);
        relative_alamat = view.findViewById(R.id.relative_alamat);
        loadData();
        super.onViewCreated(view, savedInstanceState);

        return view;
    }

    private void loadData() {
        StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_KONTAK, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
                    Log.e("responnya ", "" + response);
                    JSONArray arr = res.getJSONArray("data_kontak");
                    JSONObject data = arr.getJSONObject(0);

                    email.setText(Html.fromHtml(data.getString("EMAIL")));
                    if (data.getString("EMAIL").isEmpty()) {
                        relative_email.setVisibility(View.GONE);
                    }
                    telepon.setText(Html.fromHtml(data.getString("NOMOR_TELEPON")));
                    if (data.getString("NOMOR_TELEPON").isEmpty()) {
                        relative_telepon.setVisibility(View.GONE);
                    }
                    whatsapp.setText(Html.fromHtml(data.getString("WHATSAPP")));
                    if (data.getString("WHATSAPP").isEmpty()) {
                        relative_whatsapp.setVisibility(View.GONE);
                    }
                    facebook.setText(Html.fromHtml(data.getString("FACEBOOK")));
                    if (data.getString("FACEBOOK").isEmpty()) {
                        relative_facebook.setVisibility(View.GONE);
                    }
                    instagram.setText(Html.fromHtml(data.getString("INSTAGRAM")));
                    if (data.getString("INSTAGRAM").isEmpty()) {
                        relative_instagram.setVisibility(View.GONE);
                    }
                    alamat.setText(Html.fromHtml(data.getString("ALAMAT")));
                    if (data.getString("ALAMAT").isEmpty()) {
                        relative_alamat.setVisibility(View.GONE);
                    }

//                    whatsapp.setText(data.getString("WHATSAPP"));
//                    no_hp.setText(data.getString("NOMOR_TELEPON"));
//                    alamat.setText(data.getString("ALAMAT"));
//                    email.setText(data.getString("EMAIL"));
//                    instagram.setText(data.getString("INSTAGRAM"));
//                    facebook.setText(data.getString("FACEBOOK"));

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
        AppController.getInstance().addToRequestQueue(sendData);
    }
}
