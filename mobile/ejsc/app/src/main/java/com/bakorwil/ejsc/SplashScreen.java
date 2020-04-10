package com.bakorwil.ejsc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;

import com.bakorwil.ejsc.akun.LoginActivity;

import static java.lang.Thread.sleep;

public class SplashScreen extends AppCompatActivity {
    private int time = 1000;
    String profil;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splashscreen);

        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                try {
                    sleep(1000);
                    SplashScreen.this.finish();
                    Intent b = new Intent(SplashScreen.this, LoginActivity.class);
                    startActivity(b);
                } catch (InterruptedException e) {

                    e.printStackTrace();
                }
            }
        }, time);
    }
}
