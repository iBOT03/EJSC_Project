package com.bakorwil.ejsc.botnav.booking;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

import com.bakorwil.ejsc.R;

public class FormBooking extends AppCompatActivity {
	TextView a,b,c,d,e;
	Button btn;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.form_booking);

		a = findViewById(R.id.ruangLayout);
		b = findViewById(R.id.edt_tanggal);
		c = findViewById(R.id.edt_jamMulai);
		d = findViewById(R.id.edt_durasi);
	}
}
