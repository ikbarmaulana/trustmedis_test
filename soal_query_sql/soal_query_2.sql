SELECT
	master_pasien.pasien_kota AS Kota,
	CONCAT( master_diagnosa.diagnosa_kode, " - ", master_diagnosa.diagnosa_name ) AS Diagnosa,
	COUNT( master_pasien.pasien_id ) AS jumlah 
FROM
	`kunjungan_pasien`
	JOIN master_pasien ON kunjungan_pasien.m_pasien_id = master_pasien.pasien_id
	JOIN diagnosa_pasien ON diagnosa_pasien.kunjungan_id = kunjungan_pasien.pendaftaran_id
	JOIN master_diagnosa ON diagnosa_pasien.m_diagnosa_id = master_diagnosa.diagnosa_id 
GROUP BY
	Kota,
	Diagnosa 
ORDER BY
	COUNT( master_pasien.pasien_id ) DESC 
	LIMIT 10