<?php

// Koneksi Ke Database
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

// Ambil Data Dari Ajax
$msg = mysqli_real_escape_string($conn, $_POST["text"]);

// Cek User Message To Database msg_usr
$cek_data = "SELECT back_msg FROM chatbot WHERE msg_usr LIKE '%$msg%'";
$query =  mysqli_query($conn, $cek_data) or die("Error Cek User Message");

// Cek Jika Ada Baris Yang Di Temukan
if( mysqli_num_rows($query) > 0 ) {
  $data_msg = mysqli_fetch_assoc($query);
  $back_msg = $data_msg['back_msg'];
  echo $back_msg;
} else {
  echo "Maaf Bot Tidak Mengerti Pesan Ini '$msg'";
}