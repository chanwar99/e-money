<div
    class="
            sticky top-0 z-30 flex h-16 w-full justify-center bg-opacity-90 backdrop-blur transition-all duration-100 
            bg-base-100 text-base-content
            ">
    <nav class="navbar bg-base-100 w-full">
        <div class="flex flex-1 md:gap-1 lg:gap-2">
            <label for="drawer" class="btn btn-square btn-ghost drawer-button lg:hidden">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block h-5 w-5 stroke-current md:h-6 md:w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>

            <div class="flex items-center lg:hidden">
                <a href="/" aria-current="page" aria-label="Homepage" class="flex-0 btn btn-ghost px-2 ">
                    <div class="font-title text-primary inline-flex text-lg transition-all duration-200 md:text-3xl">
                        <span class="lowercase text-primary">e</span>
                        <span class="uppercase text-base-content">MONEY</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex-0">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <i class="fa-solid fa-wallet fa-xl"></i>
                </label>
                <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="font-bold text-lg">{{ $user->account->account_number }}</span>
                        <span class="text-info">Balance:
                            {{ 'Rp ' . number_format($user->account->balance, 0, ',', '.') }}</span>
                        <span class="text-error">Limit Transfer:
                            {{ 'Rp ' . number_format($user->account->transfer_limit, 0, ',', '.') }}</span>
                        <span class="text-error">Limit Top Up:
                            {{ 'Rp ' . number_format($user->account->top_up_limit, 0, ',', '.') }}</span>
                        <div class="card-actions">
                            <a href="{{ route('topup.form') }}" class="btn btn-primary btn-block">Top Up</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <i class="fa-solid fa-user fa-xl"></i>
                </label>
                <ul tabindex="0"
                    class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52">
                    <li><a><b>{{ $user->username }}</b></a></li>
                    <li><a href="{{ route('account.show') }}">Account</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>

    </nav>
</div>
