
<div align="center">
<h1>Sistem Informasi Pembayaran SPP Sekolah</h1> 



![image](https://github.com/user-attachments/assets/4ab05c50-19f5-4057-beca-34f008291701)


<br><br>

<strong>Irmayanti</strong><br>
<strong>D0222018</strong><br>
<strong>Framework Web Based</strong><br>
<strong>2025</strong>

</div>








##
 Role dan Fitur-fiturnya

### 1. Bendahara
**Fitur:**
- **Login**  
  Bendahara masuk ke sistem menggunakan akun khusus.
- **Catat pembayaran**  
  Mencatat pembayaran SPP dari siswa, baik secara langsung maupun lewat konfirmasi.
- **Atur tarif & denda**  
  Mengatur besarnya biaya SPP dan denda jika terlambat membayar.
- **Lihat laporan**  
  Melihat dan mencetak laporan keuangan yang berisi data pembayaran dari siswa.

### 2. Orang Tua
**Fitur:**
- **Login**  
  Orang tua masuk ke sistem menggunakan akun mereka.
- **Lihat tagihan**  
  Melihat tagihan SPP anak mereka yang masih aktif.
- **Konfirmasi pembayaran**  
  Mengunggah bukti atau mengonfirmasi bahwa pembayaran sudah dilakukan.

### 3. Kepala Sekolah
**Fitur:**
- **Login**  
  Kepala sekolah masuk ke sistem untuk memantau data.
- **Lihat laporan**  
  Melihat ringkasan laporan keuangan dari semua pembayaran.
- **Setujui tarif & denda**  
  Menyetujui perubahan tarif SPP atau denda yang diajukan oleh bendahara.

---

## Struktur Database

### Tabel `Users` (untuk Bendahara, Orang Tua, Kepala Sekolah)
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| Id_user | INT (PK) | ID unik untuk setiap pengguna |
| Nama | VARCHAR(255) | Nama lengkap pengguna |
| Username | VARCHAR(100) | Username untuk login |
| Paswword | VARCHAR(255) | Password terenkripsi |
| Role | ENUM('bendahara', 'orang_tua', 'kepala_sekolah') | Role pengguna |
| Created_at | TIMESTAMP | Waktu saat akun dibuat |
| Update_at | TIMESTAMP | Waktu saat akun terakhir diperbarui |

### Tabel `Pembayaran`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| Id_pembayaran | INT (PK) | ID unik untuk setiap pembayaran |
| Id_user | INT (FK) | ID orang tua (relasi ke tabel Users) |
| Jumlah_bayar | DECIMAL(10,2) | Jumlah uang yang dibayarkan |
| Tanggal_bayar | TIMESTAMP | Tanggal pembayaran |
| Status | ENUM('lunas', 'belum_lunas') | Status pembayaran |
| Created_at | TIMESTAMP | Waktu pembayaran dicatat |
| Updated_at | TIMESTAMP | Waktu pembaruan data pembayaran |

### Tabel `Tagihan`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| Id_Tagihan | INT (PK) | ID unik untuk setiap pembayaran |
| Id_user | INT (FK) | ID orang tua (relasi ke tabel Users) |
| Jumlah_tagihan | DECIMAL(10,2) | Jumlah tagihan yang harus dibayar |
| Bulan | VARCHAR(20) | Bulan untuk tagihan (misal: Januari) |
| Tahun | INT | Tahun untuk tagihan |
| Status | ENUM('belum_bayar', 'sudah_bayar') | Status tagihan |
| Created_at | TIMESTAMP | Waktu tagihan dicatat |
| Updated_at | TIMESTAMP | Waktu pembaruan data tagihan |

### Tabel `Tarif_denda`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| Id_tarif_denda | INT (PK) | ID unik untuk setiap tarif & denda |
| Tarif | DECIMAL(10,2) | Jumlah tarif SPP yang ditetapkan |
| Denda | DECIMAL(10,2) | Jumlah denda yang berlaku |
| Tahun_ajaran | VARCHAR(20) | Tahun ajaran (misal: 2025/2026) |
| Status | ENUM('aktif', 'non_aktif') | Status tarif dan denda |
| Created_at | TIMESTAMP | Waktu tarif dan denda dicatat |
| Updated_at | TIMESTAMP | Waktu pembaruan tarif dan denda |

### Tabel `Laporan`
| Nama Field | Tipe Data | Keterangan |
|------------|-----------|------------|
| Id_laporan | INT (PK) | ID unik untuk setiap laporan |
| Id_user | INT (FK) | ID bendahara atau kepala sekolah (relasi ke tabel Users) |
| Jenis_Laporan | ENUM('pembayaran', 'tagihan') | Jenis laporan |
| Deskripsi | TEXT | Deskripsi laporan |
| Tanggal | TIMESTAMP | Tanggal laporan dibuat |
| Created_at | TIMESTAMP | Waktu laporan dicatat |
| Updated_at | TIMESTAMP | Waktu laporan diperbarui |

---

## Relasi Antar Tabel

- **Users**
  - One-to-many ke `Pembayaran`
  - One-to-many ke `Tagihan`
  - One-to-many ke `Laporan`

- **Pembayaran**
  - Many-to-one ke `Users`

- **Tagihan**
  - Many-to-one ke `Users`

- **Laporan**
  - Many-to-one ke `Users`

---
