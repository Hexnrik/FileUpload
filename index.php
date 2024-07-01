<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hexnrik File Upload</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/pics/favicon.ico">
  </head>
  <body>
      <h1>Lade deine Datei hoch</h1>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $uploadDir = 'uploads/';
          if (!is_dir($uploadDir)) {
              mkdir($uploadDir, 0777, true);
          }

          $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'video/mp4', 'video/x-msvideo', 'audio/mpeg'];

          $fileType = mime_content_type($_FILES['file']['tmp_name']);
          
          if (in_array($fileType, $allowedMimeTypes)) {
              $uploadFile = $uploadDir . basename($_FILES['file']['name']);

              if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                  $fileUrl = htmlspecialchars($uploadFile);
                  echo "Datei erfolgreich hochgeladen: <a href=\"$fileUrl\">" . htmlspecialchars(basename($_FILES['file']['name'])) . "</a><br>";
              } else {
                  echo "Es gab einen Fehler beim Hochladen der Datei.<br>";
              }
          } else {
              echo "Ungültiger Dateityp. Nur Bilder, Videos und MP3 Dateien sind erlaubt.<br>";
          }
      }
      ?>
      <form action="index.php" method="post" enctype="multipart/form-data">
          <input class="file" type="file" name="file" accept="image/*,video/*,audio/mpeg">
          <input class="button" type="submit" value="Upload">
      </form>
  </body>
</html>
