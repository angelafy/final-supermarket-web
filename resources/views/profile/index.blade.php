@extends('layouts.app')
@section('content')
    {{-- gawe auth check --}}
    @if (Auth::check())
        <div class="page">
            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <h2 class="page-title">
                                    Account Settings
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-3 d-none d-md-block border-end">
                                    <div class="card-body">
                                        <h4 class="subheader">Business settings</h4>
                                        <div class="list-group list-group-transparent">
                                            <a href="./settings.html"
                                                class="list-group-item list-group-item-action d-flex align-items-center active">My
                                                Account</a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action d-flex align-items-center">My
                                                Notifications</a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Connected
                                                Apps</a>
                                            <a href="./settings-plan.html"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Plans</a>
                                            <a href="#"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Billing
                                                & Invoices</a>
                                        </div>
                                        <h4 class="subheader mt-4">Experience</h4>
                                        <div class="list-group list-group-transparent">
                                            <a href="#" class="list-group-item list-group-item-action">Give
                                                Feedback</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column">
                                    <div class="card-body">
                                        <h2 class="mb-4">My Account</h2>
                                        <h3 class="card-title">Profile Details</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="avatar avatar-xl"
                                                    style="background-image: url('{{ asset('storage/' . (Auth::user()->gambar_profile ? Auth::user()->gambar_profile : '')) }}')"></span>
                                            </div>
                                            <div class="col-auto">
                                                <form action="{{ route('profile.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-auto">
                                                        <label for="avatar" class="btn">
                                                            Upload Avatar
                                                            <input id="avatar" type="file" name="avatar" style="display: none;" onchange="this.form.submit()" accept="image/*">
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="col-auto">
                                                <form action="{{ route('profile.deleteAvatar') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-ghost-danger"
                                                        onclick="return confirm('Are you sure you want to delete your avatar?')">
                                                        Delete avatar
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                        <h3 class="card-title mt-4">Edit Profile</h3>
                                        <div class="row g-3">
                                            <div class="col-md">
                                                <div class="form-label">Nama</div>
                                                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="col-md">
                                                <div class="form-label">Tanggal Pembuatan</div>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->created_at }}" disabled>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-label">Location</div>
                                                <input type="text" class="form-control" value="Peimei, China">
                                            </div>
                                        </div>
                                        <h3 class="card-title mt-4">Email</h3>
                                        <p class="card-subtitle">This contact will be shown to others publicly, so choose it
                                            carefully.</p>

                                        {{-- auth check mas --}}

                                        <div class="row g-2">
                                            <div class="col-auto">
                                                <input type="text" class="form-control w-auto"
                                                    value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="btn">Change</a>
                                            </div>
                                        </div>

                                        <h3 class="card-title mt-4">Password</h3>
                                        <p class="card-subtitle">You can set a permanent password if you don't want to use
                                            temporary login codes.</p>
                                        <div>
                                            <a href="#" class="btn">
                                                Set new password
                                            </a>
                                        </div>
                                        <h3 class="card-title mt-4">Public profile</h3>
                                        <p class="card-subtitle">Making your profile public means that anyone on the Dashkit
                                            network will be able to find
                                            you.</p>
                                        <div>
                                            <label class="form-check form-switch form-switch-lg">
                                                <input class="form-check-input" type="checkbox">
                                                <span class="form-check-label form-check-label-on">You're currently
                                                    visible</span>
                                                <span class="form-check-label form-check-label-off">You're
                                                    currently invisible</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent mt-auto">
                                        <div class="btn-list justify-content-end">
                                            <a href="#" class="btn">
                                                Cancel
                                            </a>
                                            <a href="#" class="btn btn-primary">
                                                Submit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

<script>
    // gawe reset form
    function simpanForm() {
        console.log("Simpan Form Successs ");

        // sweet alert notif reset
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 13000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: 'Berhasil Update Barang'
        });
    };
</script>