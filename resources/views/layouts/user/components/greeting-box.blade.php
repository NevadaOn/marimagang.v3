<!-- Grettings Box Start -->
<div class="grettings-box position-relative rounded-16 bg-main-600 overflow-hidden gap-16 flex-wrap z-1">
    <img src="dashboard/images/bg/grettings-pattern.png" alt=""
        class="position-absolute inset-block-start-0 inset-inline-start-0 z-n1 w-100 h-100 opacity-6">
    <div class="row gy-4">
        <div class="col-sm-7">
            <div class="grettings-box__content py-xl-4">
                <h2 class="text-white mb-0">Halo, {{ auth()->user()->nama }}! </h2>
                <p class="text-15 fw-light mt-4 text-white">Mari kembangkan dirimu lewat pengalaman nyata</p>
                <p class="text-lg fw-light mt-24 text-white">Atur tujuan kariermu dan belajar dari pengalaman langsung,
                    Bersama Diskominfo</p>
            </div>
        </div>
        <div class="col-sm-5 d-sm-block d-none">
            <div class="text-center h-100 d-flex justify-content-center align-items-end ">
                @if (auth()->user()->foto)
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil"
                        style="width: 365px; height: 267px; object-fit: cover; border-radius: 8px;">
                @else
                    {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Grettings Box End -->