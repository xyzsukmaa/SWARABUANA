CREATE DATABASE swarabuana;
USE swarabuana;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100), email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('user','admin') DEFAULT 'user',
  stok_siraman INT DEFAULT 0,
  detik_aktif INT DEFAULT 0
);
CREATE TABLE plants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_lokal VARCHAR(100), nama_ilmiah VARCHAR(150),
  deskripsi TEXT, status_konservasi VARCHAR(50),
  foto VARCHAR(255), daerah VARCHAR(100)
);
CREATE TABLE articles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(200), isi TEXT, gambar VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE deforestation_stats (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tahun INT, luas_hutan_ha BIGINT,
  kehilangan_ha BIGINT, karbon_ton BIGINT
);
CREATE TABLE trees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT, progress INT DEFAULT 0,
  status ENUM('growing','ditukar') DEFAULT 'growing',
  lokasi_tanam VARCHAR(150), foto_bukti VARCHAR(255)
);
CREATE TABLE article_reads (
  user_id INT, article_id INT,
  PRIMARY KEY (user_id, article_id)
);
CREATE TABLE donations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NULL, nama VARCHAR(100), nominal INT,
  tipe ENUM('instant_plant','open'),
  status ENUM('pending','lunas') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);