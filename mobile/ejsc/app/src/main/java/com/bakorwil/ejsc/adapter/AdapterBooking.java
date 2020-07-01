package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.akun.DaftarActivity;
import com.bakorwil.ejsc.akun.UploadFotoKtpActivity;
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
        final ModelBooking modelBooking = mItems.get(position);
        //klik untuk Intent dan parsing data ke detail event
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent detail = new Intent(holder.itemView.getContext(), DetailRiwayatBooking.class);
                detail.putExtra("ID_BOOKING", holder.id_booking);

                detail.putExtra("nama_ruangan", holder.nama_ruangan.getText().toString());
                detail.putExtra("tanggal_mulai", holder.tanggal_mulai.getText().toString());
                detail.putExtra("jam_mulai", holder.tanggal_mulai.getText().toString());
                detail.putExtra("status", holder.status.getText().toString());
                detail.putExtra("nama", holder.nama);
                detail.putExtra("nama_komunitas", holder.nama_komunitas);
                detail.putExtra("nama_ruangan", holder.nama_ruangan.getText().toString());
                detail.putExtra("jumlah_orang", holder.jumlah_orang);
                detail.putExtra("tujuan", holder.tujuan);
                detail.putExtra("deskripsi", holder.deskripsi);

                holder.itemView.getContext().startActivity(detail);

                Log.e("move data: ", "" + detail);
            }
        });

        try {
            holder.id_booking = modelBooking.getId_booking();
            holder.id_ruangan = modelBooking.getId_ruangan();
            holder.id_komunitas = modelBooking.getId_booking();
            holder.nama_komunitas = modelBooking.getNama_komunitas();
            holder.nama = modelBooking.getNama();
            holder.id_status = modelBooking.getStatus();
            holder.jumlah_orang = modelBooking.getJumlah_orang();
            holder.tujuan = modelBooking.getTujuan();
            holder.deskripsi = modelBooking.getDeskripsi_kegiatan();

            holder.nama_ruangan.setText(modelBooking.getNama_ruangan());
            holder.tanggal_mulai.setText(modelBooking.getTanggal_mulai());
            holder.jam_mulai.setText(modelBooking.getJam_mulai());
            holder.jam_selesai.setText(modelBooking.getJam_selesai());
            holder.status.setText(modelBooking.getStatus());
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    @Override
    public int getItemCount() {
        return mItems.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        TextView tanggal_mulai, jam_mulai, jam_selesai, status, nama_ruangan;
        String id_booking, id_ruangan, id_komunitas, id_status, deskripsi, tujuan, nama, nama_komunitas, jumlah_orang;

        public HolderData(@NonNull View itemView) {
            super(itemView);
            tanggal_mulai = itemView.findViewById(R.id.tv_riwayat_tanggal);
            jam_mulai = itemView.findViewById(R.id.tv_riwayat_jam_mulai);
            jam_selesai = itemView.findViewById(R.id.tvJudulEvent);
            status = itemView.findViewById(R.id.tv_status_booking);
            nama_ruangan = itemView.findViewById(R.id.tv_riwayat_ruangan);
//            jumlah_orang = itemView.findViewById(R.id.tvKeteranganEvent);
//            tujuan = itemView.findViewById(R.id.tvKeteranganEvent);
//            deskripsi = itemView.findViewById(R.id.tvKeteranganEvent);
        }
    }
}
