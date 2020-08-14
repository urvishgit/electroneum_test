@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Edit profile
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="p-4" name="edit-profile" id="edit-profile" method="POST" enctype="multipart/form-data" action="{{ route('update-profile') }}">
                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif


                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ isset ($user) ? $user->name : old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ isset ($user) ? $user->email : old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="name">About*</label>
                        <textarea class="form-control" row="10" id="about" name="about" placeholder="About">{{ isset ($user) ? $user->about : old('about')}}</textarea>
                    </div>
                    @error('about')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="name">Address*</label>
                        <textarea class="form-control" row="10" id="address" name="address" placeholder="Address">{{ isset ($user) ? $user->address : old('address')}}</textarea>
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="email">Phone*</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ isset ($user) ? $user->phone : old('phone') }}">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="email">Mobile*</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="{{ isset ($user) ? $user->mobile : old('mobile') }}">
                    </div>
                    @error('mobile')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="text-left pt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
