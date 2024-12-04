@php
    $otherLang = App::getLocale() === 'en' ? 'pt_BR' : 'en';
@endphp
<a href="{{ \App\Helper::addQueryParams(request()->fullUrl(), ['lang' => $otherLang]) }}"
    class="text-sm font-semibold leading-6 text-gray-900 flex items-center mr-6 uppercase gap-2">
    <img class="h-4 w-6 rounded-md opacity-80 transition-all duration-300 hover:opacity-100"
        src="{{ asset('images/flags/' . $otherLang . '.png') }}" alt="{{ $otherLang }}">
    {{ $otherLang }}
</a>
