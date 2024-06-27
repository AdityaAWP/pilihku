
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
        <p class="dropdown-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste explicabo fuga minus asperiores soluta at perspiciatis ex voluptate repellendus rem sequi in quo aliquid quas labore ad voluptatem, eius, quasi error veniam doloribus! Voluptatem, reprehenderit debitis. Fuga, magnam omnis dolorem natus eaque enim, fugit alias, iste dolores reprehenderit nihil molestias.  {{ $issue }}.</p>
    </div>
</div>
