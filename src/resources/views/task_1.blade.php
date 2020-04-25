@extends('layouts.layout', ['title' => 'Task 1'])

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mt-4">Task 1</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    Сделать миграции
                </div>
                <div class="card-body">
                    <p class="card-text">Event model:</p>
<pre><code class="language-php">class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('caption');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}</code></pre>
                    <p class="card-text mt-3">Bid model:</p>
<pre><code class="language-php">class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('id_event');
            $table->string('name');
            $table->string('email');
            $table->float('price');

            $table->foreign('id_event')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}</code></pre>
                    <p class="card-text mt-3">Event factory:</p>
<pre><code class="language-php">$factory->define(Event::class, function (Faker $faker) {

    $caption =  $faker->realText(rand(10, 40));
    $created = $faker->dateTimeBetween('-60 days', '-31 days');

    return [
        'caption' => $caption,
        'created_at' => $created,
        'updated_at' => $created,
    ];
});</code></pre>
                    <p class="card-text mt-3">Bid factory:</p>
<pre><code class="language-php">$factory->define(Bid::class, function (Faker $faker) {

    $created = $faker->dateTimeBetween('-30 days', '-1 days');

    return [
        'id_event' => rand(1,15),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'price' => $faker->randomFloat(2, 1, 1000),
        'created_at' => $created,
        'updated_at' => $created,
    ];
});</code></pre>
                    <p class="card-text mt-3">Seeds:</p>
<pre><code class="language-php">class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Event::class, 15)->create();
        factory(\App\Bid::class, 100)->create();
    }
}</code></pre>
<p class="card-text mt-3">CLI command:</p>
                    <pre><code class="language-bash">php artisan migrate:refresh --seed</code></pre>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Напишите запрос, который выберет имя пользователя (bids.name) с самой высокой ценой заявки (bids.price)
                </div>
                <div class="card-body">
                    <pre><code class="language-php">$max_price_username = Bid::orderBy('price', 'desc')->first()->name;</code></pre>
                    <p class="card-text">{{ $max_price_username }}</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    Напишите запрос, который выберет название мероприятия (events.caption), по которому нет заявок
                </div>
                <div class="card-body">
                    <pre><code class="language-php">$event_with_no_bids = Event::doesntHave('bids')->get();</code></pre>
                    <p class="card-text">
                        @foreach($event_with_no_bids as $event)
                            {{ $event->caption }} <br>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Напишите запрос, который выберет название мероприятия (events.caption), по которому больше трех заявок
                </div>
                <div class="card-body">
                    <pre><code class="language-php">$event_with_3_bids = Event::has('bids', '>', 3)->get();</code></pre>
                    <p class="card-text">
                        @foreach($event_with_3_bids as $event)
                            {{ $event->caption }} <br>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Напишите запрос, который выберет название мероприятия (events.caption), по которому больше всего заявок
                </div>
                <div class="card-body">
                    <pre><code class="language-php">$event_with_max_bids = Event::withCount('bids')->orderBy('bids_count', 'desc')->limit(1)->get();</code></pre>
                    <p class="card-text">
                        @foreach($event_with_max_bids as $event)
                            {{ $event->caption }} <br>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
