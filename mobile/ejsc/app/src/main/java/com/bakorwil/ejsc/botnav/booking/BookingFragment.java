package com.bakorwil.ejsc.botnav.booking;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.viewpager.widget.ViewPager;

import com.bakorwil.ejsc.R;
import com.google.android.material.tabs.TabLayout;

public class BookingFragment extends Fragment {

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_booking, container, false);

        //Menerapkan TabLayout dan ViewPager pada Activity
        final TabLayout tabLayout = view.findViewById(R.id.tab_layout);
        final ViewPager viewPager = view.findViewById(R.id.view_pager);

        //Memanggil dan Memasukan Value pada Class PagerAdapter(FragmentManager dan JumlahTab)
        PagerAdapterBooking pagerAdapter = new PagerAdapterBooking(getChildFragmentManager(), tabLayout.getTabCount());

        //Memasang Adapter pada ViewPager
        viewPager.setAdapter(pagerAdapter);

        viewPager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));

        tabLayout.addOnTabSelectedListener(new TabLayout.OnTabSelectedListener() {
            @Override
            public void onTabSelected(TabLayout.Tab tab) {
                viewPager.setCurrentItem(tab.getPosition());
            }

            @Override
            public void onTabUnselected(TabLayout.Tab tab) {

            }

            @Override
            public void onTabReselected(TabLayout.Tab tab) {

            }
        });

        return view;
    }

}
