<?php

require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran
{
    protected $pilihanProdi;
    protected $lokasiKampus;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biaya_pendaftaran_dasar,
        $jalur_pendaftaran,
        $pilihanProdi,
        $lokasiKampus
    ) {
        parent::__construct(
            $id_pendaftaran,
            $nama_calon,
            $asal_sekolah,
            $nilai_ujian,
            $biaya_pendaftaran_dasar,
            $jalur_pendaftaran
        );

        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    public static function getDaftarReguler($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran
                  WHERE jalur_pendaftaran = 'Reguler'";

        return mysqli_query($db, $query);
    }

    public function hitungTotalBiaya()
    {
        return $this->biaya_pendaftaran_dasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Reguler";
    }
}