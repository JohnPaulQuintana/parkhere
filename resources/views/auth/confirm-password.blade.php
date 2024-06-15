<x-guest-layout>
    

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="font-bold text-violet-500 text-4xl flex flex-col items-center bg-slate-100 p-2 rounded-md mb-4">
            <span><i class="fa-sharp fa-solid fa-square-parking tracking-wider"></i>arkHere</span>
            <p class="text-sm text-slate-700">Real-Time Parking Availability and Reservation System</p>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
