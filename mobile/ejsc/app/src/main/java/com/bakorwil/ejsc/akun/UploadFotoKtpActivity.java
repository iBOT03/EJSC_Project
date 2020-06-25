package com.bakorwil.ejsc.akun;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import android.Manifest;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.NetworkResponse;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.VolleyMultipartRequest;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.karumi.dexter.Dexter;
import com.karumi.dexter.MultiplePermissionsReport;
import com.karumi.dexter.PermissionToken;
import com.karumi.dexter.listener.DexterError;
import com.karumi.dexter.listener.PermissionRequest;
import com.karumi.dexter.listener.PermissionRequestErrorListener;
import com.karumi.dexter.listener.multi.MultiplePermissionsListener;

import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import pl.aprilapps.easyphotopicker.EasyImage;

public class UploadFotoKtpActivity extends AppCompatActivity {

    private ImageView preview_foto_ktp;
    ImageView btn_pilih_foto_ktp, btn_edit_foto_ktp;
    Bitmap bitmap;
    Button btn_simpan, btn_simpan_disable;
    ProgressDialog pd;
    String nik, level, nama_lengkap, email, no_telepon, alamat, id_komunitas, password;
    public static final int REQUEST_CODE_CAMERA = 001;
    public static final int REQUEST_CODE_GALLERY = 002;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_upload_foto_ktp);

        //Get intent parsing data dari DaftarActivity
        nik = getIntent().getStringExtra("nik");
        level = getIntent().getStringExtra("level");
        nama_lengkap = getIntent().getStringExtra("nama_lengkap");
        email = getIntent().getStringExtra("email");
        no_telepon = getIntent().getStringExtra("no_telepon");
        alamat = getIntent().getStringExtra("alamat");
        id_komunitas = getIntent().getStringExtra("id_komunitas");
        password = getIntent().getStringExtra("password");

        preview_foto_ktp = findViewById(R.id.preview_foto_ktp);
        pd = new ProgressDialog(this);

        btn_pilih_foto_ktp = findViewById(R.id.btn_tambah_foto);
        btn_pilih_foto_ktp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (android.os.Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    checkCameraPermission();
                }
                setRequestImage();
            }
        });

        btn_edit_foto_ktp = findViewById(R.id.btn_edit_foto);
        btn_edit_foto_ktp.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (android.os.Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {
                    checkCameraPermission();
                }
                setRequestImage();
            }
        });

        btn_simpan_disable = findViewById(R.id.btn_simpan_disable);
        btn_simpan = findViewById(R.id.btn_simpan);
        btn_simpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                simpanDataRegistrasi();
            }
        });
    }

    public void simpanDataRegistrasi() {
        pd.setMessage("Sedang mengunggah data, mohon tunggu sebentar");
        pd.show();
        VolleyMultipartRequest volleyMultipartRequest = new VolleyMultipartRequest(Request.Method.POST, ServerApi.URL_DAFTAR, new Response.Listener<NetworkResponse>() {
            @Override
            public void onResponse(NetworkResponse response) {
                try {
                    pd.dismiss();
                    Toast.makeText(UploadFotoKtpActivity.this, "Registrasi Akun Berhasil", Toast.LENGTH_SHORT).show();
                    Intent success = new Intent(UploadFotoKtpActivity.this, LoginActivity.class);
                    startActivity(success);
                    Log.e("error di ", response.toString());
                } catch (Exception e) {
                    Toast.makeText(UploadFotoKtpActivity.this, "Exception: " + e, Toast.LENGTH_SHORT).show();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(UploadFotoKtpActivity.this, "Error mas", Toast.LENGTH_SHORT).show();
                        Log.d("error di ", error.toString());
                        pd.dismiss();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nik", nik);
                params.put("level", level);
                params.put("nama_lengkap", nama_lengkap);
                params.put("email", email);
                params.put("no_telepon", no_telepon);
                params.put("alamat", alamat);
                params.put("id_komunitas", id_komunitas);
                params.put("password", password);
                Log.e("data: ", "" + params);
                return params;
            }

            @Override
            protected Map<String, DataPart> getByteData() {
                Map<String, DataPart> params = new HashMap<>();
                long imagename = System.currentTimeMillis();
                params.put("foto_ktp", new DataPart(imagename + ".png", getFileDataFromDrawable(bitmap)));
                Log.e("foto ktp: ", "" + params);
                return params;
            }
        };
        Volley.newRequestQueue(this).add(volleyMultipartRequest);
    }

    private void setRequestImage() {
        CharSequence[] item = {"Kamera", "Galeri"};
        AlertDialog.Builder request = new AlertDialog.Builder(this)
                .setTitle("Pilih Foto KTP Anda")
                .setItems(item, new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        switch (i) {
                            case 0:
                                //Membuka Kamera Untuk Mengambil Gambar
                                EasyImage.openCamera(UploadFotoKtpActivity.this, REQUEST_CODE_CAMERA);
                                break;
                            case 1:
                                //Membuaka Galeri Untuk Mengambil Gambar
                                EasyImage.openGallery(UploadFotoKtpActivity.this, REQUEST_CODE_GALLERY);
                                break;
                        }
                    }
                });
        request.create();
        request.show();
    }

    //Method Ini Digunakan Untuk Menapatkan Hasil pada Activity, dari Proses Yang kita buat sebelumnya
    //Dan Mendapatkan Hasil File Photo dari Galeri atau Kamera
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        EasyImage.handleActivityResult(requestCode, resultCode, data, this, new EasyImage.Callbacks() {

            @Override
            public void onImagePickerError(Exception e, EasyImage.ImageSource source, int type) {
                //Method Ini Digunakan Untuk Menghandle Error pada Image
            }

            @Override
            public void onImagePicked(File imageFile, EasyImage.ImageSource source, int type) {

                //Method Ini Digunakan Untuk Menghandle Image
                switch (type) {
                    case REQUEST_CODE_CAMERA:
                        Glide.with(UploadFotoKtpActivity.this)
                                .load(imageFile)
                                .centerCrop()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(preview_foto_ktp);
                        bitmap = BitmapFactory.decodeFile(imageFile.getPath());
                        break;

                    case REQUEST_CODE_GALLERY:
                        Glide.with(UploadFotoKtpActivity.this)
                                .load(imageFile)
                                .centerCrop()
                                .diskCacheStrategy(DiskCacheStrategy.ALL)
                                .into(preview_foto_ktp);
                        bitmap = BitmapFactory.decodeFile(imageFile.getPath());
                        break;
                }
                if (bitmap != null) {
                    btn_pilih_foto_ktp.setVisibility(View.GONE);
                    btn_edit_foto_ktp.setVisibility(View.VISIBLE);
                    btn_simpan.setVisibility(View.VISIBLE);
                    btn_simpan_disable.setVisibility(View.GONE);
                }
            }

            @Override
            public void onCanceled(EasyImage.ImageSource source, int type) {
                //Batalkan penanganan, Anda mungkin ingin menghapus foto yang diambil jika dibatalkan
                if (btn_edit_foto_ktp.isPressed()) {
                    if (source == EasyImage.ImageSource.CAMERA) {
                        File photoFile = EasyImage.lastlyTakenButCanceledPhoto(UploadFotoKtpActivity.this);
                        if (photoFile != null) photoFile.delete();
                    } else {
                        if (source == EasyImage.ImageSource.GALLERY) {
                            File galleryFile = EasyImage.lastlyTakenButCanceledPhoto(UploadFotoKtpActivity.this);
                            if (galleryFile != null) galleryFile.delete();
                        }
                    }
                }
            }
        });
    }

    public boolean checkCameraPermission() {
        if (ContextCompat.checkSelfPermission(this,
                Manifest.permission.CAMERA)
                != PackageManager.PERMISSION_GRANTED) {
            if (ActivityCompat.shouldShowRequestPermissionRationale(this,
                    Manifest.permission.CAMERA)) {
                ActivityCompat.requestPermissions(this,
                        new String[]{Manifest.permission.CAMERA},
                        REQUEST_CODE_CAMERA);
            } else {
                ActivityCompat.requestPermissions(this,
                        new String[]{Manifest.permission.CAMERA},
                        REQUEST_CODE_CAMERA);
            }
            return false;
        } else {
            return true;
        }
    }

    private void requestMultiplePermissions() {
        Dexter.withActivity(this)
                .withPermissions(
                        Manifest.permission.CAMERA,
                        Manifest.permission.WRITE_EXTERNAL_STORAGE,
                        Manifest.permission.READ_EXTERNAL_STORAGE)
                .withListener(new MultiplePermissionsListener() {
                    @Override
                    public void onPermissionsChecked(MultiplePermissionsReport report) {
                        // check if all permissions are granted
                        if (report.areAllPermissionsGranted()) {
//                            Toast.makeText(getApplicationContext(), "All permissions are granted by user!", Toast.LENGTH_SHORT).show();
                        }

                        // check for permanent denial of any permission
                        if (report.isAnyPermissionPermanentlyDenied()) {
                            // show alert dialog navigating to Settings
                            //openSettingsDialog();
                        }
                    }

                    @Override
                    public void onPermissionRationaleShouldBeShown(List<PermissionRequest> permissions, PermissionToken token) {
                        token.continuePermissionRequest();
                    }
                }).
                withErrorListener(new PermissionRequestErrorListener() {
                    @Override
                    public void onError(DexterError error) {
                        Toast.makeText(getApplicationContext(), "Some Error! ", Toast.LENGTH_SHORT).show();
                    }
                })
                .onSameThread()
                .check();
    }

    public byte[] getFileDataFromDrawable(Bitmap bitmap) {
        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.PNG, 80, byteArrayOutputStream);
        bitmap.compress(Bitmap.CompressFormat.JPEG, 80, byteArrayOutputStream);
        return byteArrayOutputStream.toByteArray();
    }
}