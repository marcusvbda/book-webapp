@php
    $currentLocale = App::getLocale();
    $usUrl = \App\Helper::addQueryParams(request()->fullUrl(), ['lang' => 'en']);
    $ptbrUrl = \App\Helper::addQueryParams(request()->fullUrl(), ['lang' => 'pt_BR']);
@endphp
<select x-data x-on:change="window.location.href = $event.target.value" class="border-none pr-4">
    <option value="{{ $usUrl }}" @if ($currentLocale === 'en') selected @endif>
        EN
    </option>
    <option value="{{ $ptbrUrl }}" @if ($currentLocale === 'pt_BR') selected @endif>
        PT-BR
    </option>
</select>
