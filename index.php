<!DOCTYPE HTML>
<html>
	<head>
		<title>Chat Simsimi by JakRapp</title>
                <link href='http://www.jakrapp.com/favicon.ico' rel='icon' type='image/x-icon'/>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	</head>
	<body>
	 <h1>JakRapp</h1>
		<div class="contact"> 
			<div class="contact-top">
				 <h2>Chat Simsimi</h2>
			</div>
			<div class="container form-main" align="center">
				<div class="panel panel-primary panel-main">
					<div class="panel-body">
			<div class="fiel">
			<form>
				<input name="pesan" type="text"  required autocomplete="off" class="user" placeholder="Masukkan kata-kata disini..."/>
				<p>Message :</p>
				<div class="result"></div>
			</form>
			</div>
			<div class="send">
				<form>
				   <input type="submit"  value="Kirim"/>
				</form>
			</div>
						</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		window.url='simsimi.php';
			$(document).ready(function() {
				$('div').find('form').on('submit', function(e) {
					e.preventDefault();
					window.pesan=$('input[type="text"]').val();
					$.ajax({
						url: window.url,
						data: {
							pesan: window.pesan
						},
						method: 'GET',
						dataType: 'html',
						beforeSend: function() {
							$('input[type="text"]').attr('disabled', true);
							$('button').attr('disabled', true).html('Loading...');	
						},
						complete: function() {
							$('input[type="text"]').removeAttr('disabled');
							$('button').removeAttr('disabled').html('Kirim');
						},
						success: function(data) {
							$('div.result').html(data);
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							error=XMLHttpRequest;
							$('div.result').html(JSON.parse(error.responseText));
						}
					});
				});
			});
		</script>	
	<div class="copyright">
		<p>by <a href="http://www.jakrapp.com/" target="_blank">JakRapp</a></p>
	</div>	
	</body>
</html>