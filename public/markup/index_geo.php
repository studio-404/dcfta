<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DCFTA</title>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/materialize.min.js" type="text/javascript"></script>
	<script src="js/script.js?time=<?=time()?>" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css?time=<?=time()?>" />
	<link rel="stylesheet" type="text/css" href="css/_geo.css?time=<?=time()?>" />
</head>
<body>

<header>
	<section class="top">
		<section class="centerWidth topCenter">
			<section class="top-box">
				<section class="social-networks">
					<ul>
						<li class="fb"><a href=""></a></li>
						<li class="tw"><a href=""></a></li>
						<li class="yt"><a href=""></a></li>
					</ul>
				</section>
				<section class="languages">
					<ul>
						<li><a href="" class="active">GEO</a></li>
						<li><a href="">ENG</a></li>
						<li><a href="">RUS</a></li>
					</ul>
				</section>
			</section>
		</section>
	</section>

	<section class="topBottom">
		<section class="centerWidth">
			<section class="logo">
				<div class="flags">
					<p><img src="img/geo.png" alt="Georgian Flag" /></p>
					<p><img src="img/eur.png" alt="Georgian Flag" /></p>
					<p>dcfta.gov.ge</p>
				</div>
				<div class="text">Georgia-EU Deep &amp; Comprehensive Free Trade Area</div>
			</section>
			<section class="search">
				<i class="material-icons">search</i>
				<div class="input-field">
					<input id="searchInput" type="text" value="საკვანძო სიტყვა" data-val="საკვანძო სიტყვა" onclick="searchInputOn()" onblur="searchInputOff()" />
				</div>
			</section>
	
			<section class="nav_bg">
				<div class="nav_bar" onclick="openNavigation()">
					<div class="c-hamburger c-hamburger--htx">
					<span>toggle menu</span>
				</div>
			</section>


		</section>

		<section class="navigation">
			<ul>
				<li><a href="index.php" class="active"><span>მთავარი</span></a></li>
				<li><a href="about.php"><span>ჩვენ შესახებ</span></a></li>
				<li><a href="agreement.php"><span>შეთანხმება</span></a></li>
				<li><a href="implimentation.php"><span>დანერგვა</span></a></li>
				<li><a href="coordination.php"><span>კოორდინაცია</span></a></li>
				<li><a href="legislation.php"><span>კანონმდებლობა</span></a></li>
				<li><a href="is.php"><span>საერთაშორისო მხარდაჭერა</span></a></li>
				<li class="sub" data-sub="i25">
					<a href="dcfta.php" class="slide"><span>DCFTA ბიზნესისთვის</span></a> <i class="arrow"></i>
					<ul class="i25">
						<li><a href=""><span>სექტორი</span></a></li>
						<li><a href=""><span>ტექნიკური მოთხოვნები</span></a></li>
						<li><a href=""><span>სერვისები</span></a></li>
						<li><a href=""><span>სტანდარტი</span></a></li>
						<li><a href=""><span>სერთიფიკატი</span></a></li>
						<li><a href=""><span>წესები</span></a></li>
						<li><a href=""><span>საბაჟო პროცედურები</span></a></li>
					</ul>
				</li>
				<li><a href="news.php"><span>სიახლეები &amp; ივენთები</span></a></li>
				<li><a href="contact.php"><span>კონტაქტი</span></a></li>
			</ul>
		</section>


		
	</section>

</header>

<section class="mobileNavigation">
	<section class="yellowBox"></section>
	<section class="blueBox"></section>
</section>

