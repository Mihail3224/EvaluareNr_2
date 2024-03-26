@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Lista proiectelor</h1>
@stop

@section('content')
  <a class="btn btn-dark" href="{{ route('projects.create') }}">Adaugă proiect</a>

  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <th>#</th>
        <th>Nume</th>
        <th>Descriere</th>
        <th>Status</th>
        <th>Data creării</th>
        <th>Opțiuni</th>
      </tr>
    </thead>
    <tbody>
      @forelse($projects as $project)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $project->name }}</td>
          <td>{{ $project->description }}</td>  
          <td>{{ $project->status }}</td>      
          <td>{{ $project->created_at }}</td>  <td>
            <a href="{{ route('projects.edit', ['project' => $project->id]) }}" class="btn btn-dark">Edit</a>
            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-dark">Show</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6">Nu exista date</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{ $projects->links() }}  @stop

@section('css')
@stop

@section('js')
@stop