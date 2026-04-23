<!DOCTYPE html>
<html>
<head>
    <title>Admin - Skills</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            background: #0f0f0f;
            color: white;
            font-family: 'Poppins', sans-serif;
            padding: 30px;
        }

        h1, h3 { color: #ff4da6; }

        a { color: #ff4da6; text-decoration: none; }

        .form-box, .card {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(255,77,166,0.2);
        }

        input {
            padding: 10px;
            margin: 5px;
            background: #111;
            border: 1px solid #333;
            color: white;
            border-radius: 5px;
        }

        button {
            background: #ff4da6;
            border: none;
            padding: 8px 12px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover { background: #ff1a8c; }

        .card { transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<h1>Skills</h1>
<a href="{{ route('admin.dashboard') }}">← Back</a>

<div class="form-box">
    <h3>Tambah Skill</h3>
    <form method="POST" action="{{ route('admin.skills.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama Skill">
        <input type="text" name="level" placeholder="Level (90%)">
        <button>Tambah</button>
    </form>
</div>

<h3>List Skill</h3>

@foreach($skills as $skill)
<div class="card">
    <form method="POST" action="{{ route('admin.skills.update', $skill->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $skill->name }}">
        <input type="text" name="level" value="{{ $skill->level }}">
        <button>Update</button>
    </form>

    <form method="POST" action="{{ route('admin.skills.delete', $skill->id) }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</div>
@endforeach

</body>
</html>