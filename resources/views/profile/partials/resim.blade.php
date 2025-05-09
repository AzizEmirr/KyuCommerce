<style>
    #resimGoster {
        border-radius: 50%;
        object-fit: cover;
        width: 150px;
        height: 150px;
        border: 2px solid #444;
    }
</style>
<div class="card">
    <div class="card-header">
        <form method="post" action="{{ route('profile.update') }}" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('patch')
        
            <!-- Resim yükleme alanı -->
            <div class="mb-3 row">
                <label for="resim" class="col-sm-3 col-form-label text-white">Profil Resmi</label>
                <div class="col-sm-9">
                    <input type="file" name="resim" id="resim" class="form-control">
                </div>
            </div>
        
            <!-- Resim gösterme alanı -->
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label text-white">Güncel Resim</label>
                <div class="col-sm-9 d-flex align-items-center">
                    <img class="rounded-circle border img-thumbnail" id="resimGoster"
                        src="{{ !empty(Auth::user()->resim) ? url('uploads/admin/' . Auth::user()->resim) : url('uploads/admin/resim-yok.png') }}"
                        alt="Profil Resmi">
                </div>
            </div>
        
            <!-- Güncelleme butonu -->
            <div class="row">
                <div class="col-sm-9 offset-sm-3">
                    <button class="btn btn-outline-primary">
                        Resim Güncelle
                    </button>
                </div>
            </div>
        </form>
    </div><!--end container-->
</div>