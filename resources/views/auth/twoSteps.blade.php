<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
	<title>Ssvv</title>
	<meta charset="utf-8" />
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="{{ url('https://keenthemes.com/metronic') }}" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="{{ url('https://preview.keenthemes.com/metronic8') }}" />
	<link rel="icon" type="image/x-icon" href="{{ url('assets/media/logos/favicon.ico') }}" />
	<link rel="stylesheet" href="{{ url('https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css') }}" />
	 
	<!--begin::Fonts-->
	<link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700') }}" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used by this page)-->
	<!--end::Vendor Stylesheets-->
	
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<link rel="stylesheet" href="{{ url('assets/css/styles.css') }}" />
	</head>
	<!--end::Head-->
    <!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">   
        <script>var defaultThemeMode = "dark"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }
        </script>             
        <!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Two-steps -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100 mb-13" novalidate="novalidate" data-kt-redirect-url="../../demo1/dist/index.html" id="kt_sing_in_two_steps_form">
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Two Step Verification</h1>
									<!--end::Title-->
									<!--begin::Sub-title-->
									<div class="text-muted fw-semibold fs-5 mb-5">Enter the verification code we sent to</div>
									<!--end::Sub-title-->
									<!--begin::Mobile no-->
									<div class="fw-bold text-dark fs-3">@yield('telefono')</div>
									<!--end::Mobile no-->
								</div>
								<!--end::Heading-->
								<!--begin::Section-->
								<div class="mb-10">
									<!--begin::Label-->
									<div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
									<!--end::Label-->
									<!--begin::Input group-->
									<div class="d-flex flex-wrap flex-stack">
										<input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
										<input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" />
									</div>
									<!--begin::Input group-->
								</div>
								<!--end::Section-->
								<!--begin::Submit-->
								<div class="d-flex flex-center">
									<button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bold">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Submit-->
							</form>
							<!--end::Form-->
							<!--begin::Notice-->
							<div class="text-center fw-semibold fs-5">
								<span class="text-muted me-1">No obtuviste el correo?</span>
								<a href="#" class="link-primary fs-5 me-1">Resend</a>
							</div>
							<!--end::Notice-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
					<!--begin::Footer-->
					<footer class="footer">
						<div class="container-fluid">
							<div class="row text-muted">
								<div class="col-6 text-start">
									<p class="mb-0">
										<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>SAF</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Secretaria de Administración y Finanzas</strong></a>
									</p>
								</div>
								<div class="col-6 text-end">
									<ul class="list-inline">
										<li class="list-inline-item">
											<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
										</li>
										<li class="list-inline-item">
											<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
										</li>
										<li class="list-inline-item">
											<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
										</li>
										<li class="list-inline-item">
											<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
					<!--end::Footer-->
				</div>
				<!--end::Body-->				
			</div>
			<!--end::Authentication - Two-steps-->
		</div>
		<!--end::Root-->
    </body>
	<!--end::Body-->
</html>