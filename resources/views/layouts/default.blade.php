<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ config('app.default_theme') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <title>{{ config('app.name') }} @yield('title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @yield('body')
</body>
@livewireScripts

</html>

<script>
    document.addEventListener('livewire:init', () => {
        const showMessage = (message) => {
            const colors = {
                'success': '#65a30d',
                'error': '#e11d48',
                'warning': '#d97706',
            };
            Toastify({
                text: message.text,
                duration: 5000,
                close: true,
                position: "right",
                stopOnFocus: true,
                style: {
                    background: colors[message.type],
                }
            }).showToast();
        }

        @if (session('message'))
            let sessionMessage = @json(session('message'));
            showMessages(sessionMessage);
        @endif

        Livewire.on('sendMessage', (data) => {
            showMessage(data);
        });
    });
</script>
