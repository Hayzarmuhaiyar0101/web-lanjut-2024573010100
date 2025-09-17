<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel Calculator</title>
</head>
<body>
    <h1>calculator</h1>
@if ($errors->any())
<div style="color: red;">
    <uL>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error}}
        </li>
        @endforeach
    </uL>
    </div>
@endif
<form method="POST" action="{{ route('calculator.calculate') }}">
    @csrf
    <input type="number" name="number1" value="{{ old('number1', $number1 ?? '') }}" placeholder="Angka Pertama" required>
    <select name="operator" required>
    <option value="add" {{ ($operator ?? '') == 'add' ? 'selected' : ''}}>+</option>
    <option value="add" {{ ($operator ?? '') == 'sub' ? 'selected' : ''}}>-</option>
    <option value="add" {{ ($operator ?? '') == 'mul' ? 'selected' : ''}}>*</option>    
    <option value="add" {{ ($operator ?? '') == 'div' ? 'selected' : ''}}>/</option>
</select>

<input type="number" name="number2" value="{{ old('number2', $number2 ?? '') }}" placeholder="Angka Kedua" required>
<button type="submit">Hitung</button>
</form>
@if (isset($result))
<h3>Hasil: {{ $result }}</h3>
@endisset
</body>
</html>