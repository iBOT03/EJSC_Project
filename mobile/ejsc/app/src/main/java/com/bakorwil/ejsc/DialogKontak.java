package com.bakorwil.ejsc;

import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DialogKontak extends BottomSheetDialogFragment {

	TextView whatsapp, alamat, email, no_hp;

	public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container,
	                         @Nullable Bundle savedInstanceState) {
		View view = inflater.inflate(R.layout.bottom_sheet_kontak_kami, container, false);

		whatsapp = view.findViewById(R.id.tvWhatsappKami);
		no_hp = view.findViewById(R.id.tvTeleponKami);
		alamat = view.findViewById(R.id.tvAlamatKami);
		email = view.findViewById(R.id.tvEmailKami);
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
					Log.e("responnya ",""+response);
					JSONArray arr = res.getJSONArray("data_kontak");
					JSONObject data = arr.getJSONObject(0);

					whatsapp.setText(data.getString("WHATSAPP"));
					no_hp.setText(data.getString("NOMOR_TELEPON"));
					alamat.setText(data.getString("ALAMAT"));
					email.setText(data.getString("EMAIL"));
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
