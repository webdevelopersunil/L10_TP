<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Picture') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.picture') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div class="full-panel">
            <span class="inner-circle circle">
                @if($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                @else
                    <!-- Default profile picture placeholder -->
                    <img src="{{ asset('storage/default_profile_picture.jpg') }}" alt="Default Profile Picture">
                @endif
            </span>
        </div>

        <div>
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
