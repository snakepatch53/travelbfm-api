<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cart #{{ $cart['id'] }}</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;

        }

        table thead th {
            background-color: #40c886;
            color: white;
            letter-spacing: 1px;
        }

        table th,
        table td {
            padding: 10px;
        }

        table.table-products {
            /* border: 1px solid #d1d1d1; */
        }

        table.table-products th:first-child {
            border-top-left-radius: 5px;
        }

        table.table-products th:last-child {
            border-top-right-radius: 5px;
        }

        table.table-products tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
            background: #40c886;
            color: white;
        }

        table.table-products tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
            background: #40c886;
            color: white;
        }

        table.table-products tr td:first-child {
            border-left: 1px solid #d1d1d1;
        }

        table.table-products tr td:last-child {
            border-right: 1px solid #d1d1d1;
        }

        table.table-products tr:nth-child(even) {
            background: #dfdfdf;
        }

        table.table-products tr:nth-child(odd) {
            background: #ecebeb;
        }
    </style>
</head>

<body>
    <div style="text-align:center;">
        <img src={{ url('public/img/logo.png') }} style="width:100px;" />
    </div>
    <h1 style="font-size:2rem;text-align:center;color:#40c886;">CARRITO DE COMPRAS</h1>
    <h3>CLIENTE</h3>
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
                <img src="{{ $cart['user']['photo_url'] }}"
                    style="background:#40c886;border:solid 1px #ccc; border-radius:5px;" width="130" />
            </td>
        </tr>
    </table>
    <h3>NEGOCIO</h3>
    <table>
        <tr>
            <td style="text-align:left;">
                <p><b>Nombre:</b>{{ $cart['product_carts'][0]['product']['category']['business']['name'] }}</p>
                <p><b>Dirección:</b>{{ $cart['product_carts'][0]['product']['category']['business']['address'] }}</p>
                <p><b>Teléfono:</b>{{ $cart['product_carts'][0]['product']['category']['business']['phone'] }}</p>
            </td>
            <td style="text-align:right">
                <img src="{{ $cart['product_carts'][0]['product']['category']['business']['location_qr_url'] }}"
                    width="130" />
            </td>
        </tr>
    </table>
    <h3>PRODUCTOS</h3>
    <table class="table-products">
        <thead>
            <tr>
                <th>FOTO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>SUBTOTAL</th>
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
            <tr>
                <td colspan="5"><b>TOTAL:</b></td>
                <td style="font-size:1.2rem;">${{ $total }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
