<div class="container">
    <div class="card-columns">
        @forelse($galleries as $photo)
        <div class="card">
            <img class="card-img-top" src="{{ asset('storage/img/gallery/' . $photo->file ) }}" alt="Card image cap">

            <div class="card-body d-flex justify-content-between">
                <a href="" class="d-lg-flex" id="editData" data-toggle="modal" data-target="#manageModal" data-option="replace" data-update="{{ route('gallery.update', $photo) }}" data-href="{{ $photo->id }}">
                    <span class="material-symbols-outlined">
                        upgrade
                    </span>
                    <p class="d-none d-lg-block">Replace</p>
                </a>

                <a href="" class="d-lg-flex" id="removeData" data-toggle="modal" data-target="#removeModal" data-href="{{ $photo->id }}">
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                    <p class="d-none d-lg-block">Remove</p>
                </a>
            </div>
        </div>
        @empty
        <div class="d-flex justify-content-center text-center">
            <p>No photos</p>
        </div>
        @endforelse
    </div>
</div>