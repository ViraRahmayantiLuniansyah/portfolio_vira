<h1>Tambah Project</h1>

<form action="{{ route('admin.projects.store') }}" method="POST">
    @csrf

    <input type="text" name="title" placeholder="Judul"><br>
    <textarea name="description" placeholder="Deskripsi"></textarea><br>
    <input type="text" name="technologies" placeholder="Tech (pisah koma)"><br>
    <input type="text" name="project_url" placeholder="Link"><br>

    <button type="submit">Simpan</button>
</form>