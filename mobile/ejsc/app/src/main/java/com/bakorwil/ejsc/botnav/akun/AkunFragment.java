package com.bakorwil.ejsc.botnav.akun;


import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;


import com.bakorwil.ejsc.DialogKontak;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.EditAkunActivity;
import com.bakorwil.ejsc.akun.LoginActivity;

import org.json.JSONArray;

import static android.content.Context.MODE_PRIVATE;


public class AkunFragment extends Fragment {
    TextView editAkun, txt_nama, txt_email, keluar, kontakkami;
    ProgressDialog progressDialog;
    JSONArray arr;
    String cmail, cnama;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_akun, container, false);

        bacaPreferensi();
        txt_nama = view.findViewById(R.id.txt_nama);
        txt_nama.setText(cnama);
        txt_email = view.findViewById(R.id.txt_email);
        txt_email.setText(cmail);
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
                Intent keluar = new Intent(getActivity(), LoginActivity.class);
                startActivity(keluar);
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

    private void bacaPreferensi() {
        SharedPreferences pref = getActivity().getSharedPreferences("akun", MODE_PRIVATE);
        cmail = pref.getString("email", "0");
        cnama = pref.getString("nama", "0");
    }
}

