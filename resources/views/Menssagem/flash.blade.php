@if (session('erro'))
    <p class="text-center"> <b style="color: red" >{{ session('erro')}}</b></p>
@endif

@if (session('erro1'))
    <p class="text-center"> <b style="color: red" >{{ session('erro1')}}</b></p>
@endif

@if (session('erro2'))
    <p class="text-center"> <b style="color: red" >{{ session('erro2')}}</b></p>
@endif

@if (session('sucesso'))
    <p class="text-center"> <b style="color: green" >{{ session('sucesso')}}</b></p>
@endif

@if (session('sucesso1'))
    <p class="text-center"> <b style="color: green" >{{ session('sucesso1')}}</b></p>
@endif

