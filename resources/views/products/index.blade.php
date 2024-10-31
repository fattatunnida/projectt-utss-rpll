<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
        input[type="submit"] {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<h1>Products</h1>
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('product.edit', ['product' => $product->id]) }}">Edit</a>
            </td>
            <td>
                <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
