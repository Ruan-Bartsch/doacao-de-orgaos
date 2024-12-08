<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f8f8f8;
        }
        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        .doadores-section h2 {
            color: #0056b3; /* Azul */
        }
        .doadores-section table {
            border-left: 5px solid #0056b3;
        }
        .receptores-section h2 {
            color: #0D125E; /* Vermelho */
        }
        .receptores-section table {
            border-left: 5px solid #0D125E;
            
        }
        .orgaos-section table {
            border-left: 5px solid #b30000;}

        .orgaos-section h2 {
            color: #b30000; /* Vermelho */
        }    

        .hospitais-section h2 {
            color: #008000; /* Verde */
        }
        .hospitais-section table {
            border-left: 5px solid #008000;
        }

        .doadores-section th { background: #0056b3; color: #fff; }
        .receptores-section th { background:#0D125E ; color: #fff }
        .hospitais-section th { background: #008000; color: #fff; }
        .orgaos-section th {background: #b30000; color: #fff;}
        

        .cadastrar-hospital h1 {
            color: #333;  
        }
        .cadastrar-hospital form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            width: 80%;
            align-items: center;
        }
        .cadastrar-hospital input {
            width: 30%;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
     
        .cadastrar-hospital button {
            width: 20%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 2px;
            align-items: center;   
        }
        #botao-orgao { width: 20%;
            padding: 10px;
            background-color: #b30000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 2px;
            align-items: center;}

        #botao-orgao:hover{
            background-color: #8b0000;
        }
        .cadastrar-hospital button:hover {
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

        header {
            background-color: #c0c0c0;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }

        #cadastrar-orgao, #lista-orgaos{
            color: #b30000;
            font-size: 25px;
        }

        #cadastrar-hospital{
            color: #008000;
            font-size: 25px;
        }

    </style>
</head>
<body>
    <header>
        <h1>Painel Administrador</h1>
        <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Sair do Sistema</button>
            </form>
        </div>
    </header>


    <div class="cadastrar-hospital">
        <h1 id="cadastrar-orgao">Cadastrar orgão</h1>

       

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orgaos.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome do orgão" value="{{ old('name') }}" required>
            <input type="text" name="description" placeholder="disponivel ou não" value="{{ old('description') }}" required>
            <input type="text" name="patient" placeholder="nome do paciente" value="{{ old('patient') }}" required>
            <button id="botao-orgao"type="submit">Cadastrar Órgão</button>
        </form>
    </div>


    <h2 id="lista-orgaos">Lista de Órgãos</h2>
<table class= "orgaos-section">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Paciente</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orgaos as $orgao)
            <tr>
                <td>{{ $orgao->id }}</td>
                <td>{{ $orgao->name }}</td>
                <td>{{ $orgao->description}}</td>
                <td>{{ $orgao->patient}}</td>
            </tr>
        @endforeach
    </tbody>
</table>






    <div class="cadastrar-hospital">
        <h1 id="cadastrar-hospital">Cadastrar Hospital</h1>

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

        <form action="{{ route('hospitals.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome do Hospital" value="{{ old('name') }}" required>
            <input type="text" name="city" placeholder="Cidade" value="{{ old('city') }}" required>
            <input type="text" name="state" placeholder="Estado" value="{{ old('state') }}" required>
            <button type="submit">Cadastrar Hospital</button>
        </form>
    </div>

     <!-- Seção dos Hospitais -->
     <div class="hospitais-section">
        <h2>Lista de Hospitais</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitais as $hospital)
                    <tr>
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->name }}</td>
                        <td>{{ $hospital->city }}</td>
                        <td>{{ $hospital->state }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Seção dos Doadores -->
    <div class="doadores-section">
        <h2>Lista de Doadores</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doadores as $doador)
                    <tr>
                        <td>{{ $doador->id }}</td>
                        <td>{{ $doador->name }}</td>
                        <td>{{ $doador->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Seção dos Receptores -->
    <div class="receptores-section">
        <h2>Lista de Receptores</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receptores as $receptor)
                    <tr>
                        <td>{{ $receptor->id }}</td>
                        <td>{{ $receptor->name }}</td>
                        <td>{{ $receptor->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
</body>
</html>
