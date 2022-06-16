SELECT
	master_unit.unit_nama AS Poli,
	master_pasien.pasien_nama AS Nama_Pasien,
	master_pasien.pasien_kota AS Alamat,
	master_pembayaran.bayar_nama AS Cara_Bayar,
	CONCAT( diagnosa_pasien.diagnosapasien_jenis, " | ", master_diagnosa.diagnosa_kode, " - ", master_diagnosa.diagnosa_name ) AS Diagnosa,
	master_dokter.pegawai_nama AS Dokter,
	daftar_tanggal,
	pulang_tanggal 
FROM
	kunjungan_pasien
	JOIN master_unit ON kunjungan_pasien.m_unit_id = master_unit.unit_id
	JOIN master_pasien ON kunjungan_pasien.m_pasien_id = master_pasien.pasien_id
	JOIN master_pembayaran ON kunjungan_pasien.m_bayar_id = master_pembayaran.bayar_id
	JOIN diagnosa_pasien ON diagnosa_pasien.kunjungan_id = kunjungan_pasien.pendaftaran_id
	JOIN master_diagnosa ON diagnosa_pasien.m_diagnosa_id = master_diagnosa.diagnosa_id
	JOIN master_dokter ON kunjungan_pasien.m_dokter_id = master_dokter.pegawai_id