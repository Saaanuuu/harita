<?php
$conn = mysqli_connect('localhost', 'root', '', 'harita');

function upload()
{

    $namaGambar = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $tmp = $_FILES['gambar']['tmp_name'];


    //cek if extention of file
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiUpload = explode('.', $namaGambar);
    $ekstensiUpload = strtolower(end($ekstensiUpload));

    if (!in_array($ekstensiUpload, $ekstensiValid)) {
        echo "<script>
                alert('The Extention must be jpg/jpeg/png ');
             </script>";
        return false;
    }

    //cek size of the size
    if ($size > 2097152) {
        echo "<script>
                alert('The Extention must be jpg/jpeg/png ');
             </script>";
        return false;
    }

    //if the validation is true next step save the file in folder
    $fileLocation = '../../assets/img/fileLocationTitik/';
    move_uploaded_file($tmp, $fileLocation . $namaGambar);

    return $namaGambar;
}

function addNewTitikPengamatan($data)
{
    global $conn;

    $namaTitik = htmlspecialchars($data['namaTitik']);
    $longitude = htmlspecialchars($data['longitude']);
    $latitude = htmlspecialchars($data['latitude']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $pic = htmlspecialchars($data['pic']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $status = 'A';
    $idUser = $data['idUser'];


    $SQL = "	INSERT INTO t_titik_pengamatan
                VALUES
                ('', '$namaTitik', '$longitude', '$latitude', '$lokasi', 
                '$pic', '$deskripsi', '$gambar', '$status', NOW(), $idUser, '', '')
            ";

    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function editTitikPengamatan($data)
{
    global $conn;

    $idUser = $data['idUser'];
    $titikPengamatanNo = $data['titikPengamatanNo'];

    $namaTitik = htmlspecialchars($data['namaTitik']);
    $longitude = htmlspecialchars($data['longitude']);
    $latitude = htmlspecialchars($data['latitude']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $pic = htmlspecialchars($data['pic']);
    $deskripsi = htmlspecialchars($data['deskripsi']);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $status = 'A';

    $SQL = "    UPDATE  t_titik_pengamatan 
                SET     nama_titik = '$namaTitik',
                        longitude = '$longitude',
                        latitude = '$latitude',
                        lokasi = '$lokasi',
                        pic = '$pic',
                        description = '$deskripsi',
                        status = '$status',
                        upd_dt = NOW(),
                        upd_user_no = $idUser
                WHERE   t_titik_pengamatan_no = '$titikPengamatanNo'
    ";

    mysqli_query($conn, $SQL);
    return mysqli_affected_rows($conn);
}

function deleteTitikPengamatan($titikPengamatanNo)
{
    global $conn;

    $SQL = "	DELETE FROM t_titik_pengamatan
                WHERE t_titik_pengamatan_no ='$titikPengamatanNo'
            ";
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}



//add detail titik
function addNewDetailTitikPengamatan($data)
{
    global $conn;

    $titikPengamatanNo = $data['titikPengamatanNo'];

    $tahun = htmlspecialchars($data['tahun']);
    $suhu = htmlspecialchars($data['suhu']);
    $ph = htmlspecialchars($data['ph']);
    $salinitas = htmlspecialchars($data['salinitas']);
    $tds = htmlspecialchars($data['tds']);
    $kecerahan = htmlspecialchars($data['kecerahan']);
    $do = htmlspecialchars($data['do']);
    $konduktivitas = htmlspecialchars($data['konduktivitas']);

    $Al_s = htmlspecialchars($data['Al_s']);
    $As_s = htmlspecialchars($data['As_s']);
    $Cd_s = htmlspecialchars($data['Cd_s']);
    $Co_s = htmlspecialchars($data['Co_s']);
    $Cr_s = htmlspecialchars($data['Cr_s']);
    $Fe_s = htmlspecialchars($data['Fe_s']);
    $Hg_s = htmlspecialchars($data['Hg_s']);
    $Ni_s = htmlspecialchars($data['Ni_s']);
    $Pb_s = htmlspecialchars($data['Pb_s']);
    $Se_s = htmlspecialchars($data['Se_s']);
    $Mn_s = htmlspecialchars($data['Mn_s']);

    $Al_oi = htmlspecialchars($data['Al_oi']);
    $As_oi = htmlspecialchars($data['As_oi']);
    $Cd_oi = htmlspecialchars($data['Cd_oi']);
    $Co_oi = htmlspecialchars($data['Co_oi']);
    $Cr_oi = htmlspecialchars($data['Cr_oi']);
    $Fe_oi = htmlspecialchars($data['Fe_oi']);
    $Hg_oi = htmlspecialchars($data['Hg_oi']);
    $Ni_oi = htmlspecialchars($data['Ni_oi']);
    $Pb_oi = htmlspecialchars($data['Pb_oi']);
    $Se_oi = htmlspecialchars($data['Se_oi']);
    $Mn_oi = htmlspecialchars($data['Mn_oi']);

    $Al_hi = htmlspecialchars($data['Al_hi']);
    $As_hi = htmlspecialchars($data['As_hi']);
    $Cd_hi = htmlspecialchars($data['Cd_hi']);
    $Co_hi = htmlspecialchars($data['Co_hi']);
    $Cr_hi = htmlspecialchars($data['Cr_hi']);
    $Fe_hi = htmlspecialchars($data['Fe_hi']);
    $Hg_hi = htmlspecialchars($data['Hg_hi']);
    $Ni_hi = htmlspecialchars($data['Ni_hi']);
    $Pb_hi = htmlspecialchars($data['Pb_hi']);
    $Se_hi = htmlspecialchars($data['Se_hi']);
    $Mn_hi = htmlspecialchars($data['Mn_hi']);

    $jumlah_taksa_bn = htmlspecialchars($data['jumlah_taksa_bn']);
    $kepadatan_bn = htmlspecialchars($data['kepadatan_bn']);
    $jumlah_taksa_fito = htmlspecialchars($data['jumlah_taksa_fito']);
    $kelimpahan_fito = htmlspecialchars($data['kelimpahan_fito']);
    $jumlah_taksa_zoo = htmlspecialchars($data['jumlah_taksa_zoo']);
    $kelimpahan_zoo = htmlspecialchars($data['kelimpahan_zoo']);
    $jumlah_spesies_ikan = htmlspecialchars($data['jumlah_spesies_ikan']);
    $kelimpahan_ikan = htmlspecialchars($data['kelimpahan_ikan']);
    $cover_karang = htmlspecialchars($data['cover_karang']);

    $status = 'A';
    $idUser = $data['idUser'];


    $SQL = "	INSERT INTO t_detail_titik_pengamatan
                VALUES
                ('', '$titikPengamatanNo', '$tahun', '$suhu', '$ph', '$salinitas', '$tds', '$kecerahan', '$do', '$konduktivitas',
                '$Al_s', '$As_s', '$Cd_s', '$Co_s', '$Cr_s', '$Fe_s', '$Hg_s', '$Ni_s', '$Pb_s', '$Se_s', '$Mn_s', 
                '$Al_oi', '$As_oi', '$Cd_oi', '$Co_oi', '$Cr_oi', '$Fe_oi', '$Hg_oi', '$Ni_oi', '$Pb_oi', '$Se_oi', '$Mn_oi',
                '$Al_hi', '$As_hi', '$Cd_hi', '$Co_hi', '$Cr_hi', '$Fe_hi', '$Hg_hi', '$Ni_hi', '$Pb_hi', '$Se_hi', '$Mn_hi',
                '$jumlah_taksa_bn', '$kepadatan_bn', '$jumlah_taksa_fito', '$kelimpahan_fito', '$jumlah_taksa_zoo', 
                '$kelimpahan_zoo', '$jumlah_spesies_ikan', '$kelimpahan_ikan', '$cover_karang', 
                '$status', NOW(), $idUser, '', '')
            ";

    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function editDetailTitikPengamatan($data)
{
    global $conn;

    $idUser = $data['idUser'];
    $detailTitikNo = $data['detailTitikNo'];

    $tahun = htmlspecialchars($data['tahun']);
    $suhu = htmlspecialchars($data['suhu']);
    $ph = htmlspecialchars($data['ph']);
    $salinitas = htmlspecialchars($data['salinitas']);
    $tds = htmlspecialchars($data['tds']);
    $kecerahan = htmlspecialchars($data['kecerahan']);
    $do = htmlspecialchars($data['do']);
    $konduktivitas = htmlspecialchars($data['konduktivitas']);

    $Al_s = htmlspecialchars($data['Al_s']);
    $As_s = htmlspecialchars($data['As_s']);
    $Cd_s = htmlspecialchars($data['Cd_s']);
    $Co_s = htmlspecialchars($data['Co_s']);
    $Cr_s = htmlspecialchars($data['Cr_s']);
    $Fe_s = htmlspecialchars($data['Fe_s']);
    $Hg_s = htmlspecialchars($data['Hg_s']);
    $Ni_s = htmlspecialchars($data['Ni_s']);
    $Pb_s = htmlspecialchars($data['Pb_s']);
    $Se_s = htmlspecialchars($data['Se_s']);
    $Mn_s = htmlspecialchars($data['Mn_s']);

    $Al_oi = htmlspecialchars($data['Al_oi']);
    $As_oi = htmlspecialchars($data['As_oi']);
    $Cd_oi = htmlspecialchars($data['Cd_oi']);
    $Co_oi = htmlspecialchars($data['Co_oi']);
    $Cr_oi = htmlspecialchars($data['Cr_oi']);
    $Fe_oi = htmlspecialchars($data['Fe_oi']);
    $Hg_oi = htmlspecialchars($data['Hg_oi']);
    $Ni_oi = htmlspecialchars($data['Ni_oi']);
    $Pb_oi = htmlspecialchars($data['Pb_oi']);
    $Se_oi = htmlspecialchars($data['Se_oi']);
    $Mn_oi = htmlspecialchars($data['Mn_oi']);

    $Al_hi = htmlspecialchars($data['Al_hi']);
    $As_hi = htmlspecialchars($data['As_hi']);
    $Cd_hi = htmlspecialchars($data['Cd_hi']);
    $Co_hi = htmlspecialchars($data['Co_hi']);
    $Cr_hi = htmlspecialchars($data['Cr_hi']);
    $Fe_hi = htmlspecialchars($data['Fe_hi']);
    $Hg_hi = htmlspecialchars($data['Hg_hi']);
    $Ni_hi = htmlspecialchars($data['Ni_hi']);
    $Pb_hi = htmlspecialchars($data['Pb_hi']);
    $Se_hi = htmlspecialchars($data['Se_hi']);
    $Mn_hi = htmlspecialchars($data['Mn_hi']);

    $jumlah_taksa_bn = htmlspecialchars($data['jumlah_taksa_bn']);
    $kepadatan_bn = htmlspecialchars($data['kepadatan_bn']);
    $jumlah_taksa_fito = htmlspecialchars($data['jumlah_taksa_fito']);
    $kelimpahan_fito = htmlspecialchars($data['kelimpahan_fito']);
    $jumlah_taksa_zoo = htmlspecialchars($data['jumlah_taksa_zoo']);
    $kelimpahan_zoo = htmlspecialchars($data['kelimpahan_zoo']);
    $jumlah_spesies_ikan = htmlspecialchars($data['jumlah_spesies_ikan']);
    $kelimpahan_ikan = htmlspecialchars($data['kelimpahan_ikan']);
    $cover_karang = htmlspecialchars($data['cover_karang']);

    $status = 'A';

    $SQL = "    UPDATE  t_detail_titik_pengamatan 
                SET     tahun = '$tahun',
                        suhu = '$suhu',
                        ph = '$ph',
                        salinitas = '$salinitas',
                        tds = '$tds',
                        kecerahan = '$kecerahan',
                        do = '$do',
                        konduktivitas = '$konduktivitas',

                        Al_s = '$Al_s',
                        As_s = '$As_s',
                        Cd_s = '$Cd_s',
                        Co_s = '$Co_s',
                        Cr_s = '$Cr_s',
                        Fe_s = '$Fe_s',
                        Hg_s = '$Hg_s',
                        Ni_s = '$Ni_s',
                        Pb_s = '$Pb_s',
                        Se_s = '$Se_s',
                        Mn_s = '$Mn_s',

                        Al_oi = '$Al_oi',
                        As_oi = '$As_oi',
                        Cd_oi = '$Cd_oi',
                        Co_oi = '$Co_oi',
                        Cr_oi = '$Cr_oi',
                        Fe_oi = '$Fe_oi',
                        Hg_oi = '$Hg_oi',
                        Ni_oi = '$Ni_oi',
                        Pb_oi = '$Pb_oi',
                        Se_oi = '$Se_oi',
                        Mn_oi = '$Mn_oi',

                        Al_hi = '$Al_hi',
                        As_hi = '$As_hi',
                        Cd_hi = '$Cd_hi',
                        Co_hi = '$Co_hi',
                        Cr_hi = '$Cr_hi',
                        Fe_hi = '$Fe_hi',
                        Hg_hi = '$Hg_hi',
                        Ni_hi = '$Ni_hi',
                        Pb_hi = '$Pb_hi',
                        Se_hi = '$Se_hi',
                        Mn_hi = '$Mn_hi',

                        jumlah_taksa_bn = '$jumlah_taksa_bn',
                        kepadatan_bn = '$kepadatan_bn',
                        jumlah_taksa_fito = '$jumlah_taksa_fito',
                        kelimpahan_fito = '$kelimpahan_fito',
                        jumlah_taksa_zoo = '$jumlah_taksa_zoo',
                        kelimpahan_zoo = '$kelimpahan_zoo',
                        jumlah_spesies_ikan = '$jumlah_spesies_ikan',
                        kelimpahan_ikan = '$kelimpahan_ikan',
                        cover_karang = '$cover_karang',

                        status = '$status',
                        cre_dt = '',
                        cre_user_no = '',
                        upd_dt = NOW(),
                        upd_user_no = $idUser
                WHERE   detail_titik_no = '$detailTitikNo'
                ";

    mysqli_query($conn, $SQL);
    return mysqli_affected_rows($conn);
}

function deleteDetailTitikPengamatan($detailTitikNo)
{
    global $conn;

    $SQL = "DELETE FROM t_detail_titik_pengamatan
            WHERE detail_titik_no ='$detailTitikNo'
            ";
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function approveDownload($idUser)
{
    global $conn;

    $SQL = "UPDATE t_user 
            SET approve_download = 3
            WHERE id_user = '$idUser'";
            
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}
