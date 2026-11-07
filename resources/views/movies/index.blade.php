@extends('layouts.app')

@section('title', 'My Movie List')

@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Add New Movie</a>
            <p>
                <strong>Genre:</strong>
                <a href="{{ route('movies.index', ['genre_id' => null, 'year' => $year]) }}"
                    class="btn btn-sm btn-outline-primary {{ ! $genreId ? 'active' : '' }}">All</a>
                @foreach ($genres as $genre)
                    <a href="{{ route('movies.index', ['genre_id' => $genre->id, 'year' => $year]) }}"
                        class="btn btn-sm btn-outline-primary {{ $genreId == $genre->id ? 'active' : '' }}">{{ $genre->name }}</a>
                @endforeach
            </p>

            <p>
                <strong>Year:</strong>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => null]) }}"
                    class="btn btn-sm btn-outline-secondary {{ ! $year ? 'active' : '' }}">All</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2001']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2001' ? 'active' : '' }}">2001</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2002']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2002' ? 'active' : '' }}">2002</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2010']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2010' ? 'active' : '' }}">2010</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2014']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2014' ? 'active' : '' }}">2014</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2019']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2019' ? 'active' : '' }}">2019</a>
                <a href="{{ route('movies.index', ['genre_id' => $genreId, 'year' => '2026']) }}"
                    class="btn btn-sm btn-outline-secondary {{ $year === '2026' ? 'active' : '' }}">2026</a>
            </p>

            <a href="{{ route('movies.index') }}" class="btn btn-sm btn-dark">Clear all filters</a>

            <p class="mt-2">
                <strong>Active filters:</strong>
                @if ($genreId)<span class="badge bg-info">Genre: {{ $genres->firstWhere('id', $genreId)?->name }}</span>@endif
                @if ($year)<span class="badge bg-info">Year: {{ $year }}</span>@endif
                @if (! $genreId && ! $year)<span class="badge bg-secondary">None</span>@endif
            </p>

            <table class="table table-bordered table-striped" border="1" cellpadding="5" cellspacing="8">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>

                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a></td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>{{ $movie['rating'] }}</td>
                        <td>{{ $movie['year'] }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('movies.destroy', $movie) }}" method="POST"
                                      onsubmit="return confirm('Delete this record?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm text-white" style="background-color:#dc3545;">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection