package com.bakorwil.ejsc.adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bakorwil.ejsc.R;
import com.bakorwil.ejsc.botnav.event.DetailEventActivity;
import com.bakorwil.ejsc.configfile.ServerApi;
import com.bakorwil.ejsc.model.ModelEvent;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

public class AdapterEvent extends RecyclerView.Adapter<AdapterEvent.HolderData> {
    private List<ModelEvent> mItems;
    private Context context;
    private ArrayList<ModelEvent> modelEvent;

    AdapterEvent(ArrayList<ModelEvent> arrayList) {
        this.modelEvent = arrayList;
    }

    public AdapterEvent(Context context, List<ModelEvent> mItems) {
        this.mItems = mItems;
        this.context = context;
    }

    @NonNull
    @Override
    public HolderData onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View layout = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.item_list_event, viewGroup, false);
        AdapterEvent.HolderData holderData = new AdapterEvent.HolderData((layout));
        return holderData;
    }

    @Override
    public void onBindViewHolder(@NonNull final HolderData holder, int position) {
        ModelEvent modelEvent = mItems.get(position);
        //klik untuk Intent dan parsing data ke detail event
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent detail = new Intent(holder.itemView.getContext(), DetailEventActivity.class);
                detail.putExtra("ID_EVENT", holder.id_event);
                holder.itemView.getContext().startActivity(detail);
            }
        });

        try {
            holder.id_event = modelEvent.getId_event();
            holder.tanggal.setText(modelEvent.getTgl_mulai());
            holder.judul.setText(modelEvent.getJudul());
            holder.keterangan.setText(modelEvent.getKeterangan());
            Picasso.get()
                    .load(ServerApi.URL_GET_EVENT + "../../../" + "uploads/event/" + modelEvent.getFoto())
                    .into(holder.foto);
            holder.url = modelEvent.getFoto();
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }

    @Override
    public int getItemCount() {
        return mItems.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        ImageView foto;
        TextView tanggal, judul, keterangan;
        String url, id_event;

        public HolderData(@NonNull View itemView) {
            super(itemView);
            foto = itemView.findViewById(R.id.ivPoster);
            tanggal = itemView.findViewById(R.id.tvTglEvent);
            judul = itemView.findViewById(R.id.tvJudulEvent);
            keterangan = itemView.findViewById(R.id.tvKeteranganEvent);
        }
    }
}
