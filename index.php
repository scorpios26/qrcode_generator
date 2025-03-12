<?php
include('phpqrcode-master/qrlib.php');

if (isset($_POST['data'])) $data = $_POST['data'];
 else $data = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR CODE GENERATOR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>QR CODE GENERATOR</h1>
            <label for="">Input Text or URL</label>
            <input type="text" 
                    name="data" 
                    value="<?=$data?>" 
                    placeholder="Enter Data">

            <label for="">Select QR Code Sizes</label>
            <select name="size">
                <option value="500">Small (500x500)</option>
                <option value="750">Medium (750x750)</option>
                <option value="1000">Large (1000x1000)</option>
                <option value="1500">Extra Large (1500x1500)</option>
            </select>
            <button class="button-30" type="submit">Generate QR Code</button>
            
        </form>
        <div class="qr">
        <?php 
			
			if (isset($_POST['data']) && !empty($_POST['data'])) {
     			$data = $_POST['data'];
     			$size = (int)$_POST['size'];

     			$filePath = 'qrcodes/'. uniqid(). '.png';
     			QRcode::png($data, $filePath, QR_ECLEVEL_L, $size/150);
     			echo "<h2>Here is your QR Code:</h2>";
     			echo "<img src='$filePath' alt='QR Code'><br>";
     			echo "<button class='button-30'><a href='$filePath' download>Download QR Code</a></button>";
     		}else {
     			echo "<br>No data received!";
     		}
     		?>
        </div>
    </div>
</div>
</body>
</html>

