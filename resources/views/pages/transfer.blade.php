@extends('layouts.app')

@section('title', $page)

@section('content')

    <div class="prose w-full max-w-full flex-grow">
        <h1>{{ $page }}</h1>
        <div class="text-sm breadcrumbs py-0">
            <ul class="pl-0 my-0">
                {{-- <li><a>{{ $page }}</a></li> --}}
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>{{ $page }}</li>
            </ul>
        </div>
        <div class="divider"></div>
        <p>Please enter valid data.</p>
        @if ($user->account->pin_number)
            @if (session('transfer_failed'))
                <div class="alert alert-error shadow-lg">
                    <div>
                        <i class="fa-solid fa-triangle-exclamation fa-xl"></i>
                        <span>{{ session('transfer_failed') }}</span>
                    </div>
                </div>
            @endif
            @if (session('transfer_success'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <i class="fa-solid fa-square-check fa-xl"></i>
                        <span>{{ session('transfer_success') }}</span>
                    </div>
                </div>
            @endif
            @if (session('update_success'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <i class="fa-solid fa-square-check fa-xl"></i>
                        <span>{{ session('update_success') }}</span>
                    </div>
                </div>
            @endif
            <form method="POST" action="{{ route('transfer') }}">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Receiver Account Number</span>
                    </label>
                    <input type="text" placeholder="Receiver Account Number" name="receiver_account_number"
                        class="input input-bordered" value="{{ old('receiver_account_number') }}" />
                    @error('receiver_account_number')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Amount</span>
                    </label>
                    <label class="input-group">
                        <span>Rp.</span>
                        <input type="number" placeholder="Amount" name="amount" class="input input-bordered w-full"
                            value="{{ old('amount') }}" />
                    </label>
                    @error('amount')
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
                            class="input input-bordered w-full" />
                        <span class="label-text"><input type="checkbox" id="showPinNumber" class="toggle" /></span>
                    </label>
                    @error('pin_number')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control mt-6">
                    <button class="btn btn-primary" type="submit">Transfer</button>
                </div>
            </form>
        @else
            @include('include.pin_number')
        @endif
    </div>

    <!-- Tambahkan konten lainnya untuk halaman Home -->
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
