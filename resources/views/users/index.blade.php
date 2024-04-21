<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
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
                            <!-- <a class="btn btn-light border float-right" href="{{ route('users.index') }}">Go Back</a> -->
                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td><u>{{ $index+1 }}</u></td>
                                            <td>{{ ucfirst($user->name) }}</td>
                                            <td>{{ ucfirst($user->email) }}</td>
                                            <td>{{ $user->created_at->format('d,F Y'); }}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-sm btn-info mr-1" href="{{ route('users.show', $user->id) }}">Show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
