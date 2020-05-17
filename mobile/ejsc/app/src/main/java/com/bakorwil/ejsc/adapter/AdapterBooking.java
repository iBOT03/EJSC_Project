package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.model.ModelEvent;

import java.util.ArrayList;
import java.util.List;

public class AdapterBooking extends RecyclerView.Adapter<AdapterBooking.HolderData> {
	private List<ModelEvent> mItems;
	private Context context;
	private ArrayList<ModelEvent> modelEvent;

	AdapterBooking(ArrayList<ModelEvent> arrayList) {
		this.modelEvent = arrayList;
	}

	public AdapterBooking(Context context, List<ModelEvent> mItems) {
		this.mItems = mItems;
		this.context = context;
	}
	@NonNull
	@Override
	public AdapterBooking.HolderData onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
		View layout = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.item_list_ruangan, viewGroup, false);
		AdapterBooking.HolderData holderData = new AdapterBooking.HolderData((layout));
		return holderData;
	}

	@Override
	public void onBindViewHolder(@NonNull HolderData holder, int position) {

	}

	@Override
	public int getItemCount() {
		return mItems.size();
	}

	public class HolderData extends RecyclerView.ViewHolder {
		ImageView foto;
		TextView ketruang, kapasitas, keterangan;
		Button booking;
		String url, id_event;

		public HolderData(@NonNull View itemView) {
			super(itemView);
			foto = itemView.findViewById(R.id.ivRuangan);
			ketruang = itemView.findViewById(R.id.ketRuangan);
			kapasitas = itemView.findViewById(R.id.kapasitas);
		}
	}
}
