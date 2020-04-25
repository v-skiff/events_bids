@extends('layouts.layout', ['title' => 'Task 2'])

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mt-4">Task 2</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Написать алгоритм решения задачи:<br>
                    В классе 28 учеников. 75% из них занимаются спортом. Сколько учеников в классе занимаются спортом и сколько всего учеников в классе?
                </div>
                <div class="card-body">
<pre><code class="language-php">$students_total = 28;
$percents = 75;
$athletes = ($students_total * $percents) / 100;</code></pre>
                    <p class="card-text">
                        Студентов: {{ $students_total }}<br>
                        Спортсменов: {{ $athletes }}
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Реализовать алгоритм  извлечения числовых значений со строки:<br>
                    This server has 386 GB RAM and 500GB storage
                </div>
                <div class="card-body">
<pre><code class="language-php">$str = 'This server has 386 GB RAM and 500GB storage';
preg_match_all('!\d+!', $str, $digits_arr);</code></pre>
                    <p class="card-text">
                        Извлечённые значения:<br>
{{--                        @foreach($digits_assoc as $digit)--}}
{{--                            {{ $digit }}<br>--}}
{{--                        @endforeach--}}
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Нужно поменять 2 переменные местами без использования третьей:<br>
                    $а = [1,2,3,4,5];<br>
                    $b = ‘Hello world’;

                </div>
                <div class="card-body">
<pre><code class="language-php">$a = [1,2,3,4,5];
$b = 'Hello world';

list($a,$b) = [$b,$a];</code></pre>
                    <p class="card-text">
                        Текущие значения переменных:<br>
                        'a': {{ $a }},<br>
                        'b': [{{ implode(', ', $b) }}]<br>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
