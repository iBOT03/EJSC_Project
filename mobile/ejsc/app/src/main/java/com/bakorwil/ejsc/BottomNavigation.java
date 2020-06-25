package com.bakorwil.ejsc;

import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MenuItem;

import com.bakorwil.ejsc.akun.LoginActivity;
import com.bakorwil.ejsc.botnav.akun.AkunFragment;
import com.bakorwil.ejsc.botnav.beranda.BerandaFragment;
import com.bakorwil.ejsc.botnav.booking.BookingFragment;
import com.bakorwil.ejsc.botnav.event.EventFragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.fragment.app.Fragment;
import androidx.navigation.NavController;
import androidx.navigation.Navigation;
import androidx.navigation.ui.AppBarConfiguration;
import androidx.navigation.ui.NavigationUI;

public class BottomNavigation extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bottom_navigation);
        loadFragment(new BerandaFragment());
        BottomNavigationView navView = findViewById(R.id.bn_main);
        navView.setOnNavigationItemSelectedListener(this);
        // Passing each menu ID as a set of Ids because each
        // menu should be considered as top level destinations.
    }

    private boolean loadFragment(Fragment fragment) {
        if (fragment != null) {
            getSupportFragmentManager().beginTransaction()
                    .replace(R.id.fl_container, fragment)
                    .commit();
            return true;
        }
        return false;
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
        Fragment fragment = null;

        switch (menuItem.getItemId()){
            case R.id.navigation_beranda:
                fragment = new BerandaFragment();
                break;
            case R.id.navigation_booking:
                fragment = new BookingFragment();
                break;
            case R.id.navigation_event:
                fragment = new EventFragment();
                break;
            case R.id.navigation_akun:
                fragment = new AkunFragment();
                break;
        }
        return loadFragment(fragment);
    }

//    public void onBackPressed() {
//        new AlertDialog.Builder(this)
//                .setIcon(R.drawable.logo_ejsc)
//                .setTitle("Keluar Aplikasi")
//                .setMessage("Apakah Anda ingin keluar dari aplikasi?")
//                .setPositiveButton("Ya", new DialogInterface.OnClickListener()
//                {
//                    @Override
//                    public void onClick(DialogInterface dialog, int which) {
//                        ActivityCompat.finishAffinity(BottomNavigation.this);
//                        finish();
//                    }
//
//                })
//                .setNegativeButton("Tidak", null)
//                .show();
//    }

    public void onBackPressed() {
        new AlertDialog.Builder(this)
                .setIcon(R.drawable.logo_ejsc)
                .setTitle("Keluar Aplikasi")
                .setMessage("Apakah Anda ingin keluar dari aplikasi?")
                .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        SharedPreferences pref = getSharedPreferences("akun", MODE_PRIVATE);
                        SharedPreferences.Editor editor = pref.edit();
                        editor.putString("email", "0");
                        editor.commit();
                        ActivityCompat.finishAffinity(BottomNavigation.this);
                        finish();
                        Intent it = new Intent(BottomNavigation.this, LoginActivity.class);
                        startActivity(it);
                    }

                })
                .setNegativeButton("Tidak", null)
                .show();
    }

}
