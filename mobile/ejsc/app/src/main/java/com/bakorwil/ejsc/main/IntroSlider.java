package com.bakorwil.ejsc.main;

import androidx.appcompat.app.AppCompatActivity;
import androidx.viewpager.widget.ViewPager;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.adapter.IntroViewPagerAdapter;
import com.bakorwil.ejsc.akun.DaftarActivity;
import com.bakorwil.ejsc.model.ScreenItem;
import com.google.android.material.tabs.TabLayout;

import java.util.ArrayList;
import java.util.List;

public class IntroSlider extends AppCompatActivity {
    private ViewPager viewPager;
    IntroViewPagerAdapter adapter;
    TabLayout tabLayout;
    ImageButton next;
    int position = 0;
    Button get, daftar;
    Animation btnAnim;
    TextView skip;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        if (restorePrefData()) {
            Intent splashActivity = new Intent(getApplicationContext(), SplashScreen.class);
            startActivity(splashActivity);
            finish();
        }

        setContentView(R.layout.activity_intro_slider);
        tabLayout = findViewById(R.id.tab_indicator);
        next = findViewById(R.id.btn_next);
        get = findViewById(R.id.btn_get_started);
        daftar = findViewById(R.id.btnDaftar);
        btnAnim = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.button_animation);
        skip = findViewById(R.id.tv_skip);

        final List<ScreenItem> screenItemList = new ArrayList<>();
        screenItemList.add(new ScreenItem("", "", R.drawable.sp_bakorwil));
        screenItemList.add(new ScreenItem("", "", R.drawable.sp_ejsc));

        viewPager = findViewById(R.id.screen_viewpager);
        adapter = new IntroViewPagerAdapter(this, screenItemList);
        viewPager.setAdapter(adapter);

        tabLayout.setupWithViewPager(viewPager);

        next.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                position = viewPager.getCurrentItem();
                if (position < screenItemList.size()) {
                    position++;
                    viewPager.setCurrentItem(position);
                }
                if (position == screenItemList.size() - 1) {
                    loaddLastScreen();
                }
            }
        });
        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent q = new Intent(IntroSlider.this, DaftarActivity.class);
                startActivity(q);
            }
        });

        get.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent q = new Intent(IntroSlider.this, com.bakorwil.ejsc.akun.LoginActivity.class);
                startActivity(q);
                savePrefsData();
                finish();

            }
        });
        tabLayout.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                if (tab.getPosition() == screenItemList.size() - 1) {
                    loaddLastScreen();
                }
            }

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {
            }

            @Override
            public void onTabReselected(TabLayout.Tab tab) {
            }
        });

        skip.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                viewPager.setCurrentItem(screenItemList.size());
            }
        });
    }

    private void loaddLastScreen() {
        next.setVisibility(View.INVISIBLE);
        get.setVisibility(View.VISIBLE);
        tabLayout.setVisibility(View.INVISIBLE);
        daftar.setVisibility(View.INVISIBLE);
        skip.setVisibility(View.INVISIBLE);
        get.setAnimation(btnAnim);
    }

    private boolean restorePrefData() {
        SharedPreferences pref = getApplicationContext().getSharedPreferences("myPrefs", MODE_PRIVATE);
        Boolean isIntroActivityOpenBefore = pref.getBoolean("isIntroOpen", false);
        return isIntroActivityOpenBefore;
    }

    private void savePrefsData() {
        SharedPreferences pref = getApplicationContext().getSharedPreferences("myPrefs", MODE_PRIVATE);
        SharedPreferences.Editor editor = pref.edit();
        editor.putBoolean("isIntroOpen", true);
        editor.commit();
    }
}