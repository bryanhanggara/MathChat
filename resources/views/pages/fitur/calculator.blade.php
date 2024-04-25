@extends('layouts.app')

@section('body')
    <br><br>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="calculator bg-light p-4 rounded-4">
                    <div class="display mb-3 text-end fs-3" id="result"></div>
                    
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="percent">%</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="clear">CE</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="reset">C</button>
                    <button type="button" class="btn btn-secondary w-20 p-4 mb-2" id="backspace"><i class="bi bi-backspace-fill"></i></button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="7">7</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="8">8</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="9">9</button>
                    <button type="button" class="btn btn-secondary w-20 p-4 mb-2" id="add"><i class="bi bi-plus"></i></button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="4">4</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="5">5</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="6">6</button>
                    <button type="button" class="btn btn-secondary w-20 p-4 mb-2" id="substract"><i class="bi bi-dash"></i></button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="1">1</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="2">2</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="3">3</button>
                    <button type="button" class="btn btn-secondary w-20 p-4 mb-2" id="multiply"><i class="bi bi-x-lg"></i></button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="minus"><i class="bi bi-plus-slash-minus"></i></button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="zero">0</button>
                    <button type="button" class="btn btn-secondary w-25 p-4 mb-2" id="decimal">.</button>
                    <button type="button" class="btn btn-secondary w-20 p-4 mb-2" id="div"><i class="bi bi-slash"></i></button>
                    <button type="button" class="btn btn-primary w-75 p-4 mb-2" id="equals">=</button>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="{{url('asset_fe/js/calculator.js')}}"></script>
@endsection