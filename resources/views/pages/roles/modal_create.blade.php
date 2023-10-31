<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creacion de Roles</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('importar-csv') }}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">

                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="txtCodigo">Asignar Empresa</label>
                                <select name="company_id" id="company_id" class=" form-control">
                                    @foreach ($companies as $comp)
                                        <option value="{{ $comp->id }} ">
                                            {{ $comp->business_name }}

                                        </option>
                                    @endforeach

                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="txtCodigo">Nombre</label>
                                <input type="text" name="name" class="form-control" id="document">
                            </div>
                            <div class="form-group">
                                <label for="txtCodigo">Descripcion</label>
                                <input type="text" name="year" class="form-control" id="document">
                            </div>

                            {{-- <input type="file" name="archivo">
                        <button type="submit">Importar CSV</button> --}}
                        </div>
                        {{-- <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div> --}}

                    </div>
                    <div class="col-md-6">
                        <div id="tree"></div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
