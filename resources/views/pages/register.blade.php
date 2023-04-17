@extends('layouts.auth')

@section('title', $page)

@section('content')
    <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Register now!</h1>
        <p class="py-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem quo doloremque veniam suscipit
            adipisci rerum et qui reiciendis quisquam eos asperiores iure, nihil quod laborum odio perspiciatis alias
            perferendis delectus.</p>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Fullname</span>
                    </label>
                    <input type="text" placeholder="Fullname" name="fullname" class="input input-bordered"
                        value="{{ old('fullname') }}" />
                    @error('fullname')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email" name="email" class="input input-bordered"
                        value="{{ old('email') }}" />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" name="username" class="input input-bordered"
                        value="{{ old('username') }}" />
                    @error('username')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Password" name="password" class="input input-bordered" />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password Confirmation</span>
                    </label>
                    <input type="password" placeholder="Password" name="password_confirmation"
                        class="input input-bordered" />
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Register</button>
                    <label class="label">
                        <a href="{{ route('login.form') }}" class="label-text-alt link link-hover">
                            Have account?
                        </a>
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
