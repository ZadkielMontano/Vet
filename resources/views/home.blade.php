@extends('layouts.panel')

@section('content')


<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card">
            <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{ __('Bienvenido a Veterinaria Huellitas') }}
            </div>
        </div>
    </div>
</div>
<!-- <div class="card">
<div class="form-group col-md-12">

<div class="alert alert-primary" role="alert"> 
    <div class="form-group col-md7-10">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo excepturi dolor, architecto et natus numquam fuga sunt
            sint cumque quas culpa fugiat omnis incidunt eaque asperiores voluptatem vel. Neque, nam?</p>
        <div class="form-group col-md5-6">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo excepturi dolor, architecto et natus numquam fuga sunt
                sint cumque quas culpa fugiat omnis incidunt eaque asperiores voluptatem vel. Neque, nam?</p>
        </div>
    </div>
</div>

    <img class="redimension" src="{{asset('img/wel/icon.jpeg')}}" />    
    </div>
</div> -->
<div class="col-md-12 mb-5">

</div>
<div class="card" >
<div class="container">
<div class="row">
    <div class="col">
        <br>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus iusto
    iste ab ipsam veniam temporibus ipsum, quidem ut? Cumque rem repellendus, delectus ipsum dolorem blanditiis esse. Dicta quasi sed id.</p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus iusto
    iste ab ipsam veniam temporibus ipsum, quidem ut? Cumque rem repellendus, delectus ipsum dolorem blanditiis esse. Dicta quasi sed id.</p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus iusto
    iste ab ipsam veniam temporibus ipsum, quidem ut? Cumque rem repellendus, delectus ipsum dolorem blanditiis esse. Dicta quasi sed id.</p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus iusto
    iste ab ipsam veniam temporibus ipsum, quidem ut? Cumque rem repellendus, delectus ipsum dolorem blanditiis esse. Dicta quasi sed id.</p>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus iusto
    iste ab ipsam veniam temporibus ipsum, quidem ut? Cumque rem repellendus, delectus ipsum dolorem blanditiis esse. Dicta quasi sed id.</p>
    </div>
    <div class="col">
        
    <img src="{{asset('img/wel/icon-bln.jpeg')}}" /> 
    </div>
</div>
</div>
</div> 

    
    
    

@endsection