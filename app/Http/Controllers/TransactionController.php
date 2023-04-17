<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function transferForm()
    {
        $page = "Transfer";
        $user = User::with('account')->find(auth()->id());
        return view('pages.transfer', compact('user', 'page'));
    }
    public function transfer(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:5000',
            'receiver_account_number' => 'required|numeric|digits:10',
            'pin_number' => 'required|numeric|digits:6',
        ]);

        $user = User::with('account')->find(auth()->id());

        $receiver_account_number = $request->input('receiver_account_number');
        $amount = $request->input('amount');
        $pin_number = $request->input('pin_number');

        //cek tidak bisa transfer ke saldo sendiri
        if ($user->account->account_number == $receiver_account_number) {
            return redirect()->back()->with('transfer_failed', 'You cannot transfer to your own account');
        }

        $account = Account::find($receiver_account_number);

        // jika tidak ada akun penerima
        if (!$account) {
            return redirect()->back()->with('transfer_failed', 'The receiver account number was invalid!')->withInput(compact('receiver_account_number', 'amount'));
        }

        // pin number salah
        if ($user->account->pin_number != $pin_number) {
            return redirect()->back()->with('transfer_failed', 'Your pin number is invalid')->withInput(compact('receiver_account_number', 'amount'));
        }

        $difference = $user->account->balance - $amount;

        // saldo habis
        if ($difference < 0) {
            return redirect()->back()->with('transfer_failed', 'Your balance is not enough!')->withInput(compact('receiver_account_number', 'amount'));
        }

        // limit sudah habis
        if ($user->account->transfer_limit < $amount) {
            return redirect()->back()->with('transfer_failed', 'You have reached the transfer limit!')->withInput(compact('receiver_account_number', 'amount'));
        }

        // akun si pengirim
        $user->account->transfer_limit -= $amount;
        $user->account->balance -= $amount;
        $user->account->save();

        // akun si penerima
        $account->balance += $amount;
        $account->save();

        // buat histori transaksi
        $transaction = new Transaction;
        $transaction->transaction_type = 'Transfer';
        $transaction->amount = $amount;
        $transaction->user_id = $user->id;
        $transaction->receiver_account_number = $receiver_account_number;
        $transaction->save();

        return redirect()->back()->with('transfer_success', 'Transfer to ' . $receiver_account_number . ' was completed!');

    }

    public function topupForm()
    {
        $page = "Top Up";
        $user = User::with('account')->find(auth()->id());
        return view('pages.topup', compact('user', 'page'));
    }

    public function topup(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:5000',
            'pin_number' => 'required|numeric|digits:6',
        ]);

        $user = User::with('account')->find(auth()->id());

        $amount = $request->input('amount');
        $pin_number = $request->input('pin_number');


        // jika tidak ada akun
        if (!$user->account) {
            return redirect()->back()->with('topup_failed', 'The Account number was invalid!')->withInput(compact('amount'));
        }

        // pin number salah
        if ($user->account->pin_number != $pin_number) {
            return redirect()->back()->with('topup_failed', 'Your pin number is invalid')->withInput(compact('amount'));
        }

        // limit sudah habis
        if ($user->account->top_up_limit < $amount) {
            return redirect()->back()->with('topup_failed', 'You have reached the topup limit!')->withInput(compact('amount'));
        }

        // akun saya
        $user->account->top_up_limit -= $amount;
        $user->account->balance += $amount;
        $user->account->save();

        // buat histori transaksi
        $transaction = new Transaction;
        $transaction->transaction_type = 'Top Up';
        $transaction->amount = $amount;
        $transaction->receiver_account_number = $user->account->account_number;
        $transaction->user_id = $user->id;
        $transaction->save();

        return redirect()->back()->with('topup_success', 'Top Up to ' . $user->account->account_number . ' was completed!');
    }

    public function historyShow()
    {
        $page = "History";
        $user = User::with('account')->find(auth()->id());
        $transactions = Transaction::with('user')->where('user_id', $user->id)->paginate(10);
        return view('pages.history', compact('user', 'transactions', 'page'));
    }
}

?>