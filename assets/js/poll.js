// leading zero format
function formatNumber(number) {
	return (number < 10 ? '0' : '') + number;
}

// truncate labels
function truncate(string) {
	if (string.length > 20) {
		return string.substring(0,20)+'...';
	} else {
		return string;
	}
}

// get template directory path from var in function.php
var $templateDir = '';
if ( typeof my_js_vars.templateDir !== 'undefined' && my_js_vars.templateDir != null) {
    $templateDir =  my_js_vars.templateDir;
}

// fetch graph data
var $graphData = [];
function getGraphValues() {
	setTimeout(function() {
		try {
			var $timestmap = new Date().getTime();
			$.get($templateDir + '/assets/php/votes.txt?' + $timestmap, function(data) {
				$graphData = [];
				var theData = data.split('||');
				$graphData.push(parseInt(theData[0]));
				$graphData.push(parseInt(theData[1]));
			});
		} catch(e) {
		}
	},1000);
}

// build chart
function resultChart() {
	var $graphType = document.getElementById('graphType').value;
	var $graphColor_1 = document.getElementById('graphColor_1').value;
	var $graphColor_2 = document.getElementById('graphColor_2').value;
	var $labels = [truncate($('input[name=contestant-1]').val()), truncate($('input[name=contestant-2]').val())];
	var $Options = {};
	if ($graphType == 'bar') {
		$Options = {
			legend: {
				display: false
			},
			scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                }
	            }]
	        }
		}
	} else {
		$Options = {
			legend: {
				display: true
			},
		};
	}
	var ctx = document.getElementById('pollResults').getContext('2d');
	var myChart = new Chart(ctx, {
		type: $graphType,
		data: {
			labels: $labels,
			datasets: [{
				data: $graphData,
				backgroundColor: [
					$graphColor_1,
					$graphColor_2
				]
			}]
		},
		options: $Options
	});
}

var showResults = false; // variable to toggle alert-success and on results screen

// send vote - W3 Schools style
function getVote(val) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
	  xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById('results').innerHTML=xmlhttp.responseText;

			$('html, body').animate({ scrollTop: 0 }, 500); // little animation
			$('.loading').fadeIn(300);

			setTimeout(function() {
				$('#content').fadeOut(300, function() {
					getGraphValues(); // get values
					if (showResults == false) { // user is voting
						store('pollster_has_voted', true); // set local storage / cookie
						$('#has-voted').removeClass('d-none'); // show has voted banner
						$('button[data-action=vote]').remove(); // remove buttons
						$('#did-vote').removeClass('d-none'); // set up already voted banner when user returns to poll
					}
					$('#results').fadeIn(1000, function() {
						setTimeout(function() {
							$('.loading').fadeOut(300);
						}, 200);
						setTimeout(function() {
							resultChart();
						}, 350);
					});
				});

			}, 1500);
		}
	}
	xmlhttp.open('GET', $templateDir + '/assets/php/votes.php?vote=' + val, true);
	xmlhttp.send();
}

// toggle reuslts/poll function
function toggleResults() {
	if ($('#results').is(':visible')) { // when coming form the results screen
		$('html, body').animate({ scrollTop: 0 }, 500);
		$('.loading').fadeIn(300);
		setTimeout(function() {
			$('#results').fadeOut(300, function() {
				$(this).empty();
				$('#content').fadeIn(700).next();
				$('.loading').fadeOut(300);
				showResults = false;
			});
		}, 1500);
	} else { // when coming from the home screen
		showResults = true;
		getVote();
	}
}

$(document).ready(function() {

	// external attribute
	$('a[rel=external], a[data-rel=external]').attr('target', '_blank');

	// check if user already voted
	$has_voted = store('pollster_has_voted');
	if (typeof $has_voted !== 'undefined' && $has_voted == true) { // has voted
		$('button[data-action=vote]').remove(); // remove buttons
		$('#did-vote').removeClass('d-none'); // show already voted banner
	}

	// check if user purchased the theme
	$has_purchased = store('pollster_has_purchased');
	if (typeof $has_purchased !== 'undefined' && $has_purchased == true) { // has voted
		$('#merchant').removeClass('d-none'); // hide merchant banner
	}

	// page load transition
	$('html, body').animate({ scrollTop: 0 }, 500);
	setTimeout(function() {
		$('.loading').fadeOut(300);
	}, 2000);

	// mobile menu trigger
	$('button.hamburger').click(function() {
		$(this).toggleClass('is-active');
		if ($('.mobileNav').is(':visible')) {
			$('.mobileNav, .mobileNavOverlay').addClass('d-none')
		} else {
			$('.mobileNav, .mobileNavOverlay').removeClass('d-none');
		}
	});

	// countdown from w3schools - https://www.w3schools.com/howto/howto_js_countdown.asp
	var countDownDate = $('#countToDate').val();
	// Update the count down every 1 second
	var x = setInterval(function() {
		// Get todays date and time
		var now = new Date().getTime();
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		// show coundown
		$.each([days, hours, minutes, seconds], function(a, b) {
			$('#countdown span:eq(' + a + ')').text(formatNumber(b));
		});
		// less than 10 days
		if (days <= 10) {
			$('#countdown #countdown-days').removeClass('bg-dark').addClass('bg-danger')
	    }
		// poll has ended
		if (distance < 0) {
			clearInterval(x);
			$('#countdown span').text('00'); // set coundown to zero
			$('#poll-closed').removeClass('d-none'); // show closed message
			$('#did-vote').addClass('d-none'); // hide already voted banner - not use for it now
			$('button[data-action=vote]').remove(); // remove buttons
		}
	}, 1000);

	// toggle results
	$(document).on('click', '.toggle-results', function() {
		toggleResults();
	});

	// send vote
	$('button[data-action=vote]').click(function() {
		getVote($(this).val()); // send vote
	});

});
