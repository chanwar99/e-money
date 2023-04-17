@extends('layouts.auth')

@section('title', $page)

@section('content')
    <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="py-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem quo doloremque veniam suscipit
            adipisci rerum et qui reiciendis quisquam eos asperiores iure, nihil quod laborum odio perspiciatis alias
            perferendis delectus.</p>
    </div>
    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Username" name="username" class="input input-bordered" />
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
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Login</button>
                    <label class="label">
                        <a href="{{ route('register.form') }}" class="label-text-alt link link-hover">
                            Dont have account?
                        </a>
                    </label>
                </div>
            </form>
        </div>
    </div>
@endsection
