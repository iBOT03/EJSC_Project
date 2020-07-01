package com.bakorwil.ejsc.configfile;

import android.content.Context;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;

public class Preferences {
    private static Preferences mInstance;
    public static Context mCtx;
    public static final String SHARED_PREF_NAME = "shareejsc";
    private static final String sudahlogin = "n";
    private static final String KEY_NIK = "nik";
    private static final String KEY_NAMA = "nama_lengkap";
    private static final String KEY_KOMUNITAS = "id_komunitas";
    private static final String KEY_EMAIL = "email";
    private static final String KEY_TELEPON = "no_telepon";
    private static final String KEY_ALAMAT = "alamat";
    private static final String KEY_TOKEN = "token";
    private static final String KEY_RUANGAN = "id_ruangan";

    private Preferences(Context context) {
        mCtx = context;
    }

    public static synchronized Preferences getInstance(Context context) {
        if (mInstance == null) {
            mInstance = new Preferences(context);
        }
        return mInstance;
    }

    public boolean setdatauser(String xnik, String xnama_lengkap, String xkomunitas, String xemail, String xtelepon, String xalamat, String xtoken) {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        editor.putString(KEY_NIK, xnik);
        editor.putString(KEY_NAMA, xnama_lengkap);
        editor.putString(KEY_KOMUNITAS, xkomunitas);
        editor.putString(KEY_EMAIL, xemail);
        editor.putString(KEY_TELEPON, xtelepon);
        editor.putString(KEY_ALAMAT, xalamat);
        editor.putString(sudahlogin, "y");
        editor.putString(KEY_TOKEN, xtoken);
        editor.apply();
        return true;
    }

    private static SharedPreferences getSharedPreference(Context context) {
        return PreferenceManager.getDefaultSharedPreferences(context);
    }

    public String getNik() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_NIK, null);
    }

    public String getNama() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_NAMA, null);
    }

    public String getKomunitas() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_KOMUNITAS, null);
    }

    public String getEmail() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_EMAIL, null);
    }

    public String getTelepon() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_TELEPON, null);
    }

    public String getAlamat() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_ALAMAT, null);
    }

    public boolean ceklogin() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        if (sharedPreferences.getString(KEY_NIK, null) != null) {
            return true;
        }
        return false;
    }

    public boolean logout() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        return true;
    }
}