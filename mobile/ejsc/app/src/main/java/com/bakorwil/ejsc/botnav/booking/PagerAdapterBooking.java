package com.bakorwil.ejsc.botnav.booking;

import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentStatePagerAdapter;

public class PagerAdapterBooking extends FragmentStatePagerAdapter {
    private int number_tabs;

    public PagerAdapterBooking(FragmentManager fm, int number_tabs) {
        super(fm);
        this.number_tabs = number_tabs;
    }

    @Override
    public Fragment getItem(int i) {
        switch (i) {
            case 0:
                return new RuanganFragment();
            case 1:
                return new RiwayatFragment();
            default:
                return null;
        }
    }

    @Override
    public int getCount() {
        return number_tabs;
    }
}
