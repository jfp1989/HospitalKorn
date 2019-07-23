@extends("layout.layout")

@section('content')
<div id="patient-crud" class="row mt-4">
	<div class="col-sm-12">
		<h1 class="page-header">Gestión de Pacientes</h1>
	</div>
    <div class="col-sm-12">
        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create" data-backdrop="static" data-keyboard="false">Nuevo Paciente</a>
        <table class="table table-hover table-striped mt-4">
            <thead>
                <tr>
                    <th class="text-center">Nro Historia Clínica</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="p in patients">
                    <td class="text-center">@{{ p.clinical_history_number }}</td>
                    <td class="text-center">@{{ p.name }}</td>
                    <td class="text-center">@{{ p.surname }}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editPatient(p)">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deletePatient(p)">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('guardTeamUser.patient.create')
    @include('guardTeamUser.patient.edit')
</div>
@endsection