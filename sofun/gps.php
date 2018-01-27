<?php 
/* 
methods coming from http://stackoverflow.com/questions/2526304 
*/ 
function getGps($exifCoord, $hemi) { 

    $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0; 
    $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0; 
    $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0; 

    $flip = ($hemi == 'W' or $hemi == 'S') ? -1 : 1; 

    return $flip * ($degrees + $minutes / 60 + $seconds / 3600); 
}
function gps2Num($coordPart) { 

    $parts = explode('/', $coordPart); 

    if (count($parts) <= 0) 
        return 0; 

    if (count($parts) == 1) 
        return $parts[0]; 

    return floatval($parts[0]) / floatval($parts[1]); 
} 

//$targetPath = '/home/kiang/Desktop/pic/*/*'; 
$targetPath = 'C:\wamp\www\upload_photo\*'; 

$exts = array('jpg', 'JPG'); 
$keys = array('GPSLongitude', 'GPSLongitudeRef', 'GPSLatitude', 'GPSLatitudeRef'); 
$fileStack = array(); 
foreach (glob($targetPath) AS $file) { 
    if (in_array(substr($file, -3), $exts)) { 
	echo $file;
        $exif = exif_read_data($file); 
        $keyCheck = true; 
        foreach ($keys AS $key) { 
            if ($keyCheck && empty($exif[$key])) { 
                $keyCheck = false; 
            } 
        } 
        if ($keyCheck) { 
            $lon = getGps($exif["GPSLongitude"], $exif['GPSLongitudeRef']); 
            $lat = getGps($exif["GPSLatitude"], $exif['GPSLatitudeRef']); 
            if (!empty($lon) && !empty($lat)) { 
				echo "</br>";
				echo $lat;
				echo "</br>";
				echo $lon;
				echo "</br>";
                $time = explode('_', substr(basename($file), 0, -4)); 
                if (!isset($fileStack[$time[0]])) { 
                    $fileStack[$time[0]] = array(); 
                } 
                $fileStack[$time[0]][$time[1]] = array( 
                    'file' => $file, 
                    'lat' => $lat, 
                    'lng' => $lon, 
                ); 
            } 
        } 
    } 
} 
/*ksort($fileStack); 
foreach($fileStack AS $day => $pics) { 
    $targetFile = 'gps/' . substr($day, 0, 6) . '.html'; 
    $fh = fopen($targetFile, 'a+'); 
    $dayChunks = str_split($day, 2); 
    $dayTime = mktime(1, 0, 0, $dayChunks[2], $dayChunks[3], $dayChunks[0] . $dayChunks[1]); 
    fwrite($fh, '<h1>' . date('Y-m-d(D)', $dayTime) . '</h1>'); 
    foreach($pics AS $time => $file) { 
        $imagePath = str_replace('http://localhost/test/', '../', $file['file']); 
        fwrite($fh, "<br /><img src='{$imagePath}' width='400' /><span>{$file['lat']},{$file['lng']}</span>");
    } 
    fwrite($fh, '<hr />'); 
    fclose($fh); 
}*/