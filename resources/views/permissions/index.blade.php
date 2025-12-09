@extends('layout')
@section('content')
    <!-- Container -->
    <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
        <div class="flex flex-col justify-center gap-2">
            <h1 class="text-xl font-bold leading-none text-primary">
                Permisos
            </h1>
            <div class="flex items-center gap-2 text-sm font-normal text-gray-700">
                Visión general de permisos.
            </div>
        </div>
    </div>
    <!-- End of Container -->

    <!-- Container -->
    <div class="grid gap-5 lg:gap-4 grid grid-cols-1 xl:grid-cols-2">
        <!-- grid de las cards de permisos -->
        @foreach($activePermissions as $activePermissionGroupKey => $activePermissionGroupValue)
        <div class="card border-solid border-1 border-dark-clarity">
            <div class="card-header">
                <h3 class="card-title text-gray-700">
                Existen {{$activePermissionGroupValue->count()}} Permisos sobre:  
                <span class="text-primary">
                    {{$activePermissionGroupKey}}
                </span>
                </h3>
            </div>
            <div class="card-body grid grid-cols-1 xl:grid-cols-2 gap-5 py-5 lg:py-7.5">
                <!-- grid de los elementos dentro de los cards -->
                @foreach($activePermissionGroupValue as $activePermission)
                <div class="rounded-xl border p-4 flex items-center justify-between gap-2.5">
                    <div class="flex items-center gap-3.5">
                        <div class="relative size-[45px] shrink-0">
                            <svg class="w-full h-full stroke-gray-300 fill-gray-100" fill="none" height="48"
                               version="1.1"
                               id="Capa_1"
                               x="0px"
                               y="0px"
                               viewBox="0 0 105 117"
                               style="enable-background:new 0 0 105 117;"
                               xml:space="preserve"
                               sodipodi:docname="prueba.svg"
                               inkscape:version="1.2.2 (732a01da63, 2022-12-09)"
                               xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                               xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                               xmlns="http://www.w3.org/2000/svg"
                               xmlns:svg="http://www.w3.org/2000/svg"><defs
                               id="defs10" /><sodipodi:namedview
                               id="namedview8"
                               pagecolor="#ffffff"
                               bordercolor="#000000"
                               borderopacity="0.25"
                               inkscape:showpageshadow="2"
                               inkscape:pageopacity="0.0"
                               inkscape:pagecheckerboard="0"
                               inkscape:deskcolor="#d1d1d1"
                               showgrid="false"
                               inkscape:zoom="5.0101839"
                               inkscape:cx="32.533736"
                               inkscape:cy="64.269097"
                               inkscape:window-width="1920"
                               inkscape:window-height="1009"
                               inkscape:window-x="-8"
                               inkscape:window-y="-8"
                               inkscape:window-maximized="1"
                               inkscape:current-layer="layer1" />
                            <style
                               type="text/css"
                               id="style2">
                                .st0{fill:none;stroke:#9F2241;stroke-width:4;stroke-miterlimit:10;stroke-dasharray:12,6,12,6,12,6;}
                            </style>
                            <g
                               id="XMLID_69573_">
                                <path
                               id="XMLID_69583_"
                               class="st0"
                               d="m 52.479626,106.72747 v 0 c 12.88402,0 25.164104,-5.03282 34.223181,-14.293214 9.059077,-9.26039 14.293213,-21.339161 14.091903,-34.223181 0,-26.774607 -21.741791,-48.31508 -48.516397,-48.31508 -12.884022,0 -25.164104,5.032821 -34.223183,14.293211 C 8.9960531,33.449597 3.7619205,45.528366 3.7619205,58.412387 3.963233,85.186994 25.705019,106.72747 52.479626,106.72747 Z"
                               style="display:inline;fill:none;fill-opacity:1;stroke-linejoin:miter;stroke-linecap:butt;stroke-dasharray:none" />
                                
                            </g><g
                               inkscape:groupmode="layer"
                               id="layer1"
                               inkscape:label="Layer 1" />
                            </svg>
                            <div class="absolute leading-none left-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 ">
                                <img src="{{ asset('assets/media/Icons/FN-M-ICONO-PERMISOS.png')}}">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="flex items-center gap-1.5 leading-none font-medium text-sm text-gray-900">
                                {{$activePermission->name}}
                            </span>
                            <span class="text-2sm text-gray-700">
                                {{$activePermission->detail->long_description}}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
        @endforeach
    </div>
    <!-- End of Container -->
@endsection
