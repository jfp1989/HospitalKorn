@extends("layout.layout")

@section('title_system')
{{$customConfig['title_system']['title_system']}}
@endsection

@section('title_nav')
{{$customConfig['title_nav']['title_nav']}}
@endsection

@section('content')
<div class="col-md-4 offset-md-4 mt-4" id="login-form">
    <h1 class="my-3 text-center">Iniciar Sesión</h1>
    <div class="card">
        <div class="card-body">
            <form id="form-login">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" v-model="email" class="form-control" id="email" placeholder="ingrese correo electronico" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" v-model="password" class="form-control" id="password" placeholder="ingrese la contraseña" required>
                </div>
                <button type="button" class="btn btn-primary" v-on:click.prevent="sendLogin()">Enviar</button>
            </form>
        </div>
    </div>            
</div>
@endsection