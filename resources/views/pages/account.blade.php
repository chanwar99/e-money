@extends('layouts.app')

@section('title', $page)

@section('content')
    <div class="prose w-full max-w-full flex-grow">
        <h1>{{ $page }}</h1>
        <div class="text-sm breadcrumbs py-0">
            <ul>
                {{-- <li><a>{{ $page }}</a></li> --}}
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>{{ $page }}</li>
            </ul>
        </div>
        <div class="divider"></div>
        @if (session('update_success'))
            <div class="alert alert-success shadow-lg">
                <div>
                    <i class="fa-solid fa-square-check fa-xl"></i>
                    <span>{{ session('update_success') }}</span>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('account.update') }}">
            @csrf
            @method('PUT')
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="text" readonly class="input input-ghost input-bordered" value="{{ $user->username }}" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="text" readonly class="input input-ghost input-bordered" value="{{ $user->email }}" />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Fullname</span>
                </label>
                <input type="text" placeholder="Fullname" name="fullname" class="input input-bordered"
                    value="{{ $user->account->fullname ?? old($user->account->fullname) }}" />
                @error('fullname')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Address</span>
                </label>
                <input type="text" placeholder="Address" name="address" class="input input-bordered"
                    value="{{ $user->account->address ?? old($user->account->address) }}" />
                @error('address')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Phone Number</span>
                </label>
                <input type="text" placeholder="Phone Number" name="phone_number" class="input input-bordered"
                    value="{{ $user->account->phone_number ?? old($user->account->phone_number) }}" />
                @error('phone_number')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Pin Number</span>
                </label>
                <label class="input-group">
                    <input type="password" placeholder="Pin Number" id="pinNumber" name="pin_number"
                        class="input input-bordered w-full" value="{{ $user->account->pin_number }}" />
                    <span class="label-text"><input type="checkbox" id="showPinNumber" class="toggle" /></span>
                </label>

                @error('pin_number')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

    @push('custom-scripts')
        <script type="text/javascript">
            var pinNumber = document.getElementById('pinNumber');
            var showPinNumber = document.getElementById('showPinNumber');

            showPinNumber.addEventListener('change', function() {
                if (this.checked) {
                    pinNumber.setAttribute('type', 'text');
                } else {
                    pinNumber.setAttribute('type', 'password');
                }
            });
        </script>
    @endpush
@endsection
