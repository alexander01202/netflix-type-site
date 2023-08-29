// dateFns is version v1.9.0 Remember
var today = new Date();
const stamps = document.querySelectorAll('.stamp').forEach(stamp => {
const before = new Date(stamp.getAttribute('data-time'));
stamp.innerHTML = dateFns.distanceInWords(today, before, {addSuffix: true},{includeSeconds: true})
});
$(document).ready(() => {
$(".box").each(function(i, obj) {
	$(this).on('click',() => {
	var classs = $(this).siblings("#box").val();	
	var nameinput = $(this).children(".name").val();
	var episode;
	var season;
	$(".popup-wrapper").children("div").removeClass("d-none");
	if (classs === "series") {
		episode = $(this).children(".episodeno").val();
		season = $(this).siblings(".serieseason").val();
// 		console.log(episode,season)
	}
	$.ajax({
		type:'POST',
		url: 'includes/popup.php',
		data: {popup:nameinput,
			videoType:classs,
			h6:episode,
			season:season	
		},
		dataType: "text",
		success: function(data){
		 $(".popup-wrapper").children("div").addClass("d-none");
		  $(".popup-wrapper").html(data);
		}
	});
	})
});
})
const box = document.querySelectorAll('.box');
const section = document.querySelector('.downloadpg');
const popupclose = document.querySelector('.popup-close');
const popupwrapper = document.querySelector('.popup-wrapper');
const arrays = Array.from(box);
arrays.forEach(array => {
array.addEventListener('click',(e) => {
	popupwrapper.style.display = "block";
})
popupwrapper.addEventListener('click', (e) => {
	if ((!e.target.classList.contains('links') && !e.target.classList.contains("copylinks")) || e.target.classList.contains('popup-close')) {
			popupwrapper.style.display = "none";
	    }
    })
});
videojs.Vhs.GOAL_BUFFER_LENGTH = 100;
videojs.Vhs.MAX_GOAL_BUFFER_LENGTH = 150;
var player = videojs('#vid1', {
controls: true,
  autoplay: false,
  responsive: true,
//   preload: 'none',
  html5: {
    vhs: {
    //   overrideNative: !videojs.browser.IS_SAFARI,
	  withCredentials: true,
	  enableLowInitialPlaylist: true
    },
    nativeAudioTracks: false,
    nativeVideoTracks: false,
    nativeTextTracks: false
  },
	playbackRates: [0.25, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4],
	hotkeys: {
        volumeStep: 0.1,
        seekStep: 5,
        enableModifiersForNumbers: false
    },
	plugins:{
		hotkeys: {
			enableModifiersForNumbers: false,
			seekStep: 30,
		}
	}
})
player.mobileUi();
player.logo({
    image: 'https://www.yournetflixwebsite.com/icons/logo.png',
	width: 70,
	height: 70,
	opacity: 0.8,
	fadeDelay: 3000
});
player.on('mouseover', () => {
	player.logo().show();
});
player.controlBar.addChild('QualitySelector');
player.extraButtons({
	quickBackward: { seconds: 30 },
	quickForward: { seconds: 30 }
})
// setInterval(function() {
//  //  I will run for every 15 minutes
// }, 1500)
// player.src([
//     {
//       src: '',
//       type: 'video/mp4',
//       label: '1080P',
//   },
//   {
//       src: '',
//       type: 'video/mp4',
//       label: '720P',
//   },
//   {
//       src: '',
//       type: 'video/mp4',
//       label: '480P',
//       selected: true,
//   },
//   {
//       src: '',
//       type: 'video/mp4',
//       label: '360P',
//       selected: true,
//   },
//   {
//       src: '',
//       type: 'video/mp4',
//       label: '240P',
//   },
// ]);
// player.on('click', () => {
// 	player.logo().show();
// });