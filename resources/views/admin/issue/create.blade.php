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

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="project_id" id="" class="form-control" value="1">
                                        <label>Tipo*</label>
                                        <select name="tracker_id" id="" class="custom-select rounded-0" required>
                                            <option value="4">Ordem de Produto</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Cliente*</label>
                                            <select name="cf_{{getenv('REDMINE_FIELD_CLIENTE')}}" id="" class="custom-select rounded-0 select2" required>
                                                <option value="8">Ordem de Produto</option>
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
                                            <option value="1">Baixa</option>
                                            <option value="2">Normal</option>
                                            <option value="3">Alta</option>
                                            <option value="4">Urgente</option>
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
                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_ACO')}}" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Tipo de borracha</label>
                                        <select name="cf_{{getenv('REDMINE_FIELD_TIPO_BORRACHA')}}" class="custom-select rounded-0 select2">
                                            <option value=""></option>
                                            <option value="8/10 Shore - Azul">8/10 Shore - Azul</option>
                                            <option value="15 Shore - Vermelha">15 Shore - Vermelha</option>
                                            <option value="35 Shore - Branca">35 Shore - Branca</option></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Vazadores colocados</label>
                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_VAZADOR_COLOCADO')}}" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Vazadores dobrados</label>
                                        <input type="number" name="cf_{{getenv('REDMINE_FIELD_VAZADOR_DOBRADO')}}" id="" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Arquivo</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" id="" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Escolher arquivo</label>
                                        </div>
                                    </div>
                                </div>
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
