@extends('layouts.app')

@section('body')
<div class="container" >
    <div class="card">
        <div class="card-header">
            <h3>
                <div class="btn btn-convert">
                    <i class="bi bi-ui-radios-grid text-white "></i>
                </div>
                Konversi Satuan
            </h3>
            <p>
                Alat Konversi ini dapat mengkonversi satuan panjang, suhu, luas, dan berat.
            </p>
        </div>
        <div class="card-body">
            <select name="convert-type" id="convert-type" class="form-select mb-3">
                <option value="length">Panjang</option>
                <option value="weight">Berat</option>
                <option value="area">Luas</option>
                <option value="temperature">Suhu</option>
            </select>

            <div id="length-conversion" class="conversion">
                <h6 class="card-title mt-3">Pilih Satuan Panjang Ke M</h6>
                <select name="convert-length" id="convert-length" class="form-select mb-3">
                    <option value="Km">Km</option>
                    <option value="hm">hm</option>
                    <option value="dam">dam</option>
                    <option value="m">m</option>
                    <option value="dm">dm</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                </select>
            </div>

            <div id="weight-conversion" class="conversion" style="display:none;">
                <h6 class="card-title mt-3">Pilih Satuan Berat ke        G</h6>
                <select name="convert-weight" id="convert-weight" class="form-select mb-3">
                    <option value="Kg">Kg</option>
                    <option value="hg">hg</option>
                    <option value="dag">dag</option>
                    <option value="g">g</option>
                    <option value="dg">dg</option>
                    <option value="cg">cg</option>
                    <option value="mg">mg</option>
                </select>
            </div>

            <div id="area-conversion" class="conversion" style="display:none;">
                <h6 class="card-title mt-3">Pilih Satuan Luas Persegi</h6>
                <select name="convert-area" id="convert-area" class="form-select mb-3">
                    <option value="m2">m<sup>2</sup></option>
                    <option value="cm2">cm<sup>2</sup></option>
                    <option value="mm2">mm<sup>2</sup></option>
                </select>
            </div>

            <div id="temperature-conversion" class="conversion" style="display:none;">
                <h6 class="card-title mt-3">Pilih Satuan Suhu Dari Celcius</h6>
                <select name="convert-temperature" id="convert-temperature" class="form-select mb-3">
                    <option value="C">Celsius</option>
                    <option value="F">Fahrenheit</option>
                    <option value="K">Kelvin</option>
                </select>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h6 class="card-title">From</h6>
                    <input type="number" name="from" id="from" class="form-control mb-3" placeholder="Masukkan nilai">
                </div>
                <div class="col-md-6">
                    <h6 class="card-title">To</h6>
                    <input type="number" name="to" id="to" class="form-control mb-3" placeholder="Hasil konversi" readonly>
                </div>
            </div> 
            <button id="convertBtn" class="btn btn-primary mt-4">Konversi</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
const convertType = document.getElementById("convert-type");
const lengthConversion = document.getElementById("length-conversion");
const weightConversion = document.getElementById("weight-conversion");
const areaConversion = document.getElementById("area-conversion");
const temperatureConversion = document.getElementById("temperature-conversion");
const fromInput = document.getElementById("from");
const toInput = document.getElementById("to");
const convertBtn = document.getElementById("convertBtn");

convertType.addEventListener("change", function () {
    const selectedValue = convertType.value;
    lengthConversion.style.display = "none";
    weightConversion.style.display = "none";
    areaConversion.style.display = "none";
    temperatureConversion.style.display = "none";

    if (selectedValue === "length") {
        lengthConversion.style.display = "block";
    } else if (selectedValue === "weight") {
        weightConversion.style.display = "block";
    } else if (selectedValue === "area") {
        areaConversion.style.display = "block";
    } else if (selectedValue === "temperature") {
        temperatureConversion.style.display = "block";
    }
});

convertBtn.addEventListener("click", function () {
    const convertTypeValue = convertType.value;
    let result;

    if (convertTypeValue === "length") {
        const fromUnit = document.getElementById("convert-length").value;
        const toUnit = "m";
        const fromValue = parseFloat(fromInput.value);
        result = convertLength(fromValue, fromUnit, toUnit);
    } else if (convertTypeValue === "weight") {
        const fromUnit = document.getElementById("convert-weight").value;
        const toUnit = "g";
        const fromValue = parseFloat(fromInput.value);
        result = convertWeight(fromValue, fromUnit, toUnit);
    } else if (convertTypeValue === "area") {
        const fromUnit = document.getElementById("convert-area").value;
        const toUnit = "m2";
        const fromValue = parseFloat(fromInput.value);
        result = convertArea(fromValue, fromUnit, toUnit);
    } else if (convertTypeValue === "temperature") {
        const fromUnit = document.getElementById("convert-temperature").value;
        const toUnit = "C";
        const fromValue = parseFloat(fromInput.value);
        result = convertTemperature(fromValue, fromUnit, toUnit);
    }

    toInput.value = result;
});

function convertLength(value, fromUnit, toUnit) {
    const units = {
        'Km': 1000,
        'hm': 100,
        'dam': 10,
        'm': 1,
        'dm': 0.1,
        'cm': 0.01,
        'mm': 0.001
    };

    const valueInMeter = value * units[fromUnit];
    const result = valueInMeter / units[toUnit];
    return result;
}

function convertWeight(value, fromUnit, toUnit) {
    const units = {
        'Kg': 1000,
        'hg': 100,
        'dag': 10,
        'g': 1,
        'dg': 0.1,
        'cg': 0.01,
        'mg': 0.001
    };

    const valueInGram = value * units[fromUnit];
    const result = valueInGram / units[toUnit];
    return result;
}

function convertArea(value, fromUnit, toUnit) {
    const units = {
        'm2': 1,
        'cm2': 0.0001,
        'mm2': 0.000001
    };

    const valueInSquareMeter = value * units[fromUnit];
    const result = valueInSquareMeter / units[toUnit];
    return result;
}

function convertTemperature(value, fromUnit, toUnit) {
    let result;
    if (fromUnit === 'C') {
        if (toUnit === 'F') {
            result = (value * 9/5) + 32;
        } else if (toUnit === 'K') {
            result = value + 273.15;
        } else {
            result = value;
        }
    } else if (fromUnit === 'F') {
        if (toUnit === 'C') {
            result = (value - 32) * 5/9;
        } else if (toUnit === 'K') {
            result = (value - 32) * 5/9 + 273.15;
        } else {
            result = value;
        }
    } else if (fromUnit === 'K') {
        if (toUnit === 'C') {
            result = value - 273.15;
        } else if (toUnit === 'F') {
            result = (value - 273.15) * 9/5 + 32;
        } else {
            result = value;
        }
    }
    return result;
}
});

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection