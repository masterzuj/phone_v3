<?php session_start(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = __DIR__ . '/img/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileTmp = $_FILES['image']['tmp_name'];
    $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $fileName = uniqid('img_', true) . '.' . $fileExt;
    $targetFile = $uploadDir . $fileName;

    // Optional: Check file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (in_array($_FILES['image']['type'], $allowedTypes)) {
        if (move_uploaded_file($fileTmp, $targetFile)) {
            echo "Bild erfolgreich hochgeladen.";
			
			if (isset($targetFile) && file_exists($targetFile)) {
				$_SESSION['uploaded_image_path'] = $fileName;
			}
			
        } else {
            echo "Fehler beim Hochladen des Bildes.";
        }
    } else {
        echo "Nur Bilddateien sind erlaubt.";
    }
}



?>