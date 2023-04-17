@extends('layouts.app')

@section('title', $page)

@section('content')

    <div class="prose w-full max-w-full flex-grow">
        <h1>{{ $page }}</h1>
        <div class="text-sm breadcrumbs py-0">
            <ul class="my-0 pl-0">
                {{-- <li><a>{{ $page }}</a></li> --}}
                {{-- <li><a>{{ $page }}</a></li> --}}
                <li>{{ $page }}</li>
            </ul>
        </div>
        <div class="divider"></div>
        <p>Hi! <b>{{ $user->account->fullname }}</b> welcome to eMoney, please try to make a transaction.</p>
        <div class="stats border-base-300 border-2 w-full mb-10">

            <div class="stat">
                <div class="stat-figure text-primary">
                    <i class="fa-solid fa-wallet fa-xl"></i>
                </div>
                <div class="stat-title">Balance</div>
                <div class="stat-value">{{ 'Rp ' . number_format($user->account->balance, 0, ',', '.') }}</div>
                <div class="stat-desc my-5"></div>
            </div>

            <div class="stat">
                <div class="stat-figure text-primary">
                    <i class="fa-solid fa-money-bills fa-xl"></i>
                </div>
                <div class="stat-title">Limit Transfer</div>
                <div class="stat-value">{{ 'Rp ' . number_format($user->account->transfer_limit, 0, ',', '.') }}</div>
                <div class="stat-desc my-5"></div>
            </div>

            <div class="stat">
                <div class="stat-figure text-primary">
                    <i class="fa-solid fa-piggy-bank fa-xl"></i>
                </div>
                <div class="stat-title">Limit Top Up</div>
                <div class="stat-value">{{ 'Rp ' . number_format($user->account->top_up_limit, 0, ',', '.') }}</div>
                <div class="stat-desc my-5"></div>
            </div>

        </div>
        <div class="hero min-h-12 bg-base-200 py-5">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <p class="py-6">Below is your account number, provide this number to receive transfers from other
                        accounts.</p>
                    <h1 class="text-5xl font-bold">{{ $user->account->account_number }}</h1>
                    @if ($user->account->balance <= 0)
                        <p class="py-6">The balance of this account number is still {{ $user->account->balance }}, please
                            top up the balance first!.
                        </p>
                        <a href="{{ route('topup.form') }}" class="btn btn-primary">Top Up</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan konten lainnya untuk halaman Home -->
@endsection
