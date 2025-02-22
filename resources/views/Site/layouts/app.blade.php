<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	@include('Site.partials.assets.css')
</head>

<body>
	<!-- Navbar -->

	@include('Site.partials.header')


	<main>

		@yield('contents')
	</main>

	@include('Site.partials.footer')

	<!--Whats App -->
	<img src="{{ asset('Site/assets/images/social/whatsapp.png')}}" alt="WhatsApp" class="whatsapp-icon" onclick="showModal()">

	<!-- Modal whatsapp -->
	<div class="modal" id="whatsapp-modal">
		<div class="modal-contents">
			<span class="close" onclick="closeModal()">×</span>
			<h3>Find Us on WeChat</h3>
			<img src="{{ asset('Site/assets/images/social/qr.png')}}" alt="QR Code" class="qr-code">
		</div>
	</div>

	<!-- Modal Volumetric -->
	<div class="modal" id="Volumetric-weight-modal">
		<div class="modal-contents">
			<span class="close" onclick="closeVolumetricModal()">×</span>
			<h3 class="modal-title">Volumetric weight Value</h3>
			<h3 class="modal-value">0.000600</h3>
			<img src="{{ asset('Site/assets/images/Volumetric.png')}}" alt="Volumetric" class="Volumetric-img">
		</div>
	</div>

	<!-- Modal CMB Value -->
	<div class="modal" id="CMB-modal">
		<div class="modal-contents">
			<span class="close" onclick="closeCMBModal()">×</span>
			<h3 class="modal-title">CMB weight Value</h3>
			<h3 class="modal-value">79200.000000</h3>
			<img src="{{ asset('Site/assets/images/CMB.png')}}" alt="CMB" class="CMB-img">
		</div>
	</div>
	<!-- --------------- -->

	<!-- Modal Track Shipment -->
	<div class="modal" id="TrackShipment-modal">
		<div class="modal-contents">
			<span class="close" onclick="closeTrackShipmentModal()">×</span>

			<!-- Header Box -->
			<div class="modal-header">
				<h3 class="modal-title">Track Shipment</h3>
				<h3 class="modal-value">CSS27588675</h3>
				<h3 class="modal-subtitle">CN - SA - Riyadh</h3>
			</div>

			<!-- Tracking Timeline -->
			<div class="tracking-container">
				<div class="tracking-line"></div>

				<!-- Tracking Steps -->
				<div class="tracking-step active">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">Shipment Info</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

				<div class="tracking-step active">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">Foshan warehouse</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

				<div class="tracking-step active">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">GUANGZHOU</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

				<div class="tracking-step">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">CN</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

				<div class="tracking-step active">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">Riyadh</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

				<div class="tracking-step active">
					<div class="tracking-circle"></div>
					<div class="tracking-info">
						<h4 class="tracking-title">Riyadh</h4>
						<p class="tracking-time">2024 - 12 - 20, 16:35:23</p>
						<p class="tracking-status">Shipment Information Received</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="overlay" id="overlay"></div>


	@include('Site.partials.assets.js')
</body>

</html>