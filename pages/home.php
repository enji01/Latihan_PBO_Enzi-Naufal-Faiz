<?php

require_once 'koneksi.php';

/*
|--------------------------------------------------------------------------
| TOTAL CAMABA
|--------------------------------------------------------------------------
*/

$queryTotal = mysqli_query(
    $db,
    "SELECT COUNT(*) AS total FROM tabel_pendaftaran"
);

$totalCamaba = mysqli_fetch_assoc($queryTotal)['total'];


/*
|--------------------------------------------------------------------------
| TOTAL REGULER
|--------------------------------------------------------------------------
*/

$queryReguler = mysqli_query(
    $db,
    "SELECT COUNT(*) AS total
     FROM tabel_pendaftaran
     WHERE jalur_pendaftaran='Reguler'"
);

$totalReguler = mysqli_fetch_assoc($queryReguler)['total'];


/*
|--------------------------------------------------------------------------
| TOTAL PRESTASI
|--------------------------------------------------------------------------
*/

$queryPrestasi = mysqli_query(
    $db,
    "SELECT COUNT(*) AS total
     FROM tabel_pendaftaran
     WHERE jalur_pendaftaran='Prestasi'"
);

$totalPrestasi = mysqli_fetch_assoc($queryPrestasi)['total'];


/*
|--------------------------------------------------------------------------
| TOTAL KEDINASAN
|--------------------------------------------------------------------------
*/

$queryKedinasan = mysqli_query(
    $db,
    "SELECT COUNT(*) AS total
     FROM tabel_pendaftaran
     WHERE jalur_pendaftaran='Kedinasan'"
);

$totalKedinasan = mysqli_fetch_assoc($queryKedinasan)['total'];


/*
|--------------------------------------------------------------------------
| STATISTIK NILAI
|--------------------------------------------------------------------------
*/

$queryNilai = mysqli_query(
    $db,
    "SELECT
        AVG(nilai_ujian) AS rata_rata,
        MAX(nilai_ujian) AS tertinggi,
        MIN(nilai_ujian) AS terendah
     FROM tabel_pendaftaran"
);

$dataNilai = mysqli_fetch_assoc($queryNilai);

$rataRata = round($dataNilai['rata_rata'], 2);
$nilaiTertinggi = $dataNilai['tertinggi'];
$nilaiTerendah = $dataNilai['terendah'];

?>

<h2 class="page-title mb-4">
    Dashboard Pendaftaran Mahasiswa Baru
</h2>

<!-- ===================== -->
<!-- KARTU STATISTIK -->
<!-- ===================== -->

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Total Camaba</h6>
                <h2><?php echo $totalCamaba; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Jalur Reguler</h6>
                <h2><?php echo $totalReguler; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Jalur Prestasi</h6>
                <h2><?php echo $totalPrestasi; ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Jalur Kedinasan</h6>
                <h2><?php echo $totalKedinasan; ?></h2>
            </div>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- NILAI UJIAN -->
<!-- ===================== -->

<div class="row mt-2">

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Rata-rata Nilai Ujian</h6>
                <h3><?php echo $rataRata; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Nilai Tertinggi</h6>
                <h3><?php echo $nilaiTertinggi; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Nilai Terendah</h6>
                <h3><?php echo $nilaiTerendah; ?></h3>
            </div>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- CHART -->
<!-- ===================== -->

<div class="row mt-3">

    <div class="col-md-6">

        <div class="card shadow-sm border-0">

            <div class="card-header">
                Distribusi Jalur Pendaftaran
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-center">
    <div style="width: 350px;">
        <canvas id="jalurChart"></canvas>
    </div>
</div>

            </div>

        </div>

    </div>

</div>

<!-- Chart.js -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('jalurChart');

new Chart(ctx, {

    type: 'pie',

    data: {

        labels: [
            'Reguler',
            'Prestasi',
            'Kedinasan'
        ],

        datasets: [{
            data: [
                <?php echo $totalReguler; ?>,
                <?php echo $totalPrestasi; ?>,
                <?php echo $totalKedinasan; ?>
            ]
        }]
    }

});

</script>