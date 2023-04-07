@extends('adminlte::page')

@section('title', 'Chamados')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chamados</h1>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Inserção de Chanado</h3>
                    </div>
                    <form action="{{ route('admin.issue.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="project_id" id="" class="form-control" value="1">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tipo*</label>
                                        <select name="tracker_id" id="" class="form-control select2" required>
                                            <option value="4">Ordem de Produto</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Cliente*</label>
                                            <select name="cf_{{getenv('REDMINE_FIELD_CLIENTE')}}" class="custom-select rounded-0 select2" required>
                                                @foreach( $usuarios as $c )
                                                    <option value="{{ $c['id'] }}" >{{ $c['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Título*</label>
                                        <input type="text" name="subject" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Prioridade</label>
                                        <select name="priority_id" id="" class="custom-select rounded-0 select2">
                                            @foreach( $prioridades as $c )
                                                <option value="{{ $c['id'] }}" >{{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea name="description" id="" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" name="cf_{{getenv('REDMINE_FIELD_VALOR')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Quantidade</label>
                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_QUANTIDADE')}}" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Aço(cm)</label>
                                        <select name="cf_{{getenv('REDMINE_FIELD_ACO')}}" class="custom-select rounded-0 select2">
                                            <option value=""></option>
                                            @foreach( $acos as $c )
                                                <option value="{{ $c['id'] }}" > {{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tipo de borracha</label>
                                        <select name="cf_{{getenv('REDMINE_FIELD_TIPO_BORRACHA')}}" class="custom-select rounded-0 select2">
                                            <option value=""></option>
                                            @foreach( $borrachas as $c )
                                                <option value="{{ $c['id'] }}" > {{ $c['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Chapa de aço</label>
                                        <select name="cf_{{getenv('REDMINE_FIELD_CHAPA_ACO')}}" class="custom-select rounded-0 select2">
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Arquivo</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" id="" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="col-sm-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Vazadores colocados</label>--}}
{{--                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_VAZADOR_COLOCADO')}}" id="" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Vazadores dobrados</label>--}}
{{--                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_VAZADOR_DOBRADO')}}" id="" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Teste');</script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

@stop
