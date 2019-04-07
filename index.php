<?php
/**
 * The main template file
 */

get_header(); ?>

<div id="poll-closed" class="alert alert-danger m-0 rounded-0 text-center d-none">
	<div class="d-flex align-items-center justify-content-center">
		<span class="fa-stack fa-lg mr-2">
			<i class="fas fa-circle fa-stack-2x text-white"></i>
			<i class="fas fa-lock fa-stack-1x fa-inverse text-danger"></i>
		</span>
		<div>
			<?php echo get_theme_mod('poll_ended_message', 'Oops! This poll is now closed.'); ?>
		</div>
	</div>
</div>

<div id="primary" class="content-area relative">
	<div id="content" class="site-content" role="main">

		<div id="did-vote" class="alert alert-info m-0 rounded-0 text-center d-none">
			<div class="d-flex align-items-center justify-content-center">
				<span class="fa-stack fa-lg mr-2">
					<i class="fas fa-circle fa-stack-2x text-white"></i>
					<i class="fas fa-thumbs-up fa-stack-1x fa-inverse text-info"></i>
				</span>
				<div>
					<?php echo get_theme_mod('poll_has_voted', 'You already cast your vote.'); ?>
				</div>
			</div>
		</div>

		<form id="poll" class="row m-0">
			<div id="left" class="col-12 col-md-6 order-1 order-md-2 py-5 text-center contestant" data-id="opt1">

				<?php if ( '' != get_theme_mod( 'c1_img_settings' ) ) { ?>
					<figure class="text-center">
						<img src="<?php echo wp_get_attachment_image_url( get_theme_mod( 'c1_img_settings' ), 'lg' ); ?>" alt="" />
					</figure>
				<?php } ?>

				<h2 class="h2 m-0 px-5 letter-spacing--1" data-id="contestant-name">
					<?php echo get_theme_mod('c1_name_settings', 'Contestant 1'); ?>
				</h2>

				<?php if ( '' != get_theme_mod( 'c1_details_settings' ) ) { ?>
					<div class="mt-3" data-id="contestant-details">
						<div class="mx-auto px-5 w-lg-60">
							<?php echo get_theme_mod('c1_details_settings'); ?>
						</div>
					</div>
				<?php } ?>

				<div class="mt-5 mb-md-5" data-name="voteBtn">
					<button type="button" name="contestant_one" value="option1" class="btn button rounded-0 px-5 py-3" data-action="vote" data-name="<?php echo get_theme_mod('c2_name_settings', 'Contestant 2'); ?>">
						<?php echo get_theme_mod('vote_button_text', 'Vote'); ?>
					</button>
				</div>

			</div>
			<div id="right" class="col-12 col-md-6 order-3 order-md-3 py-5 text-center contestant" data-id="opt2">

				<?php if ( '' != get_theme_mod( 'c2_img_settings' ) ) { ?>
					<figure class="text-center">
						<img src="<?php echo wp_get_attachment_image_url( get_theme_mod( 'c2_img_settings' ), 'lg' ); ?>" alt="" />
					</figure>
				<?php } ?>

				<h2 class="h2 m-0 px-5 letter-spacing--1" data-id="contestant-name">
					<?php echo get_theme_mod('c2_name_settings', 'Contestant 2'); ?>
				</h2>

				<?php if ( '' != get_theme_mod( 'c2_details_settings' ) ) { ?>
					<div class="mt-3" data-id="contestant-details">
						<div class="mx-auto px-5 w-lg-60">
							<?php echo get_theme_mod('c2_details_settings'); ?>
						</div>
					</div>
				<?php } ?>

				<div class="mt-5 mb-md-5" data-name="voteBtn">
					<button type="button" name="contestant_two" value="option2" class="btn button rounded-0 px-5 py-3" data-action="vote" data-name="<?php echo get_theme_mod('c2_name_settings', 'Contestant 2'); ?>">
						<?php echo get_theme_mod('vote_button_text', 'Vote'); ?>
					</button>
				</div>

			</div>

			<div id="time-left" class="col-12 order-2 order-md-1 py-3 border-bottom border-top box-shadow-top">
				<div id="countdown-wrap">

					<div class="text-uppercase text-muted font-size-xs mb-1"><em>Time left</em></div>

					<div id="countdown" class="d-flex justify-content-around border rounded p-1 bg-white">
						<span id="countdown-days" class="text-center px-1 rounded bg-dark text-white">00</span>
						<span id="countdown-hours" class="text-center border-right px-1">00</span>
						<span id="countdown-minutes" class="text-center border-right px-1">00</span>
						<span id="countdown-seconds" class="text-center px-1">00</span>
					</div>

					<div class="mt-1">
						<div id="countdown-labels" class="d-flex justify-content-around text-muted text-shadow">
							<span id="countdown-label-days" class="text-center text-uppercase font-size-xs px-1"><em>Days</em></span>
							<span id="countdown-label-hours" class="text-center text-uppercase font-size-xs px-1"><em>Hrs</em></span>
							<span id="countdown-label-minutes" class="text-center text-uppercase font-size-xs px-1"><em>Mins</em></span>
							<span id="countdown-label-seconds" class="text-center text-uppercase font-size-xs px-1"><em>Secs</em></span>
						</div>
					</div>

				</div>
			</div>

			<!-- // countdown -->
			<?php
				if ( '' != get_theme_mod( 'poll_end_date_time_settings' ) ) {
					$countToDate = get_theme_mod('poll_end_date_time_settings'); // user selected date
					$countToDate =  strtotime($countToDate) * 1000;
				} else {
					$countToDate = strtotime('tomorrow midnight') * 1000; // tomorrow midnight
				}
			?>
			<input id="countToDate" type="hidden" name="countToDate" value="<?php echo $countToDate; ?>">

			<!-- // graph type -->
			<input id="graphType" type="hidden" name="graphType" value="<?php echo get_theme_mod('graph_type', 'doughnut'); ?>">

			<!-- // chart colors -->
			<input id="graphColor_1" type="hidden" name="graphColor_1" value="<?php echo get_theme_mod('graphColor_1', '#0066b2'); ?>">
			<input id="graphColor_2" type="hidden" name="graphColor_2" value="<?php echo get_theme_mod('graphColor_2', '#ffc600'); ?>">

			<!-- // contestant names -->
			<input type="hidden" name="contestant-1" value="<?php echo get_theme_mod('c1_name_settings', 'Contestant 1'); ?>">
			<input type="hidden" name="contestant-2" value="<?php echo get_theme_mod('c2_name_settings', 'Contestant 2'); ?>">

		</form><!-- .row -->

		<div class="py-3 border-top box-shadow-top">
			<div class="text-center py-2">
				<a class="toggle-results font-montserrat text-inherit py-3" href="javascript:void(0);">
					<div class="d-flex align-items-center justify-content-center">
						<span class="fa-stack fa-lg mr-2">
							<i class="fas fa-circle fa-stack-2x text-body"></i>
							<i class="fas fa-chart-area fa-stack-1x fa-inverse"></i>
						</span>
						<div>
							View Results
						</div>
					</div>
				</a>
			</div>
		</div>

	</div><!-- #content -->

	<div class="loading text-center">
		<div class="fa-5x">
			<i class="fas fa-circle-notch fa-spin text-muted opacity-half"></i>
		</div>
	</div>

	<div id="results" class="text-center wrapper" style="display:none;"></div>

</div><!-- #primary -->

<?php get_footer();
