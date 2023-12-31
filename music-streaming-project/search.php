<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else {
	$term = "";
}
?>

<!-- <h4 style="color:#2ebd59 ">Cùng chúng tôi tìm thứ bạn muốn tìm</h4> -->
<div class="searchContainer">	
	<div style="display: inline;">
		<input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="tên bài hát/album/ca sĩ" onfocus="this.value = this.value">
		<div class="sear" >NHẬP TÌM KIẾM</div>
	</div>
</div>
<br></br>

<script>

$(".searchInput").focus();

$(function() {

	$(".searchInput").keyup(function() {
		clearTimeout(timer);

		timer = setTimeout(function() {
			var val = $(".searchInput").val();
			openPage("search.php?term=" + val);
		}, 2000);

	})


})

</script>

<?php if($term == "") exit(); ?>
<div class="tracklistContainer borderBottom">
	<div class="title_search"><h2>BÀI HÁT</h2></div>
	
	<ul class="tracklist haha">
		
		<?php
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults'>Không tìm thấy bài hát nào băt đầu bằng  " . $term . "</span>";
		}
		$songIdArray = array();

		$i = 1;
		while($row = mysqli_fetch_array($songsQuery)) {

			if($i > 15) {
				break;
			}

			array_push($songIdArray, $row['id']);
			$albumSong = new Song($con, $row['id']);
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

						<input type='hidden' class='songId' value='". $albumSong->getId() . "'>

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

<div class="artistsContainer borderBottom">
		
	<h2>CA SĨ</h2>

	<?php
	$artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

	if(mysqli_num_rows($artistsQuery) == 0) {
			echo "<span class='noResults'>Không tìm thấy ca sĩ nào băt đầu bằng " . $term . "</span>";
		}

	while($row = mysqli_fetch_array($artistsQuery)) {
		$artistFound = new Artist($con, $row['id']);


		echo "<div class='searchResultRow'>
				<div class=''artistName>

					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=". $artistFound->getId() . "\")'>

					"
					. $artistFound->getName() .
					"

					</span>

				</div>


			</div>";
	}
	?>

</div>

<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");


		if(mysqli_num_rows($albumQuery) == 0) {
			echo "<span class='noResults'>Không tìm thấy album nàobăt đầu bằng  " . $term . "</span>";
		}
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

<nav class="optionsMenu">
	

	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>