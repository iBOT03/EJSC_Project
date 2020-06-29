package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.botnav.booking.DetailRiwayatBooking;
import com.bakorwil.ejsc.model.ModelBooking;

import java.util.ArrayList;
import java.util.List;

public class AdapterBooking extends RecyclerView.Adapter<AdapterBooking.HolderData> {
    private List<ModelBooking> mItems;
    private Context context;
    private ArrayList<ModelBooking> modelBooking;

    AdapterBooking(ArrayList<ModelBooking> arrayList) {
        this.modelBooking = arrayList;
    }

    public AdapterBooking(Context context, List<ModelBooking> mItems) {
        this.mItems = mItems;
        this.context = context;
    }

    @NonNull
    @Override
    public HolderData onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View layout = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.item_list_riwayat_booking, viewGroup, false);
        AdapterBooking.HolderData holderData = new AdapterBooking.HolderData((layout));
        return holderData;
    }

    @Override
    public void onBindViewHolder(@NonNull final HolderData holder, int position) {
        ModelBooking modelBooking = mItems.get(position);
        //klik untuk Intent dan parsing data ke detail event
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent detail = new Intent(holder.itemView.getContext(), DetailRiwayatBooking.class);
                detail.putExtra("ID_BOOKING", holder.id_booking);
                holder.itemView.getContext().startActivity(detail);
            }
        });

        try {
            holder.id_booking = modelBooking.getId_booking();
            holder.id_ruangan = modelBooking.getId_booking();
            holder.id_komunitas = modelBooking.getId_booking();
            holder.tanggal_mulai.setText(modelBooking.getTanggal_mulai());
            holder.jam_mulai.setText(modelBooking.getJam_mulai());
            holder.jam_selesai.setText(modelBooking.getJam_selesai());
            holder.status.setText(modelBooking.getStatus());
            holder.nama.setText(modelBooking.getNama());
            holder.jumlah_orang.setText(modelBooking.getJumlah_orang());
            holder.tujuan.setText(modelBooking.getTujuan());
            holder.deskripsi.setText(modelBooking.getDeskripsi_kegiatan());
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    @Override
    public int getItemCount() {
        return mItems.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        TextView tanggal_mulai, jam_mulai, jam_selesai, status, nama, jumlah_orang, tujuan, deskripsi;
        String id_booking, id_ruangan, id_komunitas;

        public HolderData(@NonNull View itemView) {
            super(itemView);
            tanggal_mulai = itemView.findViewById(R.id.tv_riwayat_tanggal);
            jam_mulai = itemView.findViewById(R.id.tv_riwayat_jam_mulai);
            jam_selesai = itemView.findViewById(R.id.tvJudulEvent);
            status = itemView.findViewById(R.id.tv_status);
//            nama = itemView.findViewById(R.id.tvKeteranganEvent);
//            jumlah_orang = itemView.findViewById(R.id.tvKeteranganEvent);
//            tujuan = itemView.findViewById(R.id.tvKeteranganEvent);
//            deskripsi = itemView.findViewById(R.id.tvKeteranganEvent);
        }
    }
}
