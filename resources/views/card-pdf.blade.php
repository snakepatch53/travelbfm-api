<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card #{{ $cart['id'] }}</title>
    <style>
        * {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table thead th {
            background-color: #dbdbdb;
        }

        table th,
        table td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1 style="font-size:2rem;text-align:center;">Carrito de compras</h1>
    <h3>Cliente</h3>
    <table>
        <tr>
            <td style="text-align:left;">
                <p><b>Nombres:</b> {{ $cart['user']['name'] }} {{ $cart['user']['lastname'] }}</p>
                <p><b>Celular:</b> {{ $cart['user']['phone'] }}</p>
                <p><b>Dirección:</b> {{ $cart['user']['address'] }}</p>
                <p><b>Correo Electrónico:</b> {{ $cart['user']['email'] }}</p>
                <p><b>Fecha:</b> {{ $cart['date_str'] }}</p>
            </td>
            <td style="text-align:right">
                <img src="{{ $cart['user']['photo_url'] }}" width="130" border=1 />
            </td>
        </tr>
    </table>
    <h3>Productos</h3>
    <table class="bg-red-200" border=1>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>

        {{-- {{ var_dump($cart['product_carts']) }} --}}
        <tbody>
            {{ $total = 0 }}
            @foreach ($cart['product_carts'] as $product_cart)
                {{ $subtotal = $product_cart['price'] * $product_cart['quantity'] }}
                {{ $total += $subtotal }}
                <tr>
                    <td>
                        <img src="{{ $product_cart['product']['photo_url'] }}" width="50">
                    </td>
                    <td>{{ $product_cart['product']['name'] }}</td>
                    <td>{{ $product_cart['product']['description'] }}</td>
                    <td>${{ $product_cart['price'] }}</td>
                    <td>{{ $product_cart['quantity'] }}</td>
                    <td>${{ $subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total</th>
                <td>${{ $total }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
