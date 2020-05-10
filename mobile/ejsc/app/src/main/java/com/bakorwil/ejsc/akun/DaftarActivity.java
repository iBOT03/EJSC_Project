package com.bakorwil.ejsc.akun;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.provider.MediaStore;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.JSONParser;
import com.bakorwil.ejsc.configfile.ServerApi;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.ByteArrayOutputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.net.ssl.HttpsURLConnection;

public class DaftarActivity extends AppCompatActivity implements View.OnClickListener, AdapterView.OnItemSelectedListener{
    Button btnDaftar,btnktp;
    TextView masuk;
    EditText edt_nik, edt_nama, edt_email, edt_nomor_telepon, edt_alamat, edt_password, edt_kofirmasi_password, edt_komunitas;
    //String NIKHolder, NamaHolder, EmailHolder, TeleponHolder, AlamatHolder, PasswordHolder, ConfirmPasswordHolder;
    ProgressDialog progressDialog;
    ProgressBar progressBar;
    RequestQueue requestQueue;
    //    String HttpUrl = "http://192.168.1.4/EJSC_Project/mobile/api/daftar.php";
    Boolean CheckEditText;
    String[] komunts = { "Musician", "Testd" };
    private int GALLERY = 1, CAMERA = 2;
    HttpURLConnection httpURLConnection;
    ByteArrayOutputStream byteArrayOutputStream;
    byte[] byteArray;
    URL url;
    OutputStream outputStream;
    BufferedWriter bufferedWriter;
    int RC;
    BufferedReader bufferedReader;
    String ConvertImage;
    StringBuilder stringBuilder;
    boolean check = true;
    boolean status;
    JSONArray _JSONarray = null;
    String pesan;
    Bitmap FixBitmap;
    ImageView ShowSelectedImage;
    String nik,nama,email,nohp,alamat,komunitas,passwd,konpasswd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar);

        progressBar = new ProgressBar(DaftarActivity.this);
        progressBar.setVisibility(View.GONE);
        requestQueue = Volley.newRequestQueue(DaftarActivity.this);
        progressDialog = new ProgressDialog(this);

        edt_nik = findViewById(R.id.edt_nik);
        edt_nama = findViewById(R.id.edt_nama);
        edt_email = findViewById(R.id.edt_email);
        edt_komunitas = findViewById(R.id.edt_komunitas);
        Spinner spin = (Spinner) findViewById(R.id.btnPilihKomunitas);
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, komunts);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spin.setAdapter(adapter);
        spin.setOnItemSelectedListener(this);
        edt_nomor_telepon = findViewById(R.id.edt_nomor_telepon);
        edt_alamat = findViewById(R.id.edt_alamat);
        edt_password = findViewById(R.id.edt_password);
        edt_kofirmasi_password = findViewById(R.id.edt_confirm_password_daftar);
        btnDaftar = findViewById(R.id.buttonDaftar);
        masuk = findViewById(R.id.btnMasuk);
        btnktp = findViewById(R.id.btnUploadFotoKTP);
        btnktp.setOnClickListener(this);
        btnDaftar.setOnClickListener(this);
        masuk.setOnClickListener(this);

        ShowSelectedImage = findViewById(R.id.imageView3profile);

    }
    //    public void UploadImageToServer() {
