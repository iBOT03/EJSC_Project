package com.bakorwil.ejsc.botnav.akun;


import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.EditAkunActivity;
import com.bakorwil.ejsc.akun.LoginActivity;
import com.bakorwil.ejsc.configfile.Preferences;

import org.json.JSONArray;

public class AkunFragment extends Fragment {
    TextView editAkun, txt_nama, txt_email, keluar, kontakkami;
    ProgressDialog progressDialog;
    JSONArray arr;
    String xemail, xnama;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_akun, container, false);

        txt_nama = view.findViewById(R.id.txt_nama);
        xnama = Preferences.getInstance(getContext()).getNama();
        txt_nama.setText(xnama);
        txt_email = view.findViewById(R.id.txt_email);
        xemail = Preferences.getInstance(getContext()).getEmail();
        txt_email.setText(xemail);
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
                                Preferences.getInstance(getContext()).logout();
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
}