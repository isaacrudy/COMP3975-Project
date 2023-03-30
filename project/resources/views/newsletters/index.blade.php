<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Newsletters') }}
        </h2>
    </x-slot>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Newsletters List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('newsletters.create') }}">
                        Create New Newsletter
                    </a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>LogoURL</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($newsletters as $item)
                <tr>
                    {{-- ->TableColumn --}}
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->Title }}</td>
                    <td>{{ $item->Content }}</td>
                    <td>{{ $item->ImageURL }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('newsletters.show', $item->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('newsletters.edit', $item->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('newsletters.destroy', $item->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $newsletters->links() }}
    </div>
</x-app-layout>
