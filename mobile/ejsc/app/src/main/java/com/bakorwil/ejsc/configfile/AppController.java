package com.bakorwil.ejsc.configfile;

import android.app.Application;
import android.text.TextUtils;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;

//AppController digunakan untuk mengatur volley pada aplikasi
public class AppController extends Application {
    private final String TAG = AppController.class.getSimpleName();
    private static AppController instance;
    RequestQueue mRequest;

    @Override
    public void onCreate() {
        super.onCreate();
        instance = this;
    }

    public static synchronized AppController getInstance() {
        return instance;
    }

    private RequestQueue getmRequest() {
        if (mRequest == null) {
            mRequest = Volley.newRequestQueue(getApplicationContext());
        }
        return mRequest;
    }

    public <I> void addToRequestQueue(Request<I> req, String tag) {
        req.setTag(TextUtils.isEmpty(tag) ? TAG : tag);
        getmRequest().add(req);
    }

    public <I> void addToRequestQueue(Request<I> req) {
        req.setTag(TAG);
        getmRequest().add(req);
    }

    public void cancelAllRequestQueue(Object req) {
        if (mRequest != null) {
            mRequest.cancelAll(req);
        }
    }
}
