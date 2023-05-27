@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                        <h3>Username: {{ $user->username }}</h3>
                        <p><strong>Bio:</strong> {{ $user->profile->bio }}</p>
                        <p><strong>Personal Interests:</strong> {{ $user->profile->personal_interests }}</p>
                        <p><strong>Contact Number:</strong> {{ $user->profile->contact_number }}</p>
                        <p><strong>Profile Picture:</strong> <img src="{{ asset('storage/' . $user->profile->profile_picture) }}" alt="Profile Picture" class="img-fluid" width="100"></p>

                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
