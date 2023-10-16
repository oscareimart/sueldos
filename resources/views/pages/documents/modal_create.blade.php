<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Importar Planilla desde Excel | CSV</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('importar-csv') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="txtCodigo">Asignar Empresa</label>
                        <select name="company_id" id="company_id" class=" form-control">
                            @foreach ($companies as $comp)
                                <option value="{{ $comp->id }} ">
                                    {{ $comp->business_name }}

                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Nombre</label>
                        <input type="text" name="name" class="form-control" id="document">
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Año</label>
                        <input type="text" name="year" class="form-control" id="document">
                    </div>
                    <div class="form-group">
                        <label for="txtCodigo">Mes</label>
                        <input type="text" name="month" class="form-control" id="document">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".csv" maxlength="10" name="archivo" type="file"
                                    class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            {{-- <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div> --}}
                        </div>
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
