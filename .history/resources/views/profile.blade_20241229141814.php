@extends('layouts.try')
@section('hom-body')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="profile-card">
                <div class="profile-header text-center p-4">
                    <div class="profile-pic-wrapper mb-3">
                        <div class="profile-pic">
                            <i class="bi bi-person-circle text-primary"></i>
                        </div>
                    </div>
                    <h2 class="fw-bold text-primary  mb-2">{{ $profile->user->name }}</h2>                   
                </div>
                <div class="profile-content p-4">
                    <div class="profile-section mb-4">
                        <h3 class="section-title">User Information</h3>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-envelope-heart"></i>
                            </div>
                            <div class="info-content">
                                <label>Email</label>
                                <p>{{ $profile->user->email }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-house-heart"></i>
                            </div>
                            <div class="info-content">
                                <label>Address</label>
                                <p>{{ $profile->address }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-calendar-heart"></i>
                            </div>
                            <div class="info-content">
                                <label>Birthday</label>
                                <p>{{ \Carbon\Carbon::parse($profile->date_of_birth)->format('F j, Y') }}</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="bi bi-telephone-heart"></i>
                            </div>
                            <div class="info-content">
                                <label>Phone</label>
                                <p>{{ $profile->contact_number }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button class="edit-profile-btn">
                            <i class="bi bi-pencil-square me-2"></i>
                            Update Your Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .profile-card {
        background: #f8fafc;
        border-radius: 20px;
        box-shadow: 0 8px 30px gray;
    }

   
    .profile-header {
        background: white;
    }

    .profile-pic-wrapper {
        width: 130px;
        height: 130px;
        margin: 0 auto;
        background: white;
        border-radius: 50%;
        padding: 8px;
        box-shadow: 0 4px 15px gray;
    }

    .profile-pic {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-pic i {
        font-size: 3.5rem;
    }

    .section-title {    
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 3px solid #f1f4f9;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: #3498db;
      
    }

    .info-icon {
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: #5c6ac4;
    }

    .info-content {
        flex: 1;
    }

    .info-content label {
        display: block;
        color: #64748b;
        font-size: 0.9rem;
        margin-bottom: 0.2rem;
    }

    .info-content p {
        color: #1e293b;
        font-size: 1.1rem;
        margin: 0;
    }

    .edit-profile-btn {
        background: #5c6ac4;
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 25px;
        font-size: 1rem;
        
       
    }

    
</style>
@endsection