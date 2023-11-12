<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
// Function to read image names from a CSV file
function readGalleryFile($filePath)
{
    $images = [];
    if (($handle = fopen($filePath, "r")) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            $images[] = $data[0];
        }
        fclose($handle);
    }
    return $images;
}

// Specify the path to the gallery file
$galleryFilePath = 'gallery.csv';

// Read image names from the gallery file
$galleryImages = readGalleryFile($galleryFilePath);

function generateGalleryHTML($galleryImages)
{
    foreach ($galleryImages as $index => $imageName) {
        $thumbnailPath = "thumbnail{$index}.png";
        $modalId = "img{$index}";

        // Gallery Image
        printf(
            '<a href="#%s">
                <img src="%s" alt="%s">
            </a>',
            $modalId,
            $thumbnailPath,
            $imageName
        );
    }

    foreach ($galleryImages as $index => $imageName) {
        $modalId = "img{$index}";
        $imagePath = "images/{$imageName}";

        // Modal
        printf(
            '<div class="modal" id="%s">
                <a href="#" class="close">&times;</a>
                <img src="%s" alt="%s">
            </div>',
            $modalId,
            $imagePath,
            $imageName
        );
    }
}

// Load gallery images from the file (CSV)
$galleryImages = readGalleryFile('gallery.csv');
?>

<html>
    <head>
        <title>Gallery</title>
        <link rel="stylesheet" href="hw2.css">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="hw1.php">CV</a></li>
                <li><a href="hw2.php">Gallery</a></li>
                <li><a href="hw3.php">Contact</a></li>
                <li style="float:right;">
                    <?php
                    // Display welcome message and logout button
                    echo "Welcome, " . $_SESSION['username'] . "!";
                    echo ' <a href="logout.php">Logout</a>';
                    ?>
                </li>
            </ul>
        </nav>
        <div class="gallery">
            <?php generateGalleryHTML($galleryImages); ?>
        </div>
    </body>
</html>