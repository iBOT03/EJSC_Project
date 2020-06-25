package com.bakorwil.ejsc.configfile;

import android.content.Context;
import android.content.SharedPreferences;

public class AuthData {

    private static AuthData mInstance;
    public static Context mCtx;

    public static final String SHARED_PREF_NAME = "shareejsc";

    private AuthData(Context context) {
        mCtx = context;
    }

    public static synchronized AuthData getInstance(Context context) {
        if (mInstance == null) {
            mInstance = new AuthData(context);
        }
        return mInstance;
    }

    public boolean logout() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        return true;
    }
}
