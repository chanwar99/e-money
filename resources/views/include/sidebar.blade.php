<aside class="bg-base-200 w-80">
    <div class="z-20 bg-base-200 bg-opacity-90 backdrop-blur sticky top-0 items-center gap-2 px-4 py-2 hidden lg:flex ">
        <a href="/" aria-current="page" aria-label="Homepage" class="flex-0 btn btn-ghost px-2">
            <div class="font-title text-primary inline-flex text-lg transition-all duration-200 md:text-3xl">
                <span class="lowercase">e</span> <span class="text-base-content uppercase">MONEY</span>
            </div>
        </a>
    </div>
    <div class="h-4"></div>
    <ul class="menu menu-compact flex flex-col p-0 px-4">
        <li>
            <a href="{{ route('dashboard') }}" id="" class="flex gap-4">
                <span class="flex w-5">
                    <i class="fa-solid fa-tachometer-alt fa-xl"></i>
                </span>
                <span class="flex-1">Dashboard</span>
            </a>
        </li>
        <li></li>
        <li class="menu-title"><span>Transaction</span></li>
        <li>
            <a href="{{ route('transfer.form') }}" id="" class="flex gap-4">
                <span class="flex w-5">
                    <i class="fa-solid fa-money-bill-transfer fa-xl"></i>
                </span>
                <span class="flex-1">Transfer</span>
            </a>
        </li>
        <li>
            <a href="{{ route('topup.form') }}" id="" class="flex gap-4">
                <span class="flex w-5">
                    <i class="fa-solid fa-wallet fa-xl"></i>
                </span>
                <span class="flex-1">Top Up</span>
            </a>
        </li>
        <li>
            <a href="{{ route('history.show') }}" id="" class="flex gap-4">
                <span class="flex w-5">
                    <i class="fa-solid fa-clock-rotate-left fa-xl"></i>
                </span>
                <span class="flex-1">History</span>
            </a>
        </li>
    </ul>
</aside>
