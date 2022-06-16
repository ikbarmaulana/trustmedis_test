SELECT
	master_unit.unit_nama AS Poli,
	CONCAT( master_diagnosa.diagnosa_kode, " - ", master_diagnosa.diagnosa_name ) AS Diagnosa,
	COUNT( master_unit.unit_id ) AS jumlah 
FROM
	`kunjungan_pasien`
	JOIN master_unit ON kunjungan_pasien.m_unit_id = master_unit.unit_id
	JOIN diagnosa_pasien ON diagnosa_pasien.kunjungan_id = kunjungan_pasien.pendaftaran_id
	JOIN master_diagnosa ON diagnosa_pasien.m_diagnosa_id = master_diagnosa.diagnosa_id 
GROUP BY
	Poli,
	Diagnosa 
ORDER BY
	COUNT( master_unit.unit_id ) DESC 
	LIMIT 10