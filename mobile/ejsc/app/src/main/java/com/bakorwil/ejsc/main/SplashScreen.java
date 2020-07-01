package com.bakorwil.ejsc.main;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.Window;
import android.view.WindowManager;

import androidx.appcompat.app.AppCompatActivity;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.LoginActivity;
import com.bakorwil.ejsc.configfile.Preferences;

import static java.lang.Thread.sleep;

public class SplashScreen extends AppCompatActivity {
    private int time = 1000;
    String profil;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_splashscreen);

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                try {
                    sleep(1000);
                    SplashScreen.this.finish();
                    if (Preferences.getInstance(getApplicationContext()).ceklogin()) {
                        Intent success = new Intent(SplashScreen.this, BottomNavigation.class);
                        startActivity(success);
                    } else {
                        Intent error = new Intent(SplashScreen.this, LoginActivity.class);
                        startActivity(error);
                    }
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        }, time);
    }
}