package com.bakorwil.ejsc;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

public class DialogKontak extends BottomSheetDialogFragment {

	TextView nowa , alamat , email , no_hp;
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
		super.onViewCreated(view, savedInstanceState);
	}
}
