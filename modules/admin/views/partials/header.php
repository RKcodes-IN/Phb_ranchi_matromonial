<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\admin\models\Notification;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
	<nav class="navbar navbar-expand navbar-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Messages Dropdown Menu -->

			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge">
						<?php $noticount = Notification::find()->where(['mark_read' => 0])->count();
						echo $noticount ?>

					</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header"><?php echo $noticount; ?> Notifications</span>
					<?php if ($noticount > 0) {
						$notification = (new Notification())->getLatestUnreadNotification();

						foreach ($notification as $noty) {
					?>

							<div class="dropdown-divider"></div>
							<a href="<?= Url::toRoute(['notification/view', 'id' => $noty->id]) ?>" class="dropdown-item">
								<i class="<?= $noty->icon ?> mr-2"></i> <?= $noty->title ?>
								<span class="float-right text-muted text-sm"><?= $noty->created_on ?> </span>
							</a>


					<?php }
					} ?>


					<div class="dropdown-divider"></div>
					<a href="<?= Url::toRoute(['notification/index']) ?>" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
		</ul>
	</nav>
</header>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

<script>
	window.setInterval(getNotification, 5000);

	//window.setInterval(getgrowl, 5000);


	function getNotification() {

		$.ajax({
			type: "GET",
			url: "<?= Url::toRoute(['notification/get-notification']) ?>",
			cache: false,
			success: function(data) {
				console.log(data);
				if (data.count == 0) {
					//$.playSound("http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3");
				} else {
					//	alert('dddd');
					$.playSound("http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3");
					$('.noty-count').html(data.count);
					$.each(data.detail, function(key, val) {
						// console.log(val);
						var html = getNotyHtml(val);
						$('.notification-data').append(html);
						$.playSound("http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3");
						var obj = document.createElement("audio");
						obj.src = "http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3";
						obj.play();
						getgrowl(val);

					});

				}
			}
		});

	}

	function getgrowl(msg) {
		//alert('dddddfdsfsdfsdfsd');
		$.ajax({
			type: "POST",
			url: "<?= Url::toRoute(['notification/growl']) ?>",
			cache: false,
			//	dataType : "json",
			data: {
				msg: msg
			},
			success: function(data) {
				console.log(data);
				//$("#growl").html(data.growl);
				$.notify(data.growl);
				//$.playSound("http://www.noiseaddicts.com/samples_1w72b820/3724.mp3");
				//$.playSound("https://fs.flockusercontent.com/8da26de15719173486b3cc27?Expires=1571920184&Signature=OOeSVVGRvc0RGE3onSoFLvP0Kb9stdnZhxEgGtdoz6jYSihrjuQbLbJKvmv8yYTbhonA-k8BsZ~vojMJd7R9Ah6wuGauvTh8AkUvgy6i3jGF-xSh6CUApBE0MDJ7~RwQpTYL3EFlNGaxZsjm33bP1zuy9dSMhsZgZRVdz5UWo6tgzRje3j6qLm0zMv-0niBnYgZknf4HAAqFLCxqeItHs5M4XXNbbCxLHo2KrStL58EMLWcOlfMwtlQJIP3NASP8g1l6-UM9nvGtK2WBx8ubdQTazymsHBLwPeQFWAcLQbZw5m0QoZBaG9gxUe79JKMoIlemX9aDcZzX3E6qXfsPMQ__&Key-Pair-Id=APKAJMN6OEFOLBEBMIJA");

			},
			error: function(xhr, status, error) {
				alert(error);
			}
		});
	}

	function getNotyHtml(data) {

		var html = '';
		html += '<li><a href="' + data.url + '"> <i class="' + data.icon + '"></i>' + data.title + '';
		html += "</a></li>";
		return html;

	}
</script>