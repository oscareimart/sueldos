<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Empleado Nuevo:</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="quickForm" action="employees" method="post">
                <div class="modal-body">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="txtCodigo">Asignar Empresa</label>
                            <select name="company_id" id="company_id" class=" form-control">
                                @foreach($companies as $comp)
                                <option value="{{$comp->id}} ">
                                    {{$comp->business_name}}

                                </option>
                                @endforeach

                            </select>
                            <span style="color:red" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtCodigo">CI</label>
                            <input type="text" name="document" class="form-control" id="document" placeholder="EMP-01">
                            <span style="color:red" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="">Extension</label>
                            <input type="text" name="extention" class="form-control" id="extention" placeholder="La Paz">
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Nombre Completo</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ingresar Nombre del Empleado">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Nacionalidad</label>
                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="nacionalidad">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Fecha de Nacimiento</label>
                            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="fecha nacimiento">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Fecha Ingreso</label>
                            <input type="date" name="dateofadmission" class="form-control" id="dateofadmission" placeholder="fecha ingreso">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Genero</label>
                            <input type="text" name="gender" class="form-control" id="gender" placeholder="Genero">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Cargo</label>
                            <input type="text" name="position" class="form-control" id="position" placeholder="Cargo Nuevo">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtRazonSocail">Haber Basico</label>
                            <input type="number" name="salary" class="form-control" id="salary" placeholder="Haber Basico">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        {{-- <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">I agree to
                                    the <a href="#">terms of service</a>.</label>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div> --}}


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnSuccess" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>