<div class="navigation col-span-12   lg:col-span-4 flex flex-col justify-center items-center gap-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 size-full">
        <a href="{{ route('dashboard') }}"
            class="ajax-link text-lg w-3/4 flex justify-start gap-3 items-center rounded-lg  px-3 py-5">
            <img src="{{ asset('assets/dist/img/icons/home1.svg') }}" alt="" srcset="">
            Dashboard
        </a>
        <a href="{{ route('order.list') }}"
            class="ajax-link text-lg w-3/4 flex justify-start gap-3 items-center rounded-lg  px-3 py-5">
            <img src="{{ asset('assets/dist/img/icons/order.svg') }}" alt="" srcset="">
            Order
        </a>
        <a href="{{ route('account.Form') }}"
            class="ajax-link text-lg w-3/4 flex justify-start gap-3 items-center rounded-lg  px-3 py-5">
            <img src="{{ asset('assets/dist/img/icons/profile1.svg') }}" alt="" srcset="">
            Account Details
        </a>
        <a href="{{ route('reset.password') }}"
            class="ajax-link text-lg w-3/4 flex justify-start gap-3 items-center rounded-lg  px-3 py-5">
            <img src="{{ asset('assets/dist/img/icons/sett.svg') }}" alt="" srcset="">
            Change Password
        </a>
        <div href="" class="ajax-link text-lg w-3/4 flex justify-start gap-3 items-center rounded-lg  px-3 py-5">
            <img src="{{ asset('assets/dist/img/icons/logout.svg') }}" alt="" srcset="">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>

</div>
