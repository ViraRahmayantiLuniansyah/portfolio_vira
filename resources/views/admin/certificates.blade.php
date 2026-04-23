<!DOCTYPE html>
<html>
<head>
    <title>Admin - Certificates</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body { background:#0f0f0f; color:white; font-family:Poppins; padding:30px; }
        h1,h3{ color:#ff4da6; }

        .form-box,.card{
            background:#1a1a1a;
            padding:20px;
            border-radius:15px;
            margin-top:20px;
            box-shadow:0 0 10px rgba(255,77,166,0.2);
        }

        input{
            padding:10px;
            margin:5px;
            background:#111;
            border:1px solid #333;
            color:white;
            border-radius:5px;
        }

        button{
            background:#ff4da6;
            border:none;
            padding:8px 12px;
            color:white;
            border-radius:5px;
            cursor:pointer;
        }

        .card:hover{ transform:translateY(-5px); }
    </style>
</head>
<body>

<h1>Certificates</h1>
<a href="{{ route('admin.dashboard') }}">← Back</a>

<div class="form-box">
    <h3>Tambah Certificate</h3>
    <form method="POST" action="{{ route('admin.certificates.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Judul">
        <input type="text" name="issuer" placeholder="Penerbit">
        <input type="text" name="year" placeholder="Tahun">
        <button>Tambah</button>
    </form>
</div>

<h3>List Certificate</h3>

@foreach($certificates as $cert)
<div class="card">
    <form method="POST" action="{{ route('admin.certificates.update', $cert->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $cert->title }}">
        <input type="text" name="issuer" value="{{ $cert->issuer }}">
        <input type="text" name="year" value="{{ $cert->year }}">
        <button>Update</button>
    </form>

    <form method="POST" action="{{ route('admin.certificates.delete', $cert->id) }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
</div>
@endforeach

</body>
</html>