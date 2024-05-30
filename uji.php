<?php
system("clear");

$k = "\033[33;1m";
$h = "\033[32;1m";
$p = "\033[37;1m";
$m = "\033[31;1m";
$o = "\033[30;1m";

echo $p . "
";
echo $p . "	          " . $h . "Bot Tembak XL Lite 9K" . $p . "
";
echo $p . "	      " . $p . "Author: " . $k . "Mr. Black Hat" . $p . "
";
echo $p . "	       " . $p . "ME: " . $k . "Bug Hunter" . $p . "
";
echo $p . "
";


sleep(1);
$no = readline($p . "	 [] Nomermu Cok   " . $m . ": " . $k);

$ua = array(
    "Host:my.kmsp-store.com",
    "user-agent:Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Mobile Safari/537.36",
    "content-type:application/json",
    "origin:https://my.kmsp-store.com/",
    "sec-fetch-site:same-origin",
    "sec-fetch-mode:cors",
    "sec-fetch-dest:empty",
    "referer:https://my.kmsp-store.com/"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://xclite.netlify.app/api/users/otp");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data = json_encode(array('msisdn' => $no));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($ch);

if (curl_errno($ch)) {
    echo $p . "	 " . $m . "      Error: " . curl_error($ch) . "      " . $p . "
";
    exit();
}
curl_close($ch);

if (strpos($res, 'SUCCESS') !== false) {
    $json = json_decode($res);
    $id = explode('next_resend_allowed_at":"', $res)[1];
    $id = explode('"', $id)[0];
    $auth = $json->message->authId;

    file_put_contents(".auth", $auth);
    file_put_contents(".id", $id);

    echo $p . "
";
    echo $p . "	 " . $h . "     OTP Success Terkirim!" . $p . "
";
    echo $p . "
";
} else {
    echo $p . "
";
    echo $p . "	 " . $m . "      OTP Gagal Terkirim!" . $p . "
";
    echo $p . "
";
    exit();
}

$otp = readline($p . "	 [] Input Code OTP " . $m . ": " . $k);
echo $p . "	 ________________________________
";
file_put_contents(".otp", $otp);
shell_exec('bash log.sh');

$res = file_get_contents(".json");

if (strpos($res, 'successUrl') !== false) {
    $json = json_decode($res);
    $tkn = $json->message->tokenId;

    echo $p . "
";
    echo $p . "	 " . $h . "         Login Success!" . $p . "
";
    echo $p . "
";
} else {
    echo $p . "
";
    echo $p . "	 " . $m . "          Login Gagal!" . $p . "
";
    echo $p . "
";
    exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://my.kmsp-store.com/panel/produk/tembak_xl_special/api/v1/package_details");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$data = json_encode(array('idToken' => $tkn));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($ch);

if (curl_errno($ch)) {
    echo $p . "	 " . $m . "      Error: " . curl_error($ch) . "      " . $p . "
";
    exit();
}
curl_close($ch);

if (strpos($res, 'Saldo Tidak Bisa') !== false) {
    echo $p . "
";
    echo $p . "	 " . $m . "      Harus Ada Pulsa 9K!" . $p . "
";
    echo $p . "
";
    exit();
} elseif (strpos($res, 'Coba Lagi') !== false) {
    echo $p . "
";
    echo $p . "	 " . $k . "         Ulang Lagi!" . $p . "
";
    echo $p . "
";
    exit();
} elseif (strpos($res, 'SUCCESS') !== false) {
    echo $p . "
";
    echo $p . "	 " . $h . "         Dor Success! chuaakksss" . $p . "
";
    echo $p . "
";
} else {
    echo $p . "
";
    echo $p . "	 " . $h . "          Dor Gagal! cuk" . $p . "
";
    echo $p . "
";
    exit();
}
?>
