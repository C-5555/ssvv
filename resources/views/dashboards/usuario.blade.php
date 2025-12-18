@extends('layout')

@section ('content1')
- Usuario 
@endsection

@section('content')

<div class="container-fluid p-0 mt-4">
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
			<div class="col-12 text-end mt-3">
					<a href="{{ route('ssvv.edit', Crypt::encryptString(Auth::user()->empleado->id)) }}"
						class="btn btn-primary btn-lg">
						Editar Perfil
					</a>
            </div>
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
					<span class="fw-bold fs-6 text-gray-800">
						@if(Auth::check())
							{{ Auth::user()->empleado->nombre}}
							{{ Auth::user()->empleado->apellido_paterno}}
							{{ Auth::user()->empleado->apellido_materno}}					
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">Nombre de Usuario</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->name}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">Área</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->empleado->id_area}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">Puesto</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->empleado->puesto}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">Fecha de ingreso</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->empleado->fecha_ingreso}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">Email</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->empleado->email}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
			<!--begin::Input group-->
			<div class="row mb-7">
				<!--begin::Label-->
				<label class="col-lg-4 fw-semibold text-muted">RFC</label>
				<!--end::Label-->
				<!--begin::Col-->
				<div class="col-lg-8 fv-row">
					<span class="fw-semibold text-gray-800 fs-6">
						@if(Auth::check())
							{{ Auth::user()->rfc}}			
						@endif
					</span>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Input group-->
		</div>
		<!--end::Card body-->
	</div>
	<!--end::details View-->
</dv>
@section('scripts')
<script src="{{ url ('assets/js/custom/utilities/products.js') }}"></script>
@endsection

@endsection