
@props(['issue'])
<style>
    .btn{
        font-size: 20px;
        font-weight: 400;
        padding: 20px;
    }
</style>
<div class="dropdown">
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton{{ $issue }}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        {{ $issue }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $issue }}">
        <button type="button" class="close close-dropdown" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p class="dropdown-item-text">Sebagai seorang calon pemimpin, saya sangat menjunjung tinggi prinsip kesetaraan berpendapat. Kesetaraan berpendapat adalah salah satu fondasi utama dari demokrasi yang sehat dan masyarakat yang inklusif. Setiap individu, tanpa memandang latar belakang, status sosial, atau keyakinan, berhak untuk menyuarakan pandangan dan pendapat mereka. Kesetaraan berpendapat bukan hanya tentang memberikan kesempatan yang sama untuk berbicara, tetapi juga tentang memastikan bahwa setiap suara didengar dan dihargai. Ini berarti menciptakan lingkungan yang aman dan terbuka di mana semua orang merasa nyaman untuk berbicara tanpa takut akan diskriminasi atau pembalasan. {{ $issue }}.</p>
    </div>
</div>
