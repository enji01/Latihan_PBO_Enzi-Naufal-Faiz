<?php

require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'semua';

?>

<h2 class="page-title mb-4">
    Data Calon Mahasiswa Baru
</h2>

<!-- NAVBAR FILTER -->

<ul class="nav nav-tabs mb-4">

    <li class="nav-item">
        <a class="nav-link <?php echo ($filter == 'semua') ? 'active' : ''; ?>"
           href="index.php?page=camaba&filter=semua">
            Semua
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo ($filter == 'reguler') ? 'active' : ''; ?>"
           href="index.php?page=camaba&filter=reguler">
            Reguler
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo ($filter == 'prestasi') ? 'active' : ''; ?>"
           href="index.php?page=camaba&filter=prestasi">
            Prestasi
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php echo ($filter == 'kedinasan') ? 'active' : ''; ?>"
           href="index.php?page=camaba&filter=kedinasan">
            Kedinasan
        </a>
    </li>

</ul>

<?php

/*
|--------------------------------------------------------------------------
| SEMUA DATA
|--------------------------------------------------------------------------
*/

if($filter == 'semua')
{

    $query = mysqli_query(
        $db,
        "SELECT * FROM tabel_pendaftaran"
    );

?>

<div class="card shadow-sm">

    <div class="card-header">
        Semua Data Pendaftar
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai</th>
                        <th>Jalur</th>
                        <th>Total Biaya</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                while($row = mysqli_fetch_assoc($query))
                {

                    switch($row['jalur_pendaftaran'])
                    {

                        case 'Reguler':

                            $obj = new PendaftaranReguler(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['jalur_pendaftaran'],
                                $row['pilihan_prodi'],
                                $row['lokasi_kampus']
                            );

                        break;

                        case 'Prestasi':

                            $obj = new PendaftaranPrestasi(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['jalur_pendaftaran'],
                                $row['jenis_prestasi'],
                                $row['tingkat_prestasi']
                            );

                        break;

                        case 'Kedinasan':

                            $obj = new PendaftaranKedinasan(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['jalur_pendaftaran'],
                                $row['sk_ikatan_dinas'],
                                $row['instansi_sponsor']
                            );

                        break;
                    }

                    echo "<tr>";
                    echo "<td>{$row['id_pendaftaran']}</td>";
                    echo "<td>{$row['nama_calon']}</td>";
                    echo "<td>{$row['asal_sekolah']}</td>";
                    echo "<td>{$row['nilai_ujian']}</td>";
                    echo "<td>".$obj->tampilkanInfoJalur()."</td>";
                    echo "<td>Rp ".number_format($obj->hitungTotalBiaya(),0,",",".")."</td>";
                    echo "</tr>";
                }

                ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
}
?>

<?php

/*
|--------------------------------------------------------------------------
| REGULER
|--------------------------------------------------------------------------
*/

if($filter == 'reguler')
{

$data = PendaftaranReguler::getDaftarReguler($db);

?>

<div class="card shadow-sm">

<div class="card-header">
    Jalur Reguler
</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Asal Sekolah</th>
    <th>Nilai</th>
    <th>Prodi</th>
    <th>Kampus</th>
    <th>Biaya</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($data))
{

$obj = new PendaftaranReguler(
    $row['id_pendaftaran'],
    $row['nama_calon'],
    $row['asal_sekolah'],
    $row['nilai_ujian'],
    $row['biaya_pendaftaran_dasar'],
    $row['jalur_pendaftaran'],
    $row['pilihan_prodi'],
    $row['lokasi_kampus']
);

?>

<tr>

<td><?= $row['id_pendaftaran']; ?></td>
<td><?= $row['nama_calon']; ?></td>
<td><?= $row['asal_sekolah']; ?></td>
<td><?= $row['nilai_ujian']; ?></td>
<td><?= $row['pilihan_prodi']; ?></td>
<td><?= $row['lokasi_kampus']; ?></td>
<td>Rp <?= number_format($obj->hitungTotalBiaya(),0,",","."); ?></td>

</tr>

<?php
}
?>

</table>

</div>
</div>

<?php
}
?>

<?php

/*
|--------------------------------------------------------------------------
| PRESTASI
|--------------------------------------------------------------------------
*/

if($filter == 'prestasi')
{

$data = PendaftaranPrestasi::getDaftarPrestasi($db);

?>

<div class="card shadow-sm">

<div class="card-header">
    Jalur Prestasi
</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Asal Sekolah</th>
    <th>Nilai</th>
    <th>Jenis Prestasi</th>
    <th>Tingkat Prestasi</th>
    <th>Biaya</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($data))
{

$obj = new PendaftaranPrestasi(
    $row['id_pendaftaran'],
    $row['nama_calon'],
    $row['asal_sekolah'],
    $row['nilai_ujian'],
    $row['biaya_pendaftaran_dasar'],
    $row['jalur_pendaftaran'],
    $row['jenis_prestasi'],
    $row['tingkat_prestasi']
);

?>

<tr>

<td><?= $row['id_pendaftaran']; ?></td>
<td><?= $row['nama_calon']; ?></td>
<td><?= $row['asal_sekolah']; ?></td>
<td><?= $row['nilai_ujian']; ?></td>
<td><?= $row['jenis_prestasi']; ?></td>
<td><?= $row['tingkat_prestasi']; ?></td>
<td>Rp <?= number_format($obj->hitungTotalBiaya(),0,",","."); ?></td>

</tr>

<?php
}
?>

</table>

</div>
</div>

<?php
}
?>

<?php

/*
|--------------------------------------------------------------------------
| KEDINASAN
|--------------------------------------------------------------------------
*/

if($filter == 'kedinasan')
{

$data = PendaftaranKedinasan::getDaftarKedinasan($db);

?>

<div class="card shadow-sm">

<div class="card-header">
    Jalur Kedinasan
</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Asal Sekolah</th>
    <th>Nilai</th>
    <th>SK Ikatan Dinas</th>
    <th>Instansi Sponsor</th>
    <th>Biaya</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($data))
{

$obj = new PendaftaranKedinasan(
    $row['id_pendaftaran'],
    $row['nama_calon'],
    $row['asal_sekolah'],
    $row['nilai_ujian'],
    $row['biaya_pendaftaran_dasar'],
    $row['jalur_pendaftaran'],
    $row['sk_ikatan_dinas'],
    $row['instansi_sponsor']
);

?>

<tr>

<td><?= $row['id_pendaftaran']; ?></td>
<td><?= $row['nama_calon']; ?></td>
<td><?= $row['asal_sekolah']; ?></td>
<td><?= $row['nilai_ujian']; ?></td>
<td><?= $row['sk_ikatan_dinas']; ?></td>
<td><?= $row['instansi_sponsor']; ?></td>
<td>Rp <?= number_format($obj->hitungTotalBiaya(),0,",","."); ?></td>

</tr>

<?php
}
?>

</table>

</div>
</div>

<?php
}
?>