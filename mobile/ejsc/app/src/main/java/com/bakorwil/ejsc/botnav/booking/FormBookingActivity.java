package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.app.TimePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TimePicker;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.configfile.AppController;
import com.bakorwil.ejsc.configfile.Preferences;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Locale;
import java.util.Map;

public class FormBookingActivity extends AppCompatActivity {
    EditText nama, telepon, komunitas, nama_ruangan, tanggal, jam_mulai, durasi, jam_selesai, jumlah_peserta, tujuan, deskripsi;
    String status, ex_nama_ruangan, ex_kapasitas, exnama, extelepon, exkomunitas, exruangan, exnik, tessss, xnama_ruangan, xid_ruangan, xkapasitas;
    Button btn_booking_sekarang;
    ProgressDialog pd;

    final Calendar myCalendar = Calendar.getInstance();
    private int mYear, mMonth, mDay, mHour, mMinute;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.form_booking);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        //Get intent parsing data dari DetailRuangan
        ex_nama_ruangan = getIntent().getStringExtra("nama_ruangan");
        ex_kapasitas = getIntent().getStringExtra("kapasitas");
        xid_ruangan = getIntent().getStringExtra("id_ruangan");
        xnama_ruangan = getIntent().getStringExtra("nama_ruangan");
        xkapasitas = getIntent().getStringExtra("kapasitas");

        Log.e("INTENT_IDRUANGAN", "" + xid_ruangan);
        Log.e("INTENT_NAMARUANGAN", "" + xnama_ruangan);
        Log.e("INTENT_KAPASITAS", "" + xkapasitas);

        pd = new ProgressDialog(this);
        nama = findViewById(R.id.edt_nama);
        exnama = Preferences.getInstance(getApplicationContext()).getNama();
        nama.setText(exnama);
        telepon = findViewById(R.id.edt_telepon);
        extelepon = Preferences.getInstance(getApplicationContext()).getTelepon();
        telepon.setText(extelepon);
        komunitas = findViewById(R.id.edt_komunitas);
        exkomunitas = Preferences.getInstance(getApplicationContext()).getKomunitas();

        exnik = Preferences.getInstance(getApplicationContext()).getNik();
        Log.e("NIK", "" + exnik);
        komunitas.setText(exkomunitas);
        Log.e("IDKOMUNITASSSSS", "" + exkomunitas);
        nama_ruangan = findViewById(R.id.edt_nama_ruangan);
        nama_ruangan.setText(ex_nama_ruangan);

        tanggal = findViewById(R.id.edt_tanggal);
        tanggal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                final Calendar c = Calendar.getInstance();
                mYear = c.get(Calendar.YEAR);
                mMonth = c.get(Calendar.MONTH);
                mDay = c.get(Calendar.DAY_OF_MONTH);
                DatePickerDialog datePickerDialog = new DatePickerDialog(FormBookingActivity.this,
                        new DatePickerDialog.OnDateSetListener() {
                            @Override
                            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                                updateLabel();
                            }
                        }, mYear, mMonth, mDay);
                datePickerDialog.show();
            }
        });
        jam_mulai = findViewById(R.id.edt_jam_mulai);
        jam_mulai.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Calendar mcurrentTime = Calendar.getInstance();
                int hour = mcurrentTime.get(Calendar.HOUR_OF_DAY);
                int minute = mcurrentTime.get(Calendar.MINUTE);
                TimePickerDialog mTimePicker;
                mTimePicker = new TimePickerDialog(FormBookingActivity.this, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int selectedHour, int selectedMinute) {
                        jam_mulai.setText(selectedHour + ":" + selectedMinute);
                    }
                }, hour, minute, true);
                mTimePicker.setTitle("Jam Mulai");
                mTimePicker.show();
            }
        });
        durasi = findViewById(R.id.edt_durasi);
        jam_selesai = findViewById(R.id.edt_jam_selesai);
        jam_selesai.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Calendar mcurrentTime = Calendar.getInstance();
                int hour = mcurrentTime.get(Calendar.HOUR_OF_DAY);
                int minute = mcurrentTime.get(Calendar.MINUTE);
                TimePickerDialog mTimePicker;
                mTimePicker = new TimePickerDialog(FormBookingActivity.this, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int selectedHour, int selectedMinute) {
                        jam_selesai.setText(selectedHour + ":" + selectedMinute);
                    }
                }, hour, minute, true);
                mTimePicker.setTitle("Jam Selesai");
                mTimePicker.show();
            }
        });
        jumlah_peserta = findViewById(R.id.edt_jumlah_peserta);
        tujuan = findViewById(R.id.edt_tujuan);
        deskripsi = findViewById(R.id.edt_deskripsi_kegiatan);

        btn_booking_sekarang = findViewById(R.id.btn_booking);
        btn_booking_sekarang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pd.setMessage("Mohon Tunggu Sebentar");
                pd.show();
                if (jumlah_peserta.getText().toString() == xkapasitas) {
                    Toast.makeText(FormBookingActivity.this, "Jumlah peserta melebihi kapasitas ruangan", Toast.LENGTH_LONG).show();
                } else if (tanggal.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Tanggal tidak boleh kosong", Toast.LENGTH_LONG).show();
                    pd.dismiss();
                } else if (jam_mulai.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Jam mulai tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (durasi.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Durasi tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (jam_selesai.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Jam selesai tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (jumlah_peserta.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Jumlah peserta tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (tujuan.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Tujuan kegiatan tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else if (deskripsi.getText().toString().isEmpty()) {
                    Toast.makeText(FormBookingActivity.this, "Deskripsi kegiatan tidak boleh kosong", Toast.LENGTH_SHORT).show();
                    pd.dismiss();
                } else {
                    pd.setTitle("Mohon Tunggu Sebenta");
                    pd.show();
                    final StringRequest senddata = new StringRequest(Request.Method.POST, "https://ejsc.flow-byte.com/api/booking/tambah", new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            JSONObject res = null;
                            try {
                                pd.dismiss();
                                res = new JSONObject(response);
                                Log.d("error di ", response);
                                if (res.getBoolean("status")) {
                                    Toast.makeText(FormBookingActivity.this, "Booking ruangan berhasil", Toast.LENGTH_SHORT).show();
                                    Intent moving = new Intent(FormBookingActivity.this, InvoiceActivity.class);
                                    moving.putExtra("nama", nama.getText().toString());
                                    moving.putExtra("no_telepon", telepon.getText().toString());
                                    moving.putExtra("id_komunitas", komunitas.getText().toString());
                                    moving.putExtra("id_ruangan", nama_ruangan.getText().toString());
                                    moving.putExtra("deskripsi", deskripsi.getText().toString());
                                    moving.putExtra("tujuan", tujuan.getText().toString());
                                    moving.putExtra("jumlah_orang", jumlah_peserta.getText().toString());
                                    moving.putExtra("tanggal_mulai", tanggal.getText().toString());
                                    moving.putExtra("durasi", durasi.getText().toString());
                                    moving.putExtra("jam_mulai", jam_mulai.getText().toString());
                                    moving.putExtra("jam_selesai", jam_selesai.getText().toString());
                                    moving.putExtra("status", "1");
                                    Log.e("DATABOOKING", "" + moving);
                                    startActivity(moving);
                                } else {
                                    Toast.makeText(FormBookingActivity.this, res.getString("message"), Toast.LENGTH_SHORT).show();

                                }
                            } catch (JSONException e) {
                                pd.dismiss();
                                e.printStackTrace();
                                Log.e("errorgan", e.getMessage());

                            }
                        }
                    },
                            new Response.ErrorListener() {
                                @Override
                                public void onErrorResponse(VolleyError error) {
                                    pd.dismiss();
                                    Log.e("errornyaa ", "" + error);
                                    Toast.makeText(FormBookingActivity.this, "Gagal booking ruangan", Toast.LENGTH_SHORT).show();
                                }

                            }) {
                        @Override
                        protected Map<String, String> getParams() throws AuthFailureError {
                            Map<String, String> params = new HashMap<>();
                            params.put("nik", exnik);
                            params.put("nama", nama.getText().toString());
                            params.put("nomor_telepon", telepon.getText().toString());
                            params.put("id_komunitas", exkomunitas);
                            params.put("id_ruangan", xid_ruangan);
                            params.put("jumlah_orang", jumlah_peserta.getText().toString());
                            params.put("deskripsi_kegiatan", deskripsi.getText().toString());
                            params.put("tujuan", tujuan.getText().toString());
                            params.put("tanggal_mulai", tanggal.getText().toString());
                            params.put("durasi", durasi.getText().toString());
                            params.put("jam_mulai", jam_mulai.getText().toString());
                            params.put("jam_selesai", jam_selesai.getText().toString());
                            params.put("status", "1");
                            Log.e("data: ", "" + params);
                            return params;
                        }
                    };
                    AppController.getInstance().addToRequestQueue(senddata);
                }
            }
        });
    }

    private void updateLabel() {
        String myFormat = "dd MMM yyyy"; //In which you need put here
        SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);
        tanggal.setText(sdf.format(myCalendar.getTime()));
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            finish();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
