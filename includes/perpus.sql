Admin Table

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(50) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

Anggota Table

CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(50) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

Buku Table

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(255) NOT NULL,
    tahun_terbit VARCHAR(4) NOT NULL
);

Transaksi Table

CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(50) NOT NULL,
    kode_buku INT NOT NULL,
    tanggal_pinjam DATETIME NOT NULL,
    tanggal_kembali DATETIME NULL,
    FOREIGN KEY (nim) REFERENCES anggota(nim),
    FOREIGN KEY (kode_buku) REFERENCES buku(id)
);

