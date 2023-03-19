    <form method="POST" action="{{ route('deposit.update') }}">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="Amount" :value="__('Deposit Amount')" />
            <x-text-input id="amount" class="block mt-1 w-small" type="text" name="amount" :value="old('amount')" required autofocus autocomplete="amount" />
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
        </div>
        

        <div class="flex mt-4">
            <x-primary-button class="ml-4">
                {{ __('Deposit') }}
            </x-primary-button>
        </div>
    </form>