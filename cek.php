<?php
system("clear");$k = "[33;1m";$h = "[32;1m";$p = "[37;1m";$m = "[31;1m";$o = "[30;1m";echo $p."
";echo $p."         ".$h."Bot Cek Kuota XL".$p."       
";echo $p."         ".$p."Author: InjectID  ".$p."     
";echo $p."  ".$p."Telegram: t.me/config_geratis".$p." 
";echo $p."   ".$p."Website: toolstermux.my.id".$p."   
";echo $p."       ".$p."Youtube: ".$k."Inject-ID".$p."       
";echo $p."

sleep(1);$no = readline($p." [] Input Number   ".$m.": ".$k);$ua=array('user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Mobile Safari/537.36');$ch = curl_init();curl_setopt($ch, CURLOPT_URL, "https://griyaflazz.xyz/ajax/request-otp-v2.php");curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);$data=('target='.$no);curl_setopt($ch, CURLOPT_POSTFIELDS, $data);$res = curl_exec($ch);$suc = preg_match("/Berhasil/i",$res);if($suc == "1"){$json = json_decode($res);$auth = $json->data;echo $p."
";echo $p." ".$h."     OTP Success Terkirim!".$p."     
";echo $p."
";}else{echo $p."
";echo $p." ".$m."      OTP Gagal Terkirim!".$p."      
";echo $p."
";exit();}$otp = readline($p." [] Input Code OTP ".$m.": ".$k);echo $p." ________________________________

";$ch = curl_init();curl_setopt($ch, CURLOPT_URL, "https://griyaflazz.xyz/ajax/verify-otp-v2.php");curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);$data=('otp='.$otp.'&authId='.$auth);curl_setopt($ch, CURLOPT_POSTFIELDS, $data);$res = curl_exec($ch);$suc = preg_match("/Berhasil Login/i",$res);if($suc == "1"){$json = json_decode($res);$id = $json->data;echo $p."
";echo $p." ".$h."         Login Success!".$p."        
";echo $p."
";}else{echo $p."
";echo $p." ".$m."          Login Gagal!".$p."         
";echo $p."
";exit();}$ch = curl_init();curl_setopt($ch, CURLOPT_URL, "https://griyaflazz.xyz/ajax/cek_quota.php");curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);$data=('token='.$id);curl_setopt($ch, CURLOPT_POSTFIELDS, $data);$res = curl_exec($ch);$nmr = explode('MSISDN : ',$res)[1];$nmr = explode('<br />',$nmr)[0];$pls = explode('PULSA : ',$res)[1];$pls = explode(' <br />',$pls)[0];$cek = explode('Paket yang Masih aktif : <br />',$res)[1];$cek = explode('</div>',$cek)[0];$quo = strip_tags($cek,'<br />');echo $p."
";echo $p."      Nomor: ".$h.$nmr."      ".$p."
";echo $p."      Pulsa: ".$k.$pls." 
";echo $p."
";echo $p."
";echo $p."     ".$k."Kuota Yang Anda Miliki".$p."     
";echo $p."
";echo $p."
";echo $h."".$quo."
";echo $p."
";

?>
