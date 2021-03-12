<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/freshtrak.js') }}"></script>

<!-- any custom scripts that need applied -->
{!! App\Services\Assets::display('js') !!}

<!-- custom js (not scripts) -->
@stack('js')