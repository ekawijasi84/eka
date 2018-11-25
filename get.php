<?php

    echo "URL BOT : http://bot.id-follower.com/tele/?code=
    Input : ";
    $url = trim(fgets(STDIN));

    echo "Saved File : yourfile.txt
    Input : ";
    $myFile = trim(fgets(STDIN));

    echo "Total Looping : 10/20
    Input : ";
    $loop = trim(fgets(STDIN));
echo "      Bot Auto Extrapper Voucher Alfamart\n";
echo "       Coded By Eka Wijanarka\n\n";

    $x = 0;
    while($x < $loop) {  // Ganti $x < 100 menjadi 1 apabila tidak ingin menunggu
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        $string = curl_exec($ch);
        curl_close($ch);
        $hasil = json_decode($string);
                if($hasil->Gagal == "True")
        {
        echo "[".$x."] " ;
        echo $string."\n";
        } else {
        echo "[".$x."] " ;
        echo $string."\n";
        $fh = fopen($myFile, 'a') or die ("can't open file");
        fwrite($fh, $hasil->code."|".$hasil->url."\r\n");
        fclose($fh);

        $x++;
        flush();
        sleep(0); // Angka 3 itu menandakan bahwa lama menunggu 3 detik. Ganti angka 3 menjadi 0 apabila tanpa menunggu
   }
}
?>
