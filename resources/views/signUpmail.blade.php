{{-- @component('mail::message')
    # Introduction

    The body of message
    <h2>Totle</h2>
    <h2>Uou have been</h2>
    @component('mail::button', ['url' => $url])
        Sign up now
    @endcomponent
@endcomponent --}}

@component('mail::message')
# DiSC Profiling invitation

<p>Hi, you have been invited to complate the DiSC Profiling test.</p>
<h2>Please Click the link below to register your account</h2>


@component('mail::button', ['url' => $url])
Sign up now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
