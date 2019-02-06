<?php
ini_set("allow_url_fopen", 1);

$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);

$protocol = "http:";
?>

<!doctype html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Recruitment task</title>

		<link rel='stylesheet' href='dist/styles/main.css' type='text/css' media='all' />
	</head>
 	<body class="body">
 		<header class="header">
 		</header>
 		<main class="main">
 			<div class="container">
 				<div class="news">
		 			<div class="row">
		 				<?php
		 					$news = file_get_contents("http://perspektywy.pl/rekrutacja/news.json", false, $context); 

		 				// 	$news = '{
							//     "1": {
							//         "title": "Revas - „Pan Tadeusz” podstaw przedsiębiorczości",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_01.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link1"
							//     },
							//     "2": {
							//         "title": "Genius Universitatis 2019 – zaproszenie dla uczelni!",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_02.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link2"
							//     },
							//     "3": {
							//         "title": "3000 kobiet to dopiero początek!",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_03.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link3"
							//     },
							//     "4": {
							//         "title": "Centrum Mistrzostwa Informatycznego - szansa dla 12 tysięcy uczniów",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_04.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link4"
							//     },
							//     "5": {
							//         "title": "Sylwester z pożyczką. W Polsce czy za granicą?",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_05.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link5"
							//     },
							//     "6": {
							//         "title": "Lekcja technologii z Microsoft",
							//         "img": "//perspektywy.pl/rekrutacja/img/img_06.jpg",
							//         "link": "//perspektywy.pl/rekrutacja/link6"
							//     }
							// }';

							$news_array = json_decode($news, true); 

							if(sizeof($news_array))
							foreach ($news_array as $na) {
								?>
								<div class="col-xs-6 col-md-4">
									<div class="news__item" style="background-image: url(<?= $protocol.$na['img']?>)">
										<div class="news__title">
											<?= $na['title']?>
										</div>
										<a href="<?= $protocol.$na['link']?>" class="news__link">
										</a>
									</div>
								</div>
								<?php
							}
						?>
		 			</div>	
		 		</div>
	 		</div>
 		</main>
 		<footer class="footer"> 			
 		</footer>
 	</body>
</html>