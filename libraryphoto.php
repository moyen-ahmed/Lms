<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Library Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .gallery-item {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 200px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .gallery-item img {
            max-width: 100%;
            max-height: 70%;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .gallery-item p {
            margin: 10px;
            text-align: center;
            font-size: 14px;
            color: #333;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <header>Our Library Gallery</header>
    <div class="gallery">
        <div class="gallery-item">
            <img src="imgforranodm/g1.jpg" alt="Image 1">
            <p>Short description for image 1</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g2.jpg" alt="Image 2">
            <p>Short description for image 2</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g3.jpg" alt="Image 3">
            <p>Short description for image 3</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g4.jpg" alt="Image 4">
            <p>Short description for image 4</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g5.jpg" alt="Image 5">
            <p>Short description for image 5</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g6.jpg" alt="Image 6">
            <p>Short description for image 6</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g7.jpg" alt="Image 7">
            <p>Short description for image 7</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g8.jpg" alt="Image 8">
            <p>Short description for image 8</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g9.jpg" alt="Image 9">
            <p>Short description for image 9</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g10.jpg" alt="Image 10">
            <p>Short description for image 10</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g11.jpg" alt="Image 11">
            <p>Short description for image 11</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g1.jpg" alt="Image 12">
            <p>Short description for image 12</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g5.jpg" alt="Image 13">
            <p>Short description for image 13</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g9.jpg" alt="Image 14">
            <p>Short description for image 14</p>
        </div>
        <div class="gallery-item">
            <img src="imgforranodm/g6.jpg" alt="Image 15">
            <p>Short description for image 15</p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach((item, index) => {
                item.style.opacity = 0;
                setTimeout(() => {
                    item.style.transition = 'opacity 1s ease-in-out';
                    item.style.opacity = 1;
                }, index * 200);
            });

            galleryItems.forEach(item => {
                item.addEventListener('mouseover', () => {
                    item.style.transform = 'scale(1.1)';
                });

                item.addEventListener('mouseout', () => {
                    item.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>
