<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="main_wrapper overflow-hidden">
        <div class="maintaince">
          <div class="container">
            <div class="row align-items-center text-center">
              <div class="maintenance__wrapper">
                <h3>Terimakasih Telah Berlanggan Paket Pro {{ auth()->user()->fullname }} ^^</h3>
                <p>Selamat Menikmati Fitur Canggih Celoteh Yuk!</p>
                <a class="default__button" href="/dashboard">Dashboard</a>
              </div>
            </div>
          </div>
        </div>
    </main>
</x-layout>
