@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                

                <div class="card card-primary ">
                    <div class="card-header">
                        <h3>Registrando finanzas iniciales de la iglesia {{$iglesia->name}} </h3>
                    </div>
                    <div class="card-body box-profile">
                        <form method="POST" action="{{ route('finanzas.store'), $iglesia->id }}">                            
                            @csrf
                            <input name="tipo" value="inicial" type="hidden">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item Damas" id="" >
                                    <div class="row">
                                        <label class="col-sm-12"><u>  Ministerio de Damas  </u> </label>
                                        
                                        <div class="col-sm-6">
                                            <p>Monto</p>
                                            <div class="form-group">
                                                <input  required  type="number" class="form-control Damas" name="monto_Damas">
                                            </div>
                                        </div>
                                        <input type="hidden" name="categorias[]" value="Damas">
                                        
                                    </div>
                                </li>
                                <!-- s Ministerio de Jovenes  -->
                                <li class="list-group-item Jovenes" id="" >
                                    <div class="row">
                                        <label class="col-sm-12"><u>  Ministerio de Jovenes  </u></label>
                                       
                                        <div class="col-sm-6">
                                            <p>Monto</p>
                                            <div class="form-group">
                                                <input  required  type="number" class="form-control Jovenes" name="monto_Jovenes">
                                            </div>
                                        </div>
                                        <input type="hidden" name="categorias[]" value="Jovenes">
                                    </div>
                                </li>
                                <!--  Ministerio de Niños -->
                                <li class="list-group-item Niños" id="" >
                                    <div class="row">
                                        <label class="col-sm-12"><u>  Ministerio de Niños  </u></label>
                                       
                                        <div class="col-sm-6">
                                            <p>Monto</p>
                                            <div class="form-group">
                                                <input  required  type="number" class="form-control Niños" name="monto_Niños">
                                            </div>
                                        </div>
                                        <input type="hidden" name="categorias[]" value="Niños">
                                        
                                    </div>
                                </li>
                                <!--  Dept. de Liderazgo y Discipulado   -->
                                <li class="list-group-item DLD" id="" >
                                    <div class="row">
                                        <label class="col-sm-12"><u>  Dept. de Liderazgo y Discipulado   </u></label>
                                        
                                        <div class="col-sm-6">
                                            <p>Monto</p>
                                            <div class="form-group">
                                                <input  required  type="number" class="form-control DLD" name="monto_DLD">
                                            </div>
                                        </div>
                                        <input type="hidden" name="categorias[]" value="DLD">
                                        
                                    </div>
                                </li>
                                <!--  Ministerio de Caballeros  -->
                                <li class="list-group-item Caballeros" id="" >
                                    <div class="row">
                                        <label class="col-sm-12"><u>  Ministerio de Caballeros  </u></label>
                                        
                                        <div class="col-sm-6">
                                            <p>Monto</p>
                                            <div class="form-group">
                                                <input  required  type="number" class="form-control Caballeros" name="monto_Caballeros">
                                            </div>
                                        </div>
                                        <input type="hidden" name="categorias[]" value="Caballeros">
                                        
                                    </div>
                                </li>
                                <!--  Ministerio Patrimonio Historico   -->
                                <li class="list-group-item Patrimonio_Historico" id="" >
                                    <div class="row">
                                    <label class="col-sm-12"><u> Ministerio Patrimonio Historico  </u></label>
                                    
                                    <div class="col-sm-6">
                                        <p>Monto</p>
                                        <div class="form-group">
                                            <input  required  type="number" class="form-control Patrimonio_Historico" name="monto_Patrimonio_Historico">
                                        </div>
                                    </div>
                                    <input type="hidden" name="categorias[]" value="Patrimonio_Historico">
                                    </div>
                                </li>
                                <!--  Fondo Local   -->
                                <li class="list-group-item Fondo_Local" id="" >
                                    <div class="row">
                                    <label class="col-sm-12"><u> Fondo Local  </u></label>
                                   
                                    <div class="col-sm-6">
                                        <p>Monto</p>
                                        <div class="form-group">
                                            <input  required  type="number" class="form-control " name="monto_Fondo_Local">
                                        </div>
                                    </div>
                                    <input type="hidden" name="categorias[]" value="Fondo_Local">
                                
                                    </div>
                                </li>
                                <li class="list-group-item Diezmo_Restante" id="" >
                                    <div class="row">
                                    <label class="col-sm-12"><u> Diezmo Restante  </u></label>
                                   
                                    <div class="col-sm-6">
                                        <p>Monto</p>
                                        <div class="form-group">
                                            <input  required  type="number" class="form-control " name="monto_Diezmo_Restante">
                                        </div>
                                    </div>
                                    <input type="hidden" name="categorias[]" value="Diezmo_Restante">
                                    </div>
                                </li>
                            </ul>  
                             <br>
                            
                            <div class="" >
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-block btn-success">
                                            {{ __('Guardar') }}
                                        </button>
                                    </div>
                            
                                    <div class="col-sm-4">
                                        <button type="reset" class="btn btn-block btn-danger">
                                            {{ __('Limpiar') }}
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection