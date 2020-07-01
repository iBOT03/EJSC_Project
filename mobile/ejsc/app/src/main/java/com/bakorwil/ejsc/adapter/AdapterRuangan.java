package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.botnav.booking.DetailRuanganActivity;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelRuangan;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

public class AdapterRuangan extends RecyclerView.Adapter<AdapterRuangan.HolderData> {
    private List<ModelRuangan> mItems;
    private Context context;
    private ArrayList<ModelRuangan> modelRuangan;

    AdapterRuangan(ArrayList<ModelRuangan> arrayList) {
        this.modelRuangan = arrayList;
    }

    public AdapterRuangan(Context context, List<ModelRuangan> mItems) {
        this.mItems = mItems;
        this.context = context;
    }

    public AdapterRuangan.HolderData onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View layout = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.item_list_ruangan, viewGroup, false);
        AdapterRuangan.HolderData holderData = new AdapterRuangan.HolderData((layout));
        return holderData;
    }

    public void onBindViewHolder(@NonNull final AdapterRuangan.HolderData holder, int position) {
        ModelRuangan modelRuangan = mItems.get(position);
        //klik untuk Intent dan parsing data ke detail ruangan
        holder.btn_detail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent detail = new Intent(holder.itemView.getContext(), DetailRuanganActivity.class);
                detail.putExtra("ID_RUANGAN", holder.id_ruangan);
                holder.itemView.getContext().startActivity(detail);
            }
        });

        try {
            holder.id_ruangan = modelRuangan.getId_ruangan();
            holder.nama_ruangan.setText(modelRuangan.getNama_ruangan());
            holder.kapasitas_ruangan.setText(modelRuangan.getKapasitas());
            Picasso.get()
                    .load(ServerApi.URL_GET_RUANGAN + "../../../" + "uploads/ruangan/" + modelRuangan.getFoto_ruangan())
                    .into(holder.foto_ruangan);
            holder.url = modelRuangan.getFoto_ruangan();
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    public int getItemCount() {
        return mItems.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        ImageView foto_ruangan;
        TextView nama_ruangan, kapasitas_ruangan;
        String url, id_ruangan;
        Button btn_detail;

        public HolderData(@NonNull View itemView) {
            super(itemView);
            foto_ruangan = itemView.findViewById(R.id.iv_foto_ruangan);
            nama_ruangan = itemView.findViewById(R.id.tv_nama_ruangan);
            kapasitas_ruangan = itemView.findViewById(R.id.tv_kapasitas_ruangan);
            btn_detail = itemView.findViewById(R.id.btn_detail_ruangan);
        }
    }
}
