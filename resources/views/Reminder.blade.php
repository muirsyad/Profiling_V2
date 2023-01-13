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
# REMINDER

<p>This email is reminder to register and unswered by clicking below button</p>
<h2>Please Click the link below to register your account</h2>


@component('mail::button', ['url' => $url])
Sign up now
@endcomponent

Thanks,<br>
{{-- {{ config('app.name') }} --}}
<span>LHI Counsuling</span>
@endcomponent
