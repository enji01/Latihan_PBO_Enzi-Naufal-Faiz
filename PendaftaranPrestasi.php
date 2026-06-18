<?php

require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran
{
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biaya_pendaftaran_dasar,
        $jalur_pendaftaran,
        $jenisPrestasi,
        $tingkatPrestasi
    ) {
        parent::__construct(
            $id_pendaftaran,
            $nama_calon,
            $asal_sekolah,
            $nilai_ujian,
            $biaya_pendaftaran_dasar,
            $jalur_pendaftaran
        );

        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    public static function getDaftarPrestasi($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran
                  WHERE jalur_pendaftaran = 'Prestasi'";

        return mysqli_query($db, $query);
    }

    public function hitungBiayaPendaftaran()
    {
        return $this->biaya_pendaftaran_dasar - 50000;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Prestasi";
    }
}