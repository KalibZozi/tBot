<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>tBot</title>
</head>
<body>
	<?php
        include("config.php");
        $config = new tBotConfig;

		//login form action url
		$url="https://ncore.cc/login.php"; 
		$postinfo = "nev=".$config->getUsername()."&pass=".$config->getPassword();

		$cookie_file_path = "cookie.txt";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		//set the cookie the site has for certain features, this is optional
		curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
		curl_setopt($ch, CURLOPT_USERAGENT,
			"Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
		curl_exec($ch);

		//page with the content I want to grab
//		curl_setopt($ch, CURLOPT_URL, "https://ncore.cc/torrents.php");
		//do stuff with the info with DomDocument() etc
		curl_setopt($ch, CURLOPT_URL, "https://ncore.cc/torrents.php?action=details&id=1871395");
		$rawHtml = curl_exec($ch);
		curl_close($ch);
		
		$explodedHtml = explode("\n", $rawHtml);
//		echo "size=".count($explodedHtml)."<br />";
//		echo "Elso=".htmlspecialchars($explodedHtml[0]);
//		while ($html) {
		    
//		}
//		echo htmlspecialchars($rawHtml);
        echo $rawHtml;
	?>
</body>
</html>
