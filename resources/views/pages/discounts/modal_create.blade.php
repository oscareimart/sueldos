<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Descuento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="discounts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="txtCodigo">Codigo</label>
                        <input type="text" name="code" class="form-control" id="document">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" class="form-control" id="extention">
                    </div>
                    <div class="form-group">
                        <label for="">Formula</label>
                        <input type="text" name="recipe" class="form-control" id="extention">
                    </div>
                    <div class="form-group">
                        <label>Variable</label>
                        <select class="select2bs4" name="variables[]" multiple="multiple"
                            data-placeholder="Select a State" style="width: 100%;">
                            @foreach ($params as $p)
                                <option>{{ $p->code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        {{-- <input type="text" name="extention" class="form-control" id="extention" placeholder="La Paz"> --}}
                    </div>

                    {{-- <input type="file" name="archivo">
                <button type="submit">Importar CSV</button> --}}
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
