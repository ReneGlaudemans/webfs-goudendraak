<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Golden Dragon</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}" />
	<link rel="stylesheet" href="{{asset('css/contact.css')}}" />
	<link rel="stylesheet" href="{{asset('css/afhalen.css')}}" />
</head>

<body>
	<table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
		<tr style="height:50px;background-color:red">
			<td style="text-align:center;width:30%;color:yellow;font-size:30px">
				<a href="/">
					<img src="{{ asset('img/dragon-small.png') }}" alt="Golden Dragon" height="50px">
					<span style="font-family:'chinese_takeawayregular'">De Gouden Draak</span>
					<img src="{{ asset('img/dragon-small-flipped.png') }}" alt="Golden Dragon" height="50px">
				</a>
			</td>
			<td>
				<a href="/aanbiedingen" style="color:yellow;font-weight:bold;text-decoration: none;">
					<marquee behavior="scroll" direction="left">
						Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
					</marquee>
				</a>
			</td>
			<td style="text-align:center;width:30%;color:yellow;font-size:30px">
				<img src="{{ asset('img/dragon-small.png') }}" alt="Golden Dragon" height="50px">
				<span style="font-family:'chinese_takeawayregular'">De Gouden Draak</span>
				<img src="{{ asset('img/dragon-small-flipped.png') }}" alt="Golden Dragon" height="50px">
			</td>
		</tr>
	</table>
	<table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
		<tr style="height:7px;background-color:red">
			<td colspan="9">
			</td>
		<tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			</td>
			<td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			<td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			<td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px"></td>
			<td></td>
			<td style="width:25px"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border-bottom:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:50px;background-color:red">
			<td width="7px">
			<td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
			<td style="width:25px;"></td>
			<td style="width:25px;"></td>
			<td style="text-align:center">
				<table table width=100%>
					<tr>
						<td colspan='3'>
							<p>
								<img src="{{ asset('img/dragon-small.png') }}" style="float:left;height:200px"
									alt="Golden Dragon">
								<img src="{{ asset('img/dragon-small-flipped.png') }}" style="float:right;height:200px"
									alt="Golden Dragon">
								<span style="font-size:40px;font-weight:bold;color:yellow">Chinees Indische
									Specialiteiten</span><br>
								<span style="font-size:50px;font-weight:bold;color:yellow">De Gouden Draak</span><br>
							</p>
							<p>
							<table style="margin:auto;font-size:20px;color:white" border="1px solid white">
								<tr background="{{ asset('img/menu_bg_gradient.png') }}">
									<td valign="middle">
										<a href="/menukaart" style="color:white">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menukaart&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</a>
									</td>
									<td valign="middle">
										<a href="/news" style="color:white">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nieuws&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</a>
									</td>
									<td valign="middle">
										<a href="/contact" style="color:white">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</a>
									</td>
									<td valign="middle">
										<a href="/orders" style="color:white">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Afhalen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</a>
									</td>
									<td valign="middle">
										<a href="/menu/pdf" style="color:white">
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Download
											menu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</a>
									</td>
								</tr>
							</table>
							</p>
						</td>
					</tr>
				</table>
				<!-- CONTENT HERE! -->
				@yield('content')
				<br>
				<div text-align="center"><a href="/contact">Naar Contact</a></div>
			</td>
			<td style="width:25px;"></td>
			<td style="width:25px;"></td>
			<td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			<td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px"></td>
			<td></td>
			<td style="width:25px"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border-top:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			<td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:25px;background-color:red">
			<td width="7px">
			</td>
			<td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow"></td>
			<td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-left:4px solid yellow;"></td>
			<td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
			<td width="7px">
		</tr>
		<tr style="height:7px;background-color:red">
			<td colspan="9">
			</td>
		<tr>
	</table>
</body>

</html>