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

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class DialogKontak extends BottomSheetDialogFragment {

	TextView nowa, alamat, email, no_hp;

	public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container,
	                         @Nullable Bundle savedInstanceState) {
		return inflater.inflate(R.layout.bottom_sheet_kontak_kami, container, false);
	}

	@Override
	public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
		nowa = view.findViewById(R.id.tvWhatsappKami);
		no_hp = view.findViewById(R.id.tvTeleponKami);
		alamat = view.findViewById(R.id.tvAlamatKami);
		email = view.findViewById(R.id.tvEmailKami);
		loadData();
		super.onViewCreated(view, savedInstanceState);
	}

	private void loadData() {
		StringRequest sendData = new StringRequest(Request.Method.GET, ServerApi.URL_KONTAK, new Response.Listener<String>() {
			@Override
			public void onResponse(String response) {
				JSONObject res = null;
				try {
					res = new JSONObject(response);
					Log.e("responnya ",""+response);
					JSONObject arr = res.getJSONObject("data_kontak");

					nowa.setText(arr.getString("WHATSAPP"));
					no_hp.setText(arr.getString("NOMOR_TELEPON"));
					alamat.setText(arr.getString("ALAMAT"));
					email.setText(arr.getString("EMAIL"));
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
