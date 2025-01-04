<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-user-profile-sidebar>
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="dashboard__content__wraper">
                <div class="dashboard__section__title">
                    <h4>Uji Tampil yang saya ikuti</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard__table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Materi</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Pemateri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($ujiTampil->isEmpty())
                                        <tr>
                                            <td colspan="4" style="text-align: center;">Tidak ada uji tampil yang diikuti</td>
                                        </tr>
                                    @else
                                        @foreach($ujiTampil as $uji)
                                        <tr>
                                            <th>#{{ $uji->id }}</th>
                                            <td>{{ $uji->judul_presentasi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($uji->tanggal_presentasi)->format('F d, Y') }}</td>
                                            <td>{{ $uji->pemateri->name }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-user-profile-sidebar> 
    
</x-layout>