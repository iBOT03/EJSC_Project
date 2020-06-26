package com.bakorwil.ejsc.akun;

import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.ServerApi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class DaftarActivity extends AppCompatActivity {
    Button komunitas, btn_daftar, pilih_foto_ktp;
    TextView btn_masuk;
    //    private ImageView preview_foto_ktp;
//    Bitmap bitmap;
//    public static final int REQUEST_CODE_CAMERA = 001;
//    public static final int REQUEST_CODE_GALLERY = 002;
    ProgressDialog pd;
    EditText nik, nama, email, no_telepon, alamat, password, konfirmasi_pasword;
    ArrayList<String> datakomunitas = new ArrayList<String>();
    ArrayList<String> indexkomunitas = new ArrayList<String>();
    public String kodekomunitas = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar);

        btn_masuk = findViewById(R.id.btnMasuk);
        btn_masuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent masuk = new Intent(DaftarActivity.this, LoginActivity.class);
                startActivity(masuk);
            }
        });

        pd = new ProgressDialog(DaftarActivity.this);
        nik = findViewById(R.id.edt_nik);
        nama = findViewById(R.id.edt_nama);
        email = findViewById(R.id.edt_email);
        no_telepon = findViewById(R.id.edt_nomor_telepon);
        alamat = findViewById(R.id.edt_alamat);
//        preview_foto_ktp = findViewById(R.id.preview_foto_ktp);
        password = findViewById(R.id.edt_password);
        konfirmasi_pasword = findViewById(R.id.edt_confirm_password_daftar);

        komunitas = findViewById(R.id.btnPilihKomunitas);
        getkomunitas();
        komunitas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                androidx.appcompat.app.AlertDialog.Builder pictureDialog = new androidx.appcompat.app.AlertDialog.Builder(DaftarActivity.this);
                pictureDialog.setTitle("Pilih Komunitas Anda");
                pictureDialog.setItems(datakomunitas.toArray(new String[0]),
                        new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                kodekomunitas = indexkomunitas.get(which);
                                Log.e("id komunitas: ", "" + kodekomunitas);
                                komunitas.setText(datakomunitas.get(which));
                            }
                        });
                pictureDialog.show();
            }
        });

