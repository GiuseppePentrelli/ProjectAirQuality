{{-- Contenitore dell helper --}}
<div class="helperContainer">
    {{-- bottone con ingranaggio per aprire --}}
    <button id="helperBtn" aria-label="Apri le impostazioni rapide" class="helperBtn">
    </button>

    {{-- Contenuto menu --}}
    <div id="helperMenu" class="dropdown-menu custom-helper-dropdown">

        {{-- cambio lingua --}}
        <div class="dropup">
         <button id="toggleFocus" title="Attiva Focus Mode"></button>
            <hr>
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                🌐 Lingua:
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a title="Italiano" class="dropdown-item" href="#" data-lang="it"><x-_locale lang="it" /> Italiano</a>
                </li>
                <li>
                    <a title="English" class="dropdown-item" href="#" data-lang="en"><x-_locale lang="en" /> English</a>
                </li>
                </li>
                <li>
                    <a title="Español" class="dropdown-item" href="#" data-lang="es"><x-_locale lang="es" /> Español</a>
                </li>
                </li>
            </ul>
            <hr>
            <div id="fontControls" class="accessibility-helper">
  <button id="decreaseFont">A−</button>
  <button id="increaseFont">A+</button>
  <button id="resetFont">Reset</button>
</div>
        </div>
    </div>
</div>
