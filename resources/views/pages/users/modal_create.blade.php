<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="quickForm" action="{{ route('users.store') }}" method="post">
                <div class="modal-body">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="txtCodigo">Nombre</label>
                            <input type="text" name="name" class="form-control" id="txtCodigo"
                                placeholder="Nombre Usuario" {{ old('code') }}>
                            <span style="color:red" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div>
                        <div class="form-group">
                            <label for="txtNit">Email</label>
                            <input type="text" name="email" class="form-control" id="txtNit"
                                placeholder="email@email.com">
                        </div>
                        <div class="form-group">
                            <label for="txtNit">Password</label>
                            <input type="password" name="password" class="form-control" id="txtNit"
                                placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="txtNit">Repite Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="txtNit"
                                placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="txtCodigo">Rol</label>
                            <select name="role_id" id="role_id" class=" form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }} ">
                                        {{ $role->name }}

                                    </option>
                                @endforeach

                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="txtRazonSocail">Razon Social</label>
                            <input type="text" name="business_name" class="form-control" id="txtRazonSocail"
                                placeholder="Empresa Prueba">
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">Please enter a email
                                address</span>
                        </div> --}}

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
