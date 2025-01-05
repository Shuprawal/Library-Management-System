@extends('layouts.try')
@section('hom-body')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="profile-avatar mb-3">
                            <i class="bi bi-person-circle" style=" color: #4a5568;"></i>
                        </div>
                        <h2 class="card-title font-weight-bold mb-3">{{ $profile->user->name }}</h2>
                    </div>

                    <div class="profile-info">
                        <div class="info-group mb-3 p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label class="text-muted mb-0">
                                        <i class="bi bi-envelope me-2"></i>Email
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <p class="mb-0">{{ $profile->user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-group mb-3 p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label class="text-muted mb-0">
                                        <i class="bi bi-geo-alt me-2"></i>Address
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <p class="mb-0">{{ $profile->address }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-group mb-3 p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label class="text-muted mb-0">
                                        <i class="bi bi-calendar me-2"></i>Date of Birth
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <p class="mb-0">{{ $profile->date_of_birth }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-group mb-3 p-3">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <label class="text-muted mb-0">
                                        <i class="bi bi-telephone me-2"></i>Contact Number
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <p class="mb-0">{{ $profile->contact_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">
                            <i class="bi bi-pencil-square me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        border: none;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        border-radius: 50%;
    }
    
    .info-group {
        transition: background-color 0.3s;
    }
    
    .info-group:hover {
        background-color: #f8f9fa;
    }
    
    .btn-primary {
        padding: 10px 30px;
        border-radius: 25px;
    }
</style>
@endsection