<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats ! your job is now posted on our website .
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}"> View your Job listing </a>
</p>
