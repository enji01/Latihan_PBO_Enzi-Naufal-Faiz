<?php

require_once 'koneksi.php';

/*
|--------------------------------------------------------------------------
| TOTAL PENDAFTAR
|--------------------------------------------------------------------------
*/

$totalPendaftar = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT COUNT(*) AS total FROM tabel_pendaftaran"
    )
)['total'];


/*
|--------------------------------------------------------------------------
| TOTAL PER JALUR
|--------------------------------------------------------------------------
*/

$totalReguler = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT COUNT(*) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Reguler'"
    )
)['total'];

$totalPrestasi = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT COUNT(*) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Prestasi'"
    )
)['total'];

$totalKedinasan = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT COUNT(*) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Kedinasan'"
    )
)['total'];


/*
|--------------------------------------------------------------------------
| STATISTIK NILAI
|--------------------------------------------------------------------------
*/

$nilai = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT
            AVG(nilai_ujian) AS rata_rata,
            MAX(nilai_ujian) AS tertinggi,
            MIN(nilai_ujian) AS terendah
         FROM tabel_pendaftaran"
    )
);


/*
|--------------------------------------------------------------------------
| REKAP BIAYA
|--------------------------------------------------------------------------
*/

$totalBiayaReguler = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT
            SUM(biaya_pendaftaran_dasar) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Reguler'"
    )
)['total'];

$totalBiayaPrestasi = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT
            SUM(biaya_pendaftaran_dasar - 50000) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Prestasi'"
    )
)['total'];

$totalBiayaKedinasan = mysqli_fetch_assoc(
    mysqli_query(
        $db,
        "SELECT
            SUM(biaya_pendaftaran_dasar * 1.25) AS total
         FROM tabel_pendaftaran
         WHERE jalur_pendaftaran='Kedinasan'"
    )
)['total'];

?>

<h2 class="page-title mb-4">
    Laporan Pendaftaran Mahasiswa Baru
</h2>

<!-- ===================== -->
<!-- RINGKASAN PENDAFTAR -->
<!-- ===================== -->

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Pendaftar</h6>
                <h2><?= $totalPendaftar; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Reguler</h6>
                <h2><?= $totalReguler; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Prestasi</h6>
                <h2><?= $totalPrestasi; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Kedinasan</h6>
                <h2><?= $totalKedinasan; ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- NILAI UJIAN -->
<!-- ===================== -->

<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Rata-rata Nilai</h6>
                <h3><?= round($nilai['rata_rata'], 2); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Nilai Tertinggi</h6>
                <h3><?= $nilai['tertinggi']; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Nilai Terendah</h6>
                <h3><?= $nilai['terendah']; ?></h3>
            </div>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- REKAP BIAYA -->
<!-- ===================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header">
        Rekap Total Biaya Pendaftaran
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th>Jalur</th>
                <th>Total Biaya</th>
            </tr>

            <tr>
                <td>Reguler</td>
                <td>
                    Rp <?= number_format($totalBiayaReguler,0,",","."); ?>
                </td>
            </tr>

            <tr>
                <td>Prestasi</td>
                <td>
                    Rp <?= number_format($totalBiayaPrestasi,0,",","."); ?>
                </td>
            </tr>

            <tr>
                <td>Kedinasan</td>
                <td>
                    Rp <?= number_format($totalBiayaKedinasan,0,",","."); ?>
                </td>
            </tr>

        </table>

    </div>

</div>

<!-- ===================== -->
<!-- CHART -->
<!-- ===================== -->

<div class="card shadow-sm">

    <div class="card-header">
        Distribusi Jalur Pendaftaran
    </div>

    <div class="card-body text-center">

        <div style="width: 300px; margin: auto;">
            <canvas id="laporanChart"></canvas>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const laporanChart =
document.getElementById('laporanChart');

new Chart(laporanChart, {

    type: 'doughnut',

    data: {

        labels: [
            'Reguler',
            'Prestasi',
            'Kedinasan'
        ],

        datasets: [{

            data: [
                <?= $totalReguler ?>,
                <?= $totalPrestasi ?>,
                <?= $totalKedinasan ?>
            ]

        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: true
    }

});

</script>