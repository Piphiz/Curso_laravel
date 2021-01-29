<div class="row">
    <div class="col-md mb-5">

        <h3 class="mb-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Filtros de busca</h3>

        <div class="collapse show" id="collapseExample">
            <div class="card card-body">

                <form class="row">

                    <input type="hidden" name="action" value="search">

                <form class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nome do usuario" value="{{ request()->get('keyword') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ request()->get('email') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="{{ request()->get('phone') }}">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="order_by" name="order_by">
                            <option value="">Ordernar por...</option>
                            <option value="newest">Mais recentes</option>
                            <option value="older">Mais antigos</option>
                            <option value="activated">Ativadas</option>
                            <option value="deactivated">Desativadas</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-2 text-center">
                        <button type="submit" class="btn btn-dark btn-unidev">Filtrar</button>
                        <a class="btn btn-dark btn-unidev" href="{{ route('provider.index') }}">Limpar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
