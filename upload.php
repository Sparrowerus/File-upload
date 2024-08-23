<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileNameDivide = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameDivide));

        $allowedExtensions = ['txt'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = './files/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $dest_path = $uploadDir . $fileName;

            session_start();
            $_SESSION['delimiter'] = $_POST['delimiter'];

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                header('Location: index.php?status=success');
            } else {
                header('Location: index.php?status=error');
            }
        } else {
            header('Location: index.php?status=invalid_type');
        }
    } else {
        header('Location: index.php?status=error');
    }
}
