@php
  // Wrapper component
@endphp

@include('layouts.site', [
  'title' => $title ?? null,
  'slot' => $slot
])
