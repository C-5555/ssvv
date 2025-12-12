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
	<link rel="stylesheet" href="{{ url('assets/css/dataTables.css') }}" />
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
	<script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "dark"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }
		</script>
	
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
   							@csrf	
							<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Iniciar Sesión</h1>
									<!--end::Title-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" maxlength= "13" placeholder="RFC" name="rfc" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<a href="{{ url('ssvv/reset') }}" class="link-primary">¿Reestablecer contraseña?</a>
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Iniciar Sesión</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Por favor espere...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<div class="text-gray-500 text-center fw-semibold fs-6">Crear usuario
								<a href="{{ url('ssvv/registro') }}" class="link-primary">Registrarse</a></div>
								<!--end::Sign up-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
				</div>
				<!--end::Body-->
            </div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
<!--begin::Javascript-->    
<script type="text/javascript">
	var url = '{{ url("/") }}'
</script>	
<!--<script> var hostUrl = '{{-- hostUrl("assets/") --}}' </script>-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ url('assets/plugins/global/plugins.bundle.js') }}"></script>

<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<script src="{{ url('https://cdn.amcharts.com/lib/5/index.js') }}"></script>
<script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.datatables.net/2.3.4/js/dataTables.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this page)-->
<script src="{{ url('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ url ('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ url ('assets/js/custom/widgets.js') }} "></script>
<script src="{{ url ('assets/js/custom/utilities/modals/create-app.js') }} "></script>
<script src="{{ url ('assets/js/custom/utilities/modals/new-target.js') }} "></script>
<script src="{{ url ('assets/js/custom/utilities/modals/users-search.js') }} "></script>
<script src="{{ url ('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js') }}"></script>
<script src="{{ url ('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/localization/messages_es.min.js') }}"></script>
<script src="{{ url ('https://cdn.jsdelivr.net/npm/sweetalert2@11' ) }}"></script>

<script>
    const loginUrl = "{{ route('login.process') }}";
    const csrfToken = "{{ csrf_token() }}";
</script>

<script src="{{ url('assets/js/usuarios/login.js') }}"></script>


<!--end::Custom Javascript-->
	</body>
	<!--end::Body-->
</html>