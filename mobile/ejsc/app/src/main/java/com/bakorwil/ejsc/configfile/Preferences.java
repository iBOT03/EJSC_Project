package com.bakorwil.ejsc.configfile;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

public class Preferences {
    static final String KEY_EMAIL_TEREGISTER = "email", KEY_PASS_TEREGISTER = "password";
    static final String KEY_EMAIL_SEDANG_LOGIN = "Email_logged_in";
    static final String KEY_STATUS_SEDANG_LOGIN = "Status_logged_in";

    private static SharedPreferences getSharedPreference(Context context) {
        return PreferenceManager.getDefaultSharedPreferences(context);
    }

    public static void setRegisteredEmail(Context context, String email) {
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(KEY_EMAIL_TEREGISTER, email);
        editor.apply();
    }

    public static String getRegisteredEmail(Context context) {
        return getSharedPreference(context).getString(KEY_EMAIL_TEREGISTER, "");
    }

    public static void setRegisteredPass(Context context, String password) {
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(KEY_PASS_TEREGISTER, password);
        editor.apply();
    }

    public static String getRegisteredPass(Context context) {
        return getSharedPreference(context).getString(KEY_PASS_TEREGISTER, "");
    }

    public static void setLoggedInEmail(Context context, String email) {
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putString(KEY_EMAIL_SEDANG_LOGIN, email);
        editor.apply();
    }

    public static String getLoggedInEmail(Context context) {
        return getSharedPreference(context).getString(KEY_EMAIL_SEDANG_LOGIN, "");
    }

    public static void setLoggedInStatus(Context context, boolean status) {
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.putBoolean(KEY_STATUS_SEDANG_LOGIN, status);
        editor.apply();
    }

    public static Boolean getLoggedInStatus(Context context) {
        return getSharedPreference(context).getBoolean(KEY_STATUS_SEDANG_LOGIN, false);
    }

    public static void clearLoginInEmail(Context context) {
        SharedPreferences.Editor editor = getSharedPreference(context).edit();
        editor.remove(KEY_EMAIL_SEDANG_LOGIN);
        editor.remove(KEY_STATUS_SEDANG_LOGIN);
        editor.apply();
    }
}
