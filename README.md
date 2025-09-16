# Air Quality Dashboard

## Autore
**Giuseppe Pentrelli**  
Email: giuseppe.pentrelli.dev@gmail.com  
GitHub: https://github.com/GiuseppePentrelli

## Descrizione
Mini-app full-stack per esplorare dati di qualità dell'aria usando dati da API pubbliche.
Questa applicazione consente di:

- Visualizzare l'elenco delle stazioni disponibili che monitorano la qualità dell'aria.
- Mostrare, per ciascuna stazione, i valori giornalieri minimi, medi e massimi degli ultimi dieci giorni.
- Calcolare e visualizzare la media ponderata degli ultimi sette giorni per ciascuna metrica.
- UI responsive con HTML, CSS, JS e Bootstrap Icons.

## Tecnologie utilizzate
- **Backend:** Laravel (PHP)
- **Frontend:** Blade + Livewire + HTML & CSS & JAVASCRIPT

## Requisiti
Per eseguire correttamente l’applicazione, assicurati di avere installato:

- **PHP 8.2+**
- **Composer**
- **Node.js + npm**
- **Database MySQL** (opzionale, solo per far girare Laravel senza errori)

## Variabili d'ambiente
Il progetto include un file `.env.example`.  
Puoi copiarlo come `.env` per far partire Laravel senza modifiche particolari.  

## Installazione

Clona il repository e installa le dipendenze:

```bash
git clone https://github.com/GiuseppePentrelli/ProjectAirQuality.git

cd ProjectAirQuality

composer install

npm install

cp .env.example .env

php artisan key:generate

npm run dev

php artisan serve

``` 
