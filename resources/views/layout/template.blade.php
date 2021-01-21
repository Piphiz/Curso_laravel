<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unidev Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>

        .btn-unidev:hover{
            background-color: grey;
        }

    </style>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link {{(request()->segment(1) === 'product') ? 'active' : '' }}" href="{{ route('product.index') }}">Produtos</a>
                    <a class="nav-link {{(request()->segment(1) === 'user') ? 'active' : '' }}" href="/user">Usuarios</a>
                </div>
            </div>
        </div>
    </nav>

      <div class="container">
          <div class="row mt-5">
              <div class="col-md">

                @yield('main')

              </div>
          </div>
      </div>

      <form id="delete_form" action="" method="post">

        @csrf
        @method('delete')

      </form>

      {{-- Java Script Bundle --}}
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

      <script>

        const order_by = document.querySelector('#order_by');

        if(order_by)
            order_by.value = "{{ request()->get('order_by') }}";

        const provider = document.querySelector('#provider');

        if(provider)
            provider.value = "{{ $product->provider ?? ''}}";

        function deleteInDatabase(path){
            if(confirm('Voce tem certeza que deseja excluir esse registro?')){
                const deleteForm = document.querySelector('#delete_form');
                deleteForm.action = path;

                deleteForm.submit();
            }
        }

      </script>

</body>
</html>
