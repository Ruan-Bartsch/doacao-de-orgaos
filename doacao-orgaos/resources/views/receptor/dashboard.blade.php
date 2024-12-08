<!-- resources/views/receptor/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órgãos Disponíveis</title>
    <style>
   body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
            background: #b8cad4;
        }
       h1{ font-size:10;}
      
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
     
        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        tbody tr:hover {
            background-color: #f1f1f1;
        }
    
         h2 {
            color: #0D125E; 
        }
        table {
            border-left: 5px solid #0D125E;
            
        }
         

         th { background:#0D125E ; color: #fff }
         header {
            background-color: #0056b3;
            color: white;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }

        
    </style>
</head>
<header>
        <h1>Sistema Doação de Órgãos</h1>
        <div class="logout-button">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Sair do Sistema</button>
            </form>
        </div>
    </header>
<body>
    <h1>Lista de órgãos que você está aguardando</h1>

    <table>
        <thead>
            <tr>
                <th>Nome do Órgão</th>
                <th>Descrição</th>
                <th>Paciente</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orgaos as $orgao)
                <tr>
                    <td>{{ $orgao->name }}</td>
                    <td>{{ $orgao->description }}</td>
                    <td>{{ $orgao->patient }}</td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
