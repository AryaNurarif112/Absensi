<?php

class report extends CI_Model
{

    public $db_tabel = 'absen';

    public function report()
    {
        $sql = "SELECT karyawan.id_karyawan, karyawan.nama,

				/* ----------- jumlah sakit ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'S'
				AND absen.nis = siswa.nis
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS sakit,

				/* ----------- jumlah ijin ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'I'
				AND absen.nis = siswa.nis
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS ijin,

				/* ----------- jumlah alpa ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'A'
				AND absen.nis = siswa.nis
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS alpha,

				/* ----------- jumlah Hadir ------------*/
				IFNULL((SELECT COUNT(absen.absen)
				FROM absen
				WHERE absen.absen = 'H'
				AND absen.nis = siswa.nis
				GROUP BY absen.nis
				ORDER BY absen.nis ASC), 0) AS hadir

			FROM siswa
			GROUP BY siswa.nis
			ORDER BY siswa.nis ASC;";

        return $this->db->query($sql);
    }
}
