<style>
    /* Circles Container */
.full-panel{
  display: flex;
  flex-wrap: wrap;
}

/* Circle Settings */
.circle {
  position: relative;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}
.outer-circle {
  width: 100px;
  height: 100px;
  background: rgba(0, 0, 0, 0.1);
  box-shadow: 0px 3px 4px rgb(77, 77, 77, 0.46);
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 15px;
}
.inner-circle {
  width: 85px;
  height: 85px;
  border: 3px solid #fff;
  box-shadow: 0px 0px 3px 2px #dddada inset;
  z-index: 1;
  overflow: hidden;
}

/* End of Circle-1 Animation Settings */



/* End of Circle Settings */

</style>

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
