@extends('layouts.app')

@section('body')
<div class="container">
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
                <h6 class="card-title mt-3">Pilih Satuan Panjang</h6>
                <select name="convert-length-from" id="convert-length-from" class="form-select mb-3">
                    <option value="Km">Km</option>
                    <option value="hm">hm</option>
                    <option value="dam">dam</option>
                    <option value="m">m</option>
                    <option value="dm">dm</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                </select>
                <h6 class="card-title mt-3">ke</h6>
                <select name="convert-length-to" id="convert-length-to" class="form-select mb-3">
                    <option value="Km">Km</option>
                    <option value="hm">hm</option>
                    <option value="dam">dam</option>
                    <option value="m">m</option>
                    <option value="dm">dm</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                </select>
            </div>

            <div id="weight-conversion" class="conversion">
                <h6 class="card-title mt-3">Pilih Satuan Berat</h6>
                <select name="convert-weight-from" id="convert-weight-from" class="form-select mb-3">
                    <option value="Kg">Kg</option>
                    <option value="g">g</option>
                    <option value="mg">mg</option>
                    <option value="oz">oz</option>
                    <option value="lb">lb</option>
                </select>
                <h6 class="card-title mt-3">ke</h6>
                <select name="convert-weight-to" id="convert-weight-to" class="form-select mb-3">
                    <option value="Kg">Kg</option>
                    <option value="g">g</option>
                    <option value="mg">mg</option>
                    <option value="oz">oz</option>
                    <option value="lb">lb</option>
                </select>
            </div>

            <div id="area-conversion" class="conversion">
                <h6 class="card-title mt-3">Pilih Satuan Luas</h6>
                <select name="convert-area-from" id="convert-area-from" class="form-select mb-3">
                    <option value="m2">m2</option>
                    <option value="cm2">cm2</option>
                    <option value="mm2">mm2</option>
                    <option value="km2">km2</option>
                    <option value="ha">ha</option>
                </select>
                <h6 class="card-titlemt-3">ke</h6>
                <select name="convert-area-to" id="convert-area-to" class="form-select mb-3">
                    <option value="m2">m2</option>
                    <option value="cm2">cm2</option>
                    <option value="mm2">mm2</option>
                    <option value="km2">km2</option>
                    <option value="ha">ha</option>
                </select>
            </div>

            <div id="temperature-conversion" class="conversion">
                <h6 class="card-title mt-3">Pilih Satuan Suhu</h6>
                <select name="convert-temperature-from" id="convert-temperature-from" class="form-select mb-3">
                    <option value="Celsius">Celsius</option>
                    <option value="Fahrenheit">Fahrenheit</option>
                    <option value="Kelvin">Kelvin</option>
                </select>
                <h6 class="card-title mt-3">ke</h6>
                <select name="convert-temperature-to" id="convert-temperature-to" class="form-select mb-3">
                    <option value="Celsius">Celsius</option>
                    <option value="Fahrenheit">Fahrenheit</option>
                    <option value="Kelvin">Kelvin</option>
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
            const fromValue = parseFloat(fromInput.value);

            let result;
            if (convertType.value === "length") {
                const fromUnit = document.getElementById("convert-length-from").value;
                const toUnit = document.getElementById("convert-length-to").value;
                result = convertLength(fromValue, fromUnit, toUnit);
            } else if (convertType.value === "weight") {
                const fromUnit = document.getElementById("convert-weight-from").value;
                const toUnit = document.getElementById("convert-weight-to").value;
                result = convertWeight(fromValue, fromUnit, toUnit);
            } else if (convertType.value === "area") {
                const fromUnit = document.getElementById("convert-area-from").value;
                const toUnit = document.getElementById("convert-area-to").value;
                result = convertArea(fromValue, fromUnit, toUnit);
            } else if (convertType.value === "temperature") {
                const fromUnit = document.getElementById("convert-temperature-from").value;
                const toUnit = document.getElementById("convert-temperature-to").value;
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
                'Kg': 1,
                'g': 0.001,
                'mg': 0.000001,
                'oz': 0.0283495,
                'lb': 0.453592
            };

            const valueInKg = value * units[fromUnit];
            const result = valueInKg / units[toUnit];
            return result;
        }

        function convertArea(value, fromUnit, toUnit) {
            const units = {
                'm2': 1,
                'cm2': 0.01,
                'mm2': 0.0001,
                'km2': 1000000,
                'ha': 10000
            };

            const valueInMeter = value * units[fromUnit];
            const result = valueInMeter / units[toUnit];
            return result;
        }

        function convertTemperature(value, fromUnit, toUnit) {
            if (fromUnit === "Celsius") {
                if (toUnit === "Fahrenheit") {
                    return (value * 9/5) + 32;
                } else if (toUnit === "Kelvin") {
                    return value + 273.15;
                }
            } else if (fromUnit === "Fahrenheit") {
                if (toUnit === "Celsius") {
                    return (value - 32) * 5/9;
                } else if (toUnit === "Kelvin") {
                    return (value - 32) * 5/9 + 273.15;
                }
            } else if (fromUnit === "Kelvin") {
                if (toUnit === "Celsius") {
                    return value - 273.15;
                } else if (toUnit === "Fahrenheit") {
                    return (value - 273.15) * 9/5 + 32;
                }
            }
        }
    });
</script>


</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection