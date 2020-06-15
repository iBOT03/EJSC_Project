package com.bakorwil.ejsc.adapter;

public class SliderItem {
    //Disini bisa menggunakan variabel string dari url
    //jika ingin mengambil gambar melalui internet
    private int image;

    public SliderItem(int image){
        this.image = image;
    }
    public int getImage(){
        return image;
    }
}
