<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Detail') }}
        </h2><!-- CSS only -->
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- {{ __("You're logged in!") }} -->

                    <div class="container">
                        <div class="row">

                        <div style="margin:10px;">
                            <a class="btn btn-light border float-right" href="{{ route('users.index') }}">Go Back</a>
                        </div>

                        <div class="col-md-12">
                            <h6><u>Name</u> : &nbsp&nbsp <span>{{ ucfirst($user->name)}}</span></h6>
                            <br>
                            <h6><u>Email</u> : &nbsp&nbsp <span>{{ ucfirst($user->email)}}</span></h6>
                            <br>
                            <h6><u>Role</u> : &nbsp&nbsp <span>{{ ucfirst($user->email)}}</span></h6>
                            <br>
                            <h6><u>Joined At</u> : &nbsp&nbsp <span>{{ $user->created_at->format('d,F Y'); }}</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>