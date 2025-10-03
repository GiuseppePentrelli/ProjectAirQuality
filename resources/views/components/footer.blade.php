<footer class="container-fluid shadow-lg">
    <!-- Logo + nome -->
    <div class="row align-items-center mb-3">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <picture class="d-flex align-items-center">
                <img class="logoNav img-fluid" src="/media/logoNav.png" alt="Logo Air Quality" style="height: 50px;">
                <h2 class="logoName">Air Quality</h2>
            </picture>
        </div>
    </div>

    <!-- Navigazione footer -->
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-center">
            <nav aria-label="Footer navigation">
                <ul>
                    <li><a href="#">Chi siamo</a></li>
                    <li><a href="#">Contatti</a></li>
                    <li><a href="/privacy">Privacy</a></li>
                    <li><a href="https://www.arpa.puglia.it" target="_blank">Arpa.Puglia</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Social e curiosità -->
    <div class="row mb-3 d-flex justify-content-center">
        <div class="col-12 col-md-6 text-center">
            <div class="socialButtonDisplay">
                <div class="socialContainer">
                    <a class="socialBox" href="https://facebook.com" target="_blank" aria-label="Facebook"
                        title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a class="socialBox" href="https://instagram.com" target="_blank" aria-label="Instagram"
                        title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a class="socialBox" href="https://twitter.com" target="_blank" aria-label="Twitter"
                        title="Twitter"><i class="bi bi-twitter"></i></a>
                    <a class="socialBox" href="https://github.com" target="_blank" aria-label="GitHub" title="GitHub"><i
                            class="bi bi-github"></i></a>
                </div>
                <span class="socialSpan mt-4">Seguimi sui Social</span>
            </div>


            @php
                $frasi = [
                    'Life is like riding a bicycle. To keep your balance, you must keep moving. – Albert Einstein',
                    'Simplicity is the soul of efficiency. – Austin Freeman',
                    'Code is like humor. When you have to explain it, it’s bad. – Cory House',
                    'Programs must be written for people to read, and only incidentally for machines to execute. – Harold Abelson',
                    'The best way to get a project done faster is to start sooner. – Jim Highsmith',
                    'Clean code always looks like it was written by someone who cares. – Michael Feathers',
                    'The function of good software is to make the complex appear simple. – Grady Booch',
                    'Any fool can write code that a computer can understand. Good programmers write code that humans can understand. – Martin Fowler',
                    'First, solve the problem. Then, write the code. – John Johnson',
                    'Good software, like wine, takes time. – Joel Spolsky',
                ];

                $frasiRandom = $frasi[array_rand($frasi)];
            @endphp

            <div class="randomText">
                {{ $frasiRandom }}
            </div>
        </div>
    </div>
<div class="d-flex justify-content-center">
        <p class="d-flex justify-content-center"><a href="#top" class="text-reset text-center text-decoration-none me-3"><i class="bi bi-airplane-fill"></i><br>{{__('ui.goUp')}}</a></p>
</div>
    <hr class="hrFooter">

    <!-- Fine pagina -->
    <div class="row text-center endDiv">
        <div class="col-12">
            <small>&copy; 2025 Air Quality | {{ __('ui.all_rights_reserved') }} | {{ __('ui.powered_by') }}
Pentrelli Giuseppe.
            </small>
        </div>
    </div>
</footer>
