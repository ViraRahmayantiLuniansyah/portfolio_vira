<h1>Admin - Projects</h1>

<a href="{{ route('admin.projects.create') }}">+ Tambah Project</a>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

@foreach($projects as $p)
<div style="border:1px solid #ccc; margin:10px; padding:10px;">
    <h3>{{ $p->title }}</h3>
    <p>{{ $p->description }}</p>

    <a href="{{ route('admin.projects.edit', $p->id) }}">Edit</a>

    <form action="{{ route('admin.projects.delete', $p->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
</div>
@endforeach