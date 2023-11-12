<?php 
include("includes/includedFiles.php");
?>


<!-- <h1 class="pageHeadingBig">You Might Also Like</h1> -->

<div id="slider"></div>


<div>
	<h1 class="item-album">CÓ THỂ BẠN SẼ THÍCH</h1>
</div>


<div class="tracklistContainer borderBottom">
	<h2>BÀI HÁT NGẪU NHIÊN</h2>
	<ul class="tracklist">
		
		<?php
		$SongQuery = mysqli_query($con, "SELECT * FROM songs ORDER BY RAND() LIMIT 7");
		while($row = mysqli_fetch_array($SongQuery)) {
			$songIdArray[] = $row['id'];
		}
		
		$i = 1;
		foreach((array)$songIdArray as $songId) {
			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
					<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
					<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>

						<input type='hidden' class='songId' value='". $albumArtist->getId() . "'>

						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>
				</li>";
			$i = $i + 1;
		}
		

		?>

		<script>
			
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';		
			tempPlaylist = JSON.parse(tempSongIds);
			console.log(tempPlaylist);
		</script>


	</ul>
</div>

<div>
	<h1 class="item-album">ALBUM</h1>
</div>
<div class="gridViewContainer">

	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 8");

		while($row = mysqli_fetch_array($albumQuery)) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>

</div>


<div>
	<h1 class="item-album">CA SĨ</h1>
</div>
<div class="gridViewContainer">

	<?php
		$artistQuery = mysqli_query($con, "SELECT * FROM artists ORDER BY RAND() LIMIT 4");

		while($row = mysqli_fetch_array($artistQuery)) {
			echo "<div class='gridViewItem artist'>
					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $row['id'] . "\")''>
						<img src='" . $row['path'] . "'>

						<div class='gridViewInfo'>"
							. $row['name'] .
						"</div>
					</span>

				</div>";
		}
	?>

</div>

