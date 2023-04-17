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
        <p>This is the transaction activity that you have done.</p>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Transcation Type</th>
                        <th>Amount</th>
                        <th>Receiver Account Number</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($transactions as $index => $transcation)
                        <tr>
                            <th>{{ $transactions->firstItem() + $index }}</th>
                            <td>{{ $transcation->transaction_type }}</td>
                            <td>{{ 'Rp ' . number_format($transcation->amount, 0, ',', '.') }}</td>
                            <td>{!! $transcation->receiver_account_number == $transcation->user->account->account_number
                                ? '<b>' . $transcation->receiver_account_number . '</b>'
                                : $transcation->receiver_account_number !!}
                            </td>
                            <td>{{ $transcation->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Empty!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="flex justify-center my-10">
                {{ $transactions->links('include.pagination') }}
            </div>
        </div>
    </div>
    <!-- Tambahkan konten lainnya untuk halaman Home -->
@endsection
