@extends('layout2')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
	<!--begin::Content wrapper-->
	<div class="d-flex flex-column flex-column-fluid">
		<!--begin::Toolbar-->
		<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
			<!--begin::Toolbar container-->
			<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
				<!--begin::Page title-->
				<!--begin::details View-->
				<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
					<!--begin::Card header-->
					<div class="card-header cursor-pointer">
						<!--begin::Card title-->
						<div class="card-title m-0">
							<h3 class="fw-bold m-0">Detalles de perfil</h3>
						</div>
						<!--end::Card title-->
						<!--begin::Action-->
						<a href="ssvv/editar" class="btn btn-primary align-self-center">Editar Perfil</a>
						<!--end::Action-->
					</div>
					<!--begin::Card header-->
					<!--begin::Card body-->
					<div class="card-body p-9">
						<!--begin::Row-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Nombre completo</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">Max Smith</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Company</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
								<span class="fw-semibold text-gray-800 fs-6">Keenthemes</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Contact Phone
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
									title="Phone number must be active"></i></label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 d-flex align-items-center">
								<span class="fw-bold fs-6 text-gray-800 me-2">044 3276 454 935</span>
								<span class="badge badge-success">Verified</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Company Site</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">keenthemes.com</a>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Country
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
									title="Country of origination"></i></label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">Germany</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Communication</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8">
								<span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="row mb-10">
							<!--begin::Label-->
							<label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
							<!--begin::Label-->
							<!--begin::Label-->
							<div class="col-lg-8">
								<span class="fw-semibold fs-6 text-gray-800">Yes</span>
							</div>
							<!--begin::Label-->
						</div>
						<!--end::Input group-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::details View-->
			</div>
		</div>		
	</div>
</div>
<script src="{{ url ('assets/js/custom/utilities/products.js') }}"></script>
<script src="{{ url ('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ url ('assets/js/custom/widgets.js') }}"></script>

@endsection