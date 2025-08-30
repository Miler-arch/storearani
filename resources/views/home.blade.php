@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="col-12 col-md-6 mb-2 mb-md-0">
                                <form action="{{ route('home') }}" method="GET" class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar Producto" name="search"
                                        value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </form>
                            </div>

                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                data-bs-target="#modalId">
                                <i class="bi bi-plus-circle-dotted"></i> Agregar Producto
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Agregar Producto
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" required>

                                        <label for="price" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="price" name="price" required>

                                        <label for="image" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            accept="image/*" required>
                                        <div class="form-text">Sube una imagen del producto.</div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cerrar
                                    </button>
                                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Precio: Bs.{{ $product->price }}</p>
                                    <img src="{{ $product->getFirstMediaUrl('images', 'preview') }}"
                                        alt="{{ $product->name }}" class="img-fluid mb-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
