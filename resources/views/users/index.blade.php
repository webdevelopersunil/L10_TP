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
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
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
                                                
                                                <form id="deleteForm{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST"> 
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $user->id }}')">Delete</button>
                                                </form>

                                                
                                                <!-- <a class="btn btn-sm btn-danger mr-1"
                                                    href="{{ route('users.destroy', $user->id) }}"
                                                    onclick="event.preventDefault(); confirmDelete('{{ $user->id }}');">
                                                        Delete
                                                </a> -->

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
<script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            // If the user confirms, submit the form
            document.getElementById('deleteForm' + userId).submit();
        }
    }
</script>
