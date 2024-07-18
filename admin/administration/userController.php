<?php
$conn = mysqli_connect('localhost', 'root', '', 'harita');

function addNewUser($data)
{
    global $conn;

    $name = htmlspecialchars($data['name']);
    $username = htmlspecialchars($data['username']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $role = $data['role'];
    $approveDownload = $data['approveDownload'];
    $status = 'A';

    $SQL = "	INSERT INTO t_user
                VALUES
                ('','$username', '$password', '$name', '$email', '$role', '$status', NOW(), '', '$approveDownload')
            ";

    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function editUser($data)
{
    global $conn;

    $idUser = $data['idUser'];
    $name = $data['name'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $role = $data['role'];
    $approveDownload = $data['approveDownload'];

    $SQL = "    UPDATE  t_user 
                SET     username = '$username',
                        password = '$password',
                        name = '$name',
                        email = '$email',
                        role = '$role',
                        approve_download = '$approveDownload'
                WHERE   id_user = '$idUser'
    ";

    mysqli_query($conn, $SQL);
    return mysqli_affected_rows($conn);
}

function deleteUser($idUser)
{
    global $conn;

    $SQL = "	DELETE FROM t_user
                WHERE id_user='$idUser'
            ";
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function approve($idUser)
{
    global $conn;

    $SQL = "	UPDATE  t_user
                SET approve_download = 2
                WHERE id_user='$idUser'
            ";
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}

function reject($idUser)
{
    global $conn;

    $SQL = "	UPDATE  t_user
                SET approve_download = 1
                WHERE id_user='$idUser'
            ";
    mysqli_query($conn, $SQL);

    return mysqli_affected_rows($conn);
}