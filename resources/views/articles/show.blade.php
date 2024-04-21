<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article View') }}
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
                            <a class="btn btn-light border float-right" href="{{ route('articles.index') }}">Go Back</a>
                        </div>

                        <div class="col-md-12">
                            <h6><u>Title</u> : &nbsp&nbsp <span>{{ ucfirst($article->title)}}</span></h6>
                            <br>
                            <h6><u>Description</u> : &nbsp&nbsp <span>{{ ucfirst($article->description)}}</span></h6>
                        </div>

                        <div class="text-center mt-5 font-weight-bold" style="font-size: 20px; margin-bottom:30px;">
                            <h3>Admin Detail View</h3>
                        </div>


                        <div class="col-md-12">
                            <h6><u>Article Creator Name</u> : &nbsp&nbsp <span>{{ ucfirst($article->user->name)}}</span></h6>
                            <br>
                            <h6><u>Email Address</u> : &nbsp&nbsp <span>{{ ucfirst($article->user->email)}}</span></h6>
                            <br>
                            <h6><u>User Role</u>: &nbsp;&nbsp;<span style="background:yellow;" >{{ ucfirst($article->user->getRoleNames()->first()) }}</span></h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>