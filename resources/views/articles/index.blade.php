<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles List') }}
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
                            <a class="btn btn-light border float-right" href="{{ route('articles.create') }}">Create New Article</a>
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
                                    @foreach ($articles as $index => $article)
                                        <tr>
                                            <td><u>{{ $index+1 }}</u></td>
                                            <td>{{ ucfirst($article->title) }}</td>
                                            <td>{{ ucfirst($article->description) }}</td>
                                            <td>{{ $article->created_at->format('d,F Y'); }}</td>
                                            <td class="d-flex">

                                                @role('Admin')
                                                    <a class="btn btn-sm btn-info mr-1" href="{{ route('admin.show', $article->id) }}">Show</a>
                                                @else
                                                    <a class="btn btn-sm btn-info mr-1" href="{{ route('articles.show', $article->id) }}">Show</a>
                                                @endrole
                                            
                                                <a class="btn btn-sm btn-primary mr-1" href="{{ route('articles.edit', $article->id) }}">Edit</a>
                                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
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