//        if (FixBitmap!=null) {
//            FixBitmap.compress(Bitmap.CompressFormat.JPEG, 40, byteArrayOutputStream);
//            byteArray = byteArrayOutputStream.toByteArray();
//            ConvertImage = Base64.encodeToString(byteArray, Base64.DEFAULT);
//            ConvertImage="";
//        }else {
//            ConvertImage="";
//        }
//        class AsyncTaskUploadClass extends AsyncTask<Void, Void, String> {
//            @Override
//            protected void onPreExecute() {
//                super.onPreExecute();
//                progressDialog = ProgressDialog.show(DaftarActivity.this, "Registrasi data ..", "Please Wait", false, false);
//            }
//
//            @Override
//            protected void onPostExecute(String string1) {
//                super.onPostExecute(string1);
//                Toast.makeText(DaftarActivity.this, string1, Toast.LENGTH_LONG).show();
//                progressDialog.dismiss();
//
//            }
//
//            @Override
//            protected String doInBackground(Void... params) {
//                ImageProcessClass imageProcessClass = new ImageProcessClass();
//                HashMap<String, String> HashMapParams = new HashMap<String, String>();
//                HashMapParams.put("nik", nik);
//                HashMapParams.put("level", "2");
//                HashMapParams.put("nama_lengkap", nama);
//                HashMapParams.put("email", email);
//                HashMapParams.put("id_komunitas", komunitas);
//                HashMapParams.put("no_telepon", nohp);
//                HashMapParams.put("alamat", alamat);
//                HashMapParams.put("foto_ktp", ConvertImage);
//                HashMapParams.put("password", passwd);
//                String FinalData = imageProcessClass.ImageHttpRequest(ServerApi.URL_DAFTAR, HashMapParams);
//                return FinalData;
//            }
//        }
//        AsyncTaskUploadClass AsyncTaskUploadClassOBJ = new AsyncTaskUploadClass();
//        AsyncTaskUploadClassOBJ.execute();
//    }
    class daftar extends AsyncTask<String, String, String>{
        protected void onPreExecute() {
            super.onPreExecute();
            progressDialog = ProgressDialog.show(DaftarActivity.this, "Registrasi data ..", "Please Wait", false, false);
        }

        @Override
        protected String doInBackground(String... strings) {
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("nik", nik));
            params.add(new BasicNameValuePair("level", "2"));
            params.add(new BasicNameValuePair("nama_lengkap", nama));
            params.add(new BasicNameValuePair("email", email));
            params.add(new BasicNameValuePair("id_komunitas", komunitas));
            params.add(new BasicNameValuePair("no_telepon", nohp));
            params.add(new BasicNameValuePair("alamat", alamat));
            params.add(new BasicNameValuePair("foto_ktp", "ktp.jpg"));
            params.add(new BasicNameValuePair("password", passwd));
            System.out.println(params);
            JSONObject json = JSONParser.makeHttpRequest(ServerApi.URL_DAFTAR, "POST", params);
            if(json != null){
                try {
                    status = json.getBoolean("status");
                    pesan = json.getString("message");
                    if(status == true) {
                        runOnUiThread(new Runnable() {
                            public void run() {
                                startActivity(new Intent(getApplicationContext(), LoginActivity.class));
                                finish();
                            }
                        });
                    } else {

                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
            return null;
        }
        protected void onProgressUpdate(String... progress) {
            super.onProgressUpdate(progress);
        }
        protected void onPostExecute(String file_url) {
            new Handler().postDelayed(new Runnable() {
                @Override
                public void run() {
                }
            }, 5000);
            if (status == true) {
                Toast.makeText(DaftarActivity.this, pesan, Toast.LENGTH_LONG).show();
                progressDialog.dismiss();
            } else {
                Toast.makeText(DaftarActivity.this, pesan, Toast.LENGTH_LONG).show();
                progressDialog.dismiss();
            }
        }
    }
    public class ImageProcessClass {
        public String ImageHttpRequest(String requestURL, HashMap<String, String> PData) {
            StringBuilder stringBuilder = new StringBuilder();
            try {
                url = new URL(requestURL);
                httpURLConnection = (HttpURLConnection) url.openConnection();
                httpURLConnection.setReadTimeout(20000);
                httpURLConnection.setConnectTimeout(20000);
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoInput(true);
                httpURLConnection.setDoOutput(true);
                outputStream = httpURLConnection.getOutputStream();
                bufferedWriter = new BufferedWriter(
                        new OutputStreamWriter(outputStream, "UTF-8"));
                bufferedWriter.write(bufferedWriterDataFN(PData));
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();
                RC = httpURLConnection.getResponseCode();
                if (RC == HttpsURLConnection.HTTP_OK) {

                    bufferedReader = new BufferedReader(new InputStreamReader(httpURLConnection.getInputStream()));
                    stringBuilder = new StringBuilder();
                    String RC2;
                    while ((RC2 = bufferedReader.readLine()) != null) {
                        stringBuilder.append(RC2);
                    }
                }
            } catch (Exception e) {
                e.printStackTrace();
            }
            return stringBuilder.toString();
        }

        private String bufferedWriterDataFN(HashMap<String, String> HashMapParams) throws UnsupportedEncodingException {
            stringBuilder = new StringBuilder();
            for (Map.Entry<String, String> KEY : HashMapParams.entrySet()) {
                if (check)
                    check = false;
                else
                    stringBuilder.append("&");
                stringBuilder.append(URLEncoder.encode(KEY.getKey(), "UTF-8"));
                stringBuilder.append("=");
                stringBuilder.append(URLEncoder.encode(KEY.getValue(), "UTF-8"));
            }
            return stringBuilder.toString();
        }
    }
    private void showPictureDialog() {
        AlertDialog.Builder pictureDialog = new AlertDialog.Builder(this);
        pictureDialog.setTitle("Select Action");
        String[] pictureDialogItems = {
                "Photo Gallery",
                "Camera"};
        pictureDialog.setItems(pictureDialogItems,
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        switch (which) {
                            case 0:
                                choosePhotoFromGallary();
                                break;
                            case 1:
                                takePhotoFromCamera();
                                break;
                        }
                    }
                });
        pictureDialog.show();
    }
    public void choosePhotoFromGallary() {
        Intent galleryIntent = new Intent(Intent.ACTION_PICK,
                android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
        startActivityForResult(galleryIntent, GALLERY);
    }

    private void takePhotoFromCamera() {
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, CAMERA);
    }
    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == this.RESULT_CANCELED) {
            return;
        }
        if (requestCode == GALLERY) {
            if (data != null) {
                Uri contentURI = data.getData();
                try {
                    FixBitmap = MediaStore.Images.Media.getBitmap(this.getContentResolver(), contentURI);
                    ShowSelectedImage.setImageBitmap(FixBitmap);
                    //btnDaftar.setVisibility(View.VISIBLE);
                } catch (IOException e) {
                    e.printStackTrace();
                    Toast.makeText(DaftarActivity.this, "Failed!", Toast.LENGTH_SHORT).show();

                }
            }

        } else if (requestCode == CAMERA) {
            FixBitmap = (Bitmap) data.getExtras().get("data");
            ShowSelectedImage.setImageBitmap(FixBitmap);
        }
    }
    public void onClick(View vie){
        switch (vie.getId()){
            case R.id.btnMasuk:
                startActivity(new Intent(getApplicationContext(),LoginActivity.class));
                finish();
                break;
            case R.id.btnUploadFotoKTP:
                showPictureDialog();
                break;
            case R.id.buttonDaftar:
                nik = edt_nik.getText().toString();
                nama = edt_nama.getText().toString();
                email = edt_email.getText().toString();
                nohp = edt_nomor_telepon.getText().toString();
                alamat = edt_alamat.getText().toString();
                komunitas = edt_komunitas.getText().toString();
                passwd = edt_password.getText().toString();
                konpasswd = edt_kofirmasi_password.getText().toString();
                if (nik.equals("")){
                    edt_nik.setError("Tidak Boleh kosong");
                    edt_nik.requestFocus();
                } else if(nama.equals("")){
                    edt_nama.setError("Tidak Boleh kosong");
                    edt_nama.requestFocus();
                } else if(email.equals("")){
                    edt_email.setError("Tidak Boleh kosong");
                    edt_email.requestFocus();
                } else if(nohp.equals("")){
                    edt_nomor_telepon.setError("Tidak Boleh kosong");
                    edt_nomor_telepon.requestFocus();
                } else if(alamat.equals("")){
                    edt_alamat.setError("Tidak Boleh kosong");
                    edt_alamat.requestFocus();
                } else if(komunitas.equals("")) {
                    edt_komunitas.setError("Tidak Boleh kosong");
                    edt_komunitas.requestFocus();
                } else if (FixBitmap == null) {
                    Toast.makeText(DaftarActivity.this, "Gambar Masih Kosong !",Toast.LENGTH_SHORT).show();
                } else if(passwd.equals("")){
                    edt_password.setError("Tidak Boleh kosong");
                    edt_password.requestFocus();
                } else if(!konpasswd.equals(passwd)){
                    edt_kofirmasi_password.setError("Konfirmasi Password tidak sama !");
                    edt_kofirmasi_password.requestFocus();
                } else {
                    //UploadImageToServer();
                    new daftar().execute();
                }
                break;
        }
    }
    @Override
    public void onItemSelected(AdapterView<?> arg0, View arg1, int position,long id) {
        //Toast.makeText(getApplicationContext(), "Selected User: "+komunts[position] ,Toast.LENGTH_SHORT).show();
        edt_komunitas.setText(komunts[position]);
    }
    @Override
    public void onNothingSelected(AdapterView<?> arg0) {
        // TODO - Custom Code
    }
}
