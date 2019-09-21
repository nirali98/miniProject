<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.content {
			height: 97vh;
		}
		.video-viewer {
			border:0;
		}
	</style>
</head>
<body>
	<div class="content">
		<h1>Add URL to play</h1>
		<!--
		<iframe class="video-viewer" id="url" src="" height="100%" width="100%"></iframe>
		-->
	</div>

	<script type="text/javascript">

		window.playerPopup = null;
		
		//every seconds
		window.setInterval(function(){
			fetchNewUrl();
		}, 5000);

		//fetch new url with ajax 
		function fetchNewUrl() {

			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					//alert(this.responseText);
					var data=JSON.parse(this.responseText);

					//console.log(data);
					//data.url+='?start=6&fs=1';
					assignUrl(data.url);

				}
			};
			xhttp.open("GET", "get-url.php", true);
			xhttp.send();
		}

		//assign url to #url if url is new
		function assignUrl(url) {
			if (window.oldUrl != url)
			{
				window.oldUrl = url;
				
				if (window.playerPopup) {
					//close old popup
					window.playerPopup.close()
				}

				//open popup
				setTimeout(function(){
					window.playerPopup = popup(url);
				}, 100);
				// window.playerPopup = window.open(url, "videoPlayer","width=500,height=500");

				
				//url = url.replace("youtu.be","youtube.com/embed");
				//console.log(url +"?autoplay=1");
				//document.getElementById("url").src = url;
			}
		}

		function popup(url) 
		{
		 params  = 'width='+screen.width;
		 params += ', height='+screen.height;
		 params += ', top=0, left=0'
		 params += ', fullscreen=yes';

		 newwin=window.open(url,'windowname4', params);
		 if (window.focus) {newwin.focus()}
		 return newwin;
		}

	</script>
</body>
</html>