package com.bakorwil.ejsc.botnav.beranda;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import com.bakorwil.ejsc.R;

public class NotifikasiActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notifikasi);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
    }
}
