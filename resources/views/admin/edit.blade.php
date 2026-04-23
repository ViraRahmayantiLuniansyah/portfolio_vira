<h1>Edit Project</h1>

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
    @csrf

    <input type="text" name="title" value="{{ $project->title }}"><br>
    <textarea name="description">{{ $project->description }}</textarea><br>
    <input type="text" name="technologies" value="{{ $project->technologies }}"><br>
    <input type="text" name="project_url" value="{{ $project->project_url }}"><br>

    <button type="submit">Update</button>
</form>