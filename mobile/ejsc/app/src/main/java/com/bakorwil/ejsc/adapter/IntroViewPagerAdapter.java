package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.viewpager.widget.PagerAdapter;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.model.ScreenItem;

import java.util.List;

public class IntroViewPagerAdapter extends PagerAdapter {
    Context mCtx;
    List<ScreenItem> mList;

    public IntroViewPagerAdapter(Context mCtx, List<ScreenItem> mList) {
        this.mCtx = mCtx;
        this.mList = mList;
    }

    public Object instantiateItem(@NonNull ViewGroup container, int position) {
        LayoutInflater inflater = (LayoutInflater) mCtx.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View layoutScreen = inflater.inflate(R.layout.layout_screen, null);
        ImageView imgSlide = layoutScreen.findViewById(R.id.intro_img);
        imgSlide.setImageResource(mList.get(position).getImage());
        container.addView(layoutScreen);

        return layoutScreen;
    }

    public int getCount() {
        return mList.size();
    }

    @Override
    public boolean isViewFromObject(@NonNull View view, @NonNull Object o) {
        return view == o;
    }

    @Override
    public void destroyItem(@NonNull ViewGroup container, int position, @NonNull Object object) {
        container.removeView((View) object);
    }
}