//        pilih_foto_ktp = findViewById(R.id.btnUploadFotoKTP);
//        pilih_foto_ktp.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                if (android.os.Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
//                    checkCameraPermission();
//                }
//                setRequestImage();
//            }
//        });

        btn_daftar = findViewById(R.id.btnDaftar);
        btn_daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pd.setMessage("Mohon Tunggu Sebentar");
                pd.show();
                if (nik.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "NIK tidak boleh kosong", Toast.LENGTH_LONG).show();
                    pd.dismiss();
                } else if (nama.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Nama lengkap tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (email.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Email tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (kodekomunitas.isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Komunitas tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (no_telepon.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Nomor telepon tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (alamat.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Alamat tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (password.getText().toString().isEmpty()) {
                    Toast.makeText(DaftarActivity.this, "Kata sandi tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (!password.getText().toString().equals(konfirmasi_pasword.getText().toString())) {
                    Toast.makeText(DaftarActivity.this, "Kata Sandi Harus sama", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else {
                    pd.setTitle("Mohon Tunggu Sebentar");
                    pd.show();
//                    StringRequest senddata = new StringRequest(Request.Method.POST, ServerApi.URL_DAFTAR, new Response.Listener<String>() {
//                        @Override
//                        public void onResponse(String response) {
//                            JSONObject res = null;
//                            try {
//                                pd.dismiss();
//                                res = new JSONObject(response);
//                                Log.d("error di ", response);
//                                if (res.getBoolean("status")) {
//                                    Toast.makeText(DaftarActivity.this, "Registrasi Akun Berhasil", Toast.LENGTH_SHORT).show();
//                                    Intent moving = new Intent(DaftarActivity.this, UploadFotoKtpActivity.class);
//                                    startActivity(moving);
//                                } else {
//                                    Toast.makeText(DaftarActivity.this, res.getString("message"), Toast.LENGTH_SHORT).show();
//
//                                }
//                            } catch (JSONException e) {
//                                pd.dismiss();
//                                Log.e("errorgan", e.getMessage());
//                            }
//                        }
//                    },
//                            new Response.ErrorListener() {
//                                @Override
//                                public void onErrorResponse(VolleyError error) {
//                                    pd.dismiss();
//                                    Log.e("errornyaa ", "" + error);
//                                    Toast.makeText(DaftarActivity.this, "Gagal Register", Toast.LENGTH_SHORT).show();
//                                }
//
//                            }) {
//                        @Override
//                        protected Map<String, String> getParams() throws AuthFailureError {
//                            Map<String, String> params = new HashMap<>();
//                            params.put("nik", nik.getText().toString());
//                            params.put("level", "2");
//                            params.put("foto_ktp", "ktp.jpg");
//                            params.put("nama_lengkap", nama.getText().toString());
//                            params.put("email", email.getText().toString());
//                            params.put("no_telepon", no_telepon.getText().toString());
//                            params.put("alamat", alamat.getText().toString());
//                            params.put("id_komunitas", kodekomunitas);
//                            params.put("password", password.getText().toString());
//
//                            return params;
//                        }
//                    };
//                    AppController.getInstance().addToRequestQueue(senddata);
                    Intent move_data = new Intent(DaftarActivity.this, UploadFotoKtpActivity.class);
                    move_data.putExtra("nik", nik.getText().toString());
                    move_data.putExtra("level", "2");
                    move_data.putExtra("nama_lengkap", nama.getText().toString());
                    move_data.putExtra("email", email.getText().toString());
                    move_data.putExtra("no_telepon", no_telepon.getText().toString());
                    move_data.putExtra("alamat", alamat.getText().toString());
                    move_data.putExtra("id_komunitas", kodekomunitas);
                    move_data.putExtra("password", password.getText().toString());
                    startActivity(move_data);
                    Log.e("move data: ", "" + move_data);
                }
            }
        });
    }

    private void getkomunitas() {
        datakomunitas.clear();
        indexkomunitas.clear();
        StringRequest senddata = new StringRequest(Request.Method.GET, ServerApi.URL_GET_KOMUNITAS, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                JSONObject res = null;
                try {
                    res = new JSONObject(response);
                    if (res.getBoolean("status")) {
                        JSONArray arr = res.getJSONArray("data_komunitas");
                        for (int i = 0; i < arr.length(); i++) {
                            try {
                                JSONObject datakom = arr.getJSONObject(i);
                                String namakom = datakom.getString("NAMA_KOMUNITAS");
                                String idkom = datakom.getString("ID_KOMUNITAS");
                                datakomunitas.add(namakom);
                                indexkomunitas.add(idkom);
                            } catch (Exception ea) {
                                ea.printStackTrace();
                            }
                        }
                    } else {
                        Toast.makeText(DaftarActivity.this, res.getString("message"), Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Log.d("volley", "errornya : " + error.getMessage());
                    }
                }) {

            @Override
            public Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<String, String>();
                params.put("ID_KOMUNITAS", kodekomunitas);
                return params;
            }
        };
        AppController.getInstance().addToRequestQueue(senddata);
    }

//    private void setRequestImage() {
//        CharSequence[] item = {"Kamera", "Galeri"};
//        AlertDialog.Builder request = new AlertDialog.Builder(this)
//                .setTitle("Pilih Foto KTP Anda")
//                .setItems(item, new DialogInterface.OnClickListener() {
//                    @Override
//                    public void onClick(DialogInterface dialogInterface, int i) {
//                        switch (i) {
//                            case 0:
//                                //Membuka Kamera Untuk Mengambil Gambar
//                                EasyImage.openCamera(DaftarActivity.this, REQUEST_CODE_CAMERA);
//                                break;
//                            case 1:
//                                //Membuaka Galeri Untuk Mengambil Gambar
//                                EasyImage.openGallery(DaftarActivity.this, REQUEST_CODE_GALLERY);
//                                break;
//                        }
//                    }
//                });
//        request.create();
//        request.show();
//    }
//
//    //Method Ini Digunakan Untuk Menapatkan Hasil pada Activity, dari Proses Yang kita buat sebelumnya
//    //Dan Mendapatkan Hasil File Photo dari Galeri atau Kamera
//    @Override
//    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
//        super.onActivityResult(requestCode, resultCode, data);
//        EasyImage.handleActivityResult(requestCode, resultCode, data, this, new EasyImage.Callbacks() {
//
//            @Override
//            public void onImagePickerError(Exception e, EasyImage.ImageSource source, int type) {
//                //Method Ini Digunakan Untuk Menghandle Error pada Image
//            }
//
//            @Override
//            public void onImagePicked(File imageFile, EasyImage.ImageSource source, int type) {
//
//                //Method Ini Digunakan Untuk Menghandle Image
//                switch (type) {
//                    case REQUEST_CODE_CAMERA:
//                        Glide.with(DaftarActivity.this)
//                                .load(imageFile)
//                                .centerCrop()
//                                .diskCacheStrategy(DiskCacheStrategy.ALL)
//                                .into(preview_foto_ktp);
//                        bitmap = BitmapFactory.decodeFile(imageFile.getPath());
//                        break;
//
//                    case REQUEST_CODE_GALLERY:
//                        Glide.with(DaftarActivity.this)
//                                .load(imageFile)
//                                .centerCrop()
//                                .diskCacheStrategy(DiskCacheStrategy.ALL)
//                                .into(preview_foto_ktp);
//                        bitmap = BitmapFactory.decodeFile(imageFile.getPath());
//                        break;
//                }
//            }
//
//            @Override
//            public void onCanceled(EasyImage.ImageSource source, int type) {
//                //Batalkan penanganan, Anda mungkin ingin menghapus foto yang diambil jika dibatalkan
//            }
//        });
//    }
//
//    public boolean checkCameraPermission() {
//        if (ContextCompat.checkSelfPermission(this,
//                Manifest.permission.CAMERA)
//                != PackageManager.PERMISSION_GRANTED) {
//            if (ActivityCompat.shouldShowRequestPermissionRationale(this,
//                    Manifest.permission.CAMERA)) {
//                ActivityCompat.requestPermissions(this,
//                        new String[]{Manifest.permission.CAMERA},
//                        REQUEST_CODE_CAMERA);
//            } else {
//                ActivityCompat.requestPermissions(this,
//                        new String[]{Manifest.permission.CAMERA},
//                        REQUEST_CODE_CAMERA);
//            }
//            return false;
//        } else {
//            return true;
//        }
//    }
//
//    private void requestMultiplePermissions() {
//        Dexter.withActivity(this)
//                .withPermissions(
//                        Manifest.permission.CAMERA,
//                        Manifest.permission.WRITE_EXTERNAL_STORAGE,
//                        Manifest.permission.READ_EXTERNAL_STORAGE)
//                .withListener(new MultiplePermissionsListener() {
//                    @Override
//                    public void onPermissionsChecked(MultiplePermissionsReport report) {
//                        // check if all permissions are granted
//                        if (report.areAllPermissionsGranted()) {
////                            Toast.makeText(getApplicationContext(), "All permissions are granted by user!", Toast.LENGTH_SHORT).show();
//                        }
//
//                        // check for permanent denial of any permission
//                        if (report.isAnyPermissionPermanentlyDenied()) {
//                            // show alert dialog navigating to Settings
//                            //openSettingsDialog();
//                        }
//                    }
//
//                    @Override
//                    public void onPermissionRationaleShouldBeShown(List<PermissionRequest> permissions, PermissionToken token) {
//                        token.continuePermissionRequest();
//                    }
//                }).
//                withErrorListener(new PermissionRequestErrorListener() {
//                    @Override
//                    public void onError(DexterError error) {
//                        Toast.makeText(getApplicationContext(), "Some Error! ", Toast.LENGTH_SHORT).show();
//                    }
//                })
//                .onSameThread()
//                .check();
//    }
//
//    public byte[] getFileDataFromDrawable(Bitmap bitmap) {
//        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
//        bitmap.compress(Bitmap.CompressFormat.PNG, 80, byteArrayOutputStream);
//        bitmap.compress(Bitmap.CompressFormat.JPEG, 80, byteArrayOutputStream);
//        return byteArrayOutputStream.toByteArray();
//    }
}