<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s12 m6 l8 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">რას ვაკეთებთ</div>
				</section>
				<section class="mainText">
					ირველი მოვალეობა მთავრობის შენარჩუნება მოქალაქეებს უსაფრთხო და ქვეყნის უსაფრთხო. მთავარი ოფისი უკვე ფრონტის ხაზი ამ საქმეში მას შემდეგ, რაც 1782. როგორც ასეთი, მთავარი ოფისი თამაშობს ფუნდამენტური როლი უსაფრთხოებისა და ეკონომიკური კეთილდღეობის გაერთიანებული სამეფო.
				</section>
				
				<section class="marginminus10">
					<section class="col s12 m12 l6">
						<section class="justTitle">ანგარიშები</section>
						<section class="files files-mobile" data-type="reports"></section>
					</section>

					<section class="col s12 m12 l6">
						<section class="justTitle">პუბლიკაციები</section>
						<section class="files files-mobile" data-type="publications"></section>
					</section>

					<section class="files files-desktop">
						<section class="col s12 m12 l6 reports">
							<section class="file">
								<a href="">
									<p class="pdfIcon"></p>
									<p class="downloadIcon"></p>
									<p class="title"><span>საქართველო-ევროკავშირს შორის ღრმა და ყოვლისმომცველი თავისუფალი სავაჭრო სივრცის ანგარიში 2016</span><br /><b>355kb</b></p>
								</a>
							</section>

							<section class="file">
								<a href="">
									<p class="pdfIcon"></p>
									<p class="downloadIcon"></p>
									<p class="title"><span>საქართველო-ევროკავშირს შორის ღრმა და ყოვლისმომცველი თავისუფალი სავაჭრო სივრცის ანგარიში</span><br /><b>355kb</b></p>
								</a>
							</section>
						</section>

						<section class="col s12 m12 l6 publications">
							<section class="file">
								<a href="">
									<p class="pdfIcon"></p>
									<p class="downloadIcon"></p>
									<p class="title"><span>საქართველო-ევროკავშირს შორის ღრმა და ყოვლისმომცველი თავისუფალი სავაჭრო სივრცის ანგარიში</span><br /><b>355kb</b></p>
								</a>
							</section>

							<section class="file">
								<a href="">
									<p class="pdfIcon"></p>
									<p class="downloadIcon"></p>
									<p class="title"><span>საქართველო-ევროკავშირს შორის ღრმა და ყოვლისმომცველი თავისუფალი სავაჭრო სივრცის ანგარიში</span><br /><b>355kb</b></p>
								</a>
							</section>
						</section>
					</section>
				</section>
				
				<section class="marginminus10">
					<section class="col s12 m12 l12">
						<section class="headerText">
							<div class="line"></div>
							<div class="title">სიახლეები</div>
						</section>
					</section>
					
					<section class="col s12 m6 l6">
						<section class="newsBox">
							<a href="">
								<section class="imageBox">
									<img src="img/news.jpg" width="100%" alt="" />
								</section>
								<section class="data">
									<p>ახალი ამბავი</p>
									<p>ივლისი 7, 2016</p>
								</section>
								<section class="title">შეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირის</section>
								<section class="text">შეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირის</section>
							</a>
						</section>
					</section>

					<section class="col s12 m6 l6">
						<section class="newsBox">
							<a href="">
								<section class="imageBox">
									<img src="img/news.jpg" width="100%" alt="" />
								</section>
								<section class="data">
									<p>ახალი ამბავი</p>
									<p>ივლისი 7, 2016</p>
								</section>
								<section class="title">შეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირის</section>
								<section class="text">შეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირისშეთანხმება უკვე გაგრძელდა საქართველოს ნაწილი ხდება ევროკავშირის</section>
							</a>
						</section>
					</section>

				</section>

			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle">ევროკავშირის ბმულები</section>
				<ul class="usefullLinks">
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light"><img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
					<li>
						<a href="" class="waves-effect waves-light">
							<img src="img/eur2.png" alt="" />
							<span>ევროკავშირის კომისიის</span>
						</a>
					</li>
				</ul>
				<section class="justTitle marginTop40">ივენთების კალენდარი</section>
				
				<section class="CalendarBox">
					<?php
					@include('calendar.php'); 
					$calendar = new calendar();
					echo $calendar->index("ge"); 
					?>
				</section>

			</section>



			<section class="col s12 m12 l12 marginTop40">
				<section class="headerText">
					<div class="line"></div>
					<div class="title">გამოსადეგი ბმულები</div>
				</section>
				<section class="marginminus10">
					<section class="col s12 m4 l4">
						<ul class="usefullLinks">
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
						</ul>
					</section>

					<section class="col s12 m4 l4">
						<ul class="usefullLinks">
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
						</ul>
					</section>

					<section class="col s12 m4 l4">
						<ul class="usefullLinks">
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
							<li>
								<a href="" class="waves-effect waves-light">
									<img src="img/eur2.png" alt="" />
									<span>ევროკავშირის კომისიის</span>
								</a>
							</li>
						</ul>
					</section>
				</section>
			</section>


		</section>
	</section>	
</main>

<footer>
	<section class="centerWidth">		
		<section class="row marginBottom55">
			<section class="marginminus10">
				<section class="col s12 m12 l12">
					<section class="col s12 m3 l3"><a href=""><img src="img/geoeuro.jpg" alt="" class="bigImage" /></a></section>
					<section class="col s12 m3 l2"><a href=""><img src="img/giz.jpg" alt="" /></a></section>
					<section class="col s12 m3 l5 mobileMarginTop20"><p>ეს საიტი უკვე წარმოებული მხარდაჭერით, ევროკავშირის მიერ დაფინანსებული პროექტის "მცირე და საშუალო ბიზნესის განვითარების და თავისუფალი ვაჭრობის შესახებ საქართველოში" ახორციელებს Deutsche Gesellschaft für საერთაშორისო თანამშრომლობის საზოგადოების (GIZ) GmbH სახელით გერმანიის ფედერალური სამინისტროს ეკონომიკური თანამშრომლობისა და განვითარების სამინისტროს (BMZ). შინაარსი ამ ნახვა არ გამოხატავდეს ევროკავშირის.</p></section>	
					<section class="col s12 m2 l3"></section>				
				</section>
			</section>
		</section>

		<section class="footerText">
			<section class="marginminus10" style="margin:0">
			<p class="left">საქართველოს ეკონომიკისა და მდგრადი განვითარების სამინისტრო 2016 DCFTA.gov.ge</p>
			<p class="right"><a href=""><img src="img/logo.png" alt="logo" class="logo" /></a></p>
			</section>
		</section>
	</section>
</footer>

</body>
</html>