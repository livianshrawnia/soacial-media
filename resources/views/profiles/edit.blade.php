@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea class="form-control" name="bio" id="bio" rows="3">{{ $user->profile->bio }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="personal_interests">Personal Interests</label>
                                <input type="text" class="form-control" name="personal_interests" id="personal_interests" value="{{ $user->profile->personal_interests }}">
                            </div>

                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="number" class="form-control" name="contact_number" id="contact_number" value="{{ $user->profile->contact_number }}">
                            </div>

                            <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" class="form-control-file" name="profile_picture" id="profile_picture">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
