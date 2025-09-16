  <nav id="navbar" class="navCustom" aria-label="Navigazione principale">
            <div class="logoContainer">
                <img class="logoNav img-fluid" src="/media/logoNav.png" alt="Logo di Aria Quality">
                {{-- <h2>Air Quality</h2> --}}
            </div>

            <ul class="linksNav">

                <li class="me-2"><a href="{{ route('welcome') }}" title="Torna alla Home">{{__('ui.home')}} <i
                            class="bi bi-house"></i></a></li>
                <li><a href="{{route('stations.index')}}" title="Tutte le stazioni">{{ __('ui.stations') }} <i
                            class="bi bi-bar-chart-steps"></i></a></li>

            </ul>

        </nav>