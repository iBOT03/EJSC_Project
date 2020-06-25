package com.bakorwil.ejsc.botnav.akun;


import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.core.app.ActivityCompat;
import androidx.fragment.app.Fragment;

import com.bakorwil.ejsc.DialogKontak;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.EditAkunActivity;
import com.bakorwil.ejsc.akun.LoginActivity;
import com.bakorwil.ejsc.configfile.Preferences;

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

//        bacaPreferensi();
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
//                SharedPreferences preferences = getActivity().getSharedPreferences("akun", MODE_PRIVATE);
//                cmail = preferences.getString("email", "0");
//                cnama = preferences.getString("nama", "0");
//                SharedPreferences.Editor editor = preferences.edit();
//                editor.clear();
//                editor.apply();
                new AlertDialog.Builder(getContext())
                        .setIcon(R.drawable.logo_ejsc)
                        .setTitle("Log Out")
                        .setMessage("Apakah Anda ingin log out dari EJSC?")
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

//    private void bacaPreferensi() {
//        SharedPreferences pref = getActivity().getSharedPreferences("akun", MODE_PRIVATE);
//        cmail = pref.getString("email", "0");
//        cnama = pref.getString("nama", "0");
//    }
}

