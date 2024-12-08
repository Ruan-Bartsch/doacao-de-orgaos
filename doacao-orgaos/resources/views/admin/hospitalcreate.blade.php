<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Hospital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1 {
            color: #333;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .success {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h1>Cadastrar Hospital</h1>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospitais.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome do Hospital" value="{{ old('nome') }}" required>
        <input type="text" name="cidade" placeholder="Cidade" value="{{ old('cidade') }}" required>
        <input type="text" name="estado" placeholder="Estado" value="{{ old('estado') }}" required>
        <button type="submit">Cadastrar Hospital</button>
    </form>

</body>
</html>